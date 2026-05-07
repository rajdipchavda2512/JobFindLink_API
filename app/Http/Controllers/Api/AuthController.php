<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeProfile;
use App\Models\EmployerProfile;
use App\Models\OtpVerification;
use App\Models\User;
use App\Services\TwilioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    protected TwilioService $smsService;

    public function __construct(TwilioService $smsService)
    {
        $this->smsService = $smsService;
    }

    // ============================================================
    // STEP 1 — Send OTP (10-digit mobile, mandatory for all users)
    // ============================================================

    /**
     * POST /api/auth/send-otp
     *
     * First step for ALL users (Employee & Employer).
     * Accepts a 10-digit Indian mobile number.
     * Purpose: 'login' | 'register' | 'verify' | 'forgot_password' | 'resend'
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile'  => 'required|string|size:10|regex:/^[6-9][0-9]{9}$/',
            'purpose' => 'nullable|in:login,register,verify,forgot_password,resend',
        ]);

        return $this->dispatchOtp($request->mobile, $request->purpose ?? 'verify');
    }

    /**
     * POST /api/auth/resend-otp
     *
     * Resend OTP with rate limiting (max 3 per 10 min).
     */
    public function resendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|size:10|regex:/^[6-9][0-9]{9}$/',
        ]);

        $recentCount = OtpVerification::where('mobile', $request->mobile)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->count();

        if ($recentCount >= 3) {
            return response()->json([
                'success'              => false,
                'message'              => 'Too many OTP requests. Please wait and try again.',
                'retry_after_seconds'  => 600,
            ], 429);
        }

        return $this->dispatchOtp($request->mobile, 'resend');
    }

    // ============================================================
    // STEP 2 — Verify OTP
    // ============================================================

    /**
     * POST /api/auth/verify-otp
     *
     * Verifies the 6-digit OTP sent to the mobile number.
     * Returns:
     *   - is_new_user: true  → App should go to user-type selection screen
     *   - is_new_user: false → App logs user in and returns full profile
     *
     * Works for BOTH Employee and Employer.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile'   => 'required|string|size:10|regex:/^[6-9][0-9]{9}$/',
            'otp_code' => 'required|string|size:6',
        ]);

        $otp = OtpVerification::where('mobile', $request->mobile)
            ->where('otp_code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP.',
            ], 422);
        }

        $otp->update(['is_used' => true]);

        // Check if user already exists (any role — employee OR employer)
        $user = User::where('mobile', $request->mobile)->first();

        if ($user) {
            if (!$user->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'Account is deactivated. Please contact support.',
                ], 403);
            }

            $user->update([
                'is_verified'        => true,
                'mobile_verified_at' => now(),
            ]);

            $user->tokens()->delete();
            $accessToken  = $user->createToken('access_token',  ['*'],      now()->addDays(30))->plainTextToken;
            $refreshToken = $user->createToken('refresh_token', ['refresh'], now()->addDays(90))->plainTextToken;

            // Load full profile + determine next screen for the app
            $profileData = null;
            $profileStep = null;
            $nextScreen  = 'dashboard';

            if ($user->isEmployee()) {
                $employee    = $user->employee ?? $user->employeeProfile;
                $profileData = $employee;
                $profileStep = $employee?->profile_step ?? 0;
                $nextScreen  = ($employee?->profile_completed)
                    ? 'employee_dashboard'
                    : 'profile_setup_step_' . $profileStep;
            } elseif ($user->isEmployer()) {
                $profileData = $user->employerProfile;
                $nextScreen  = 'employer_dashboard';
            } elseif ($user->isAdmin()) {
                $nextScreen = 'admin_dashboard';
            }

            return response()->json([
                'success'     => true,
                'message'     => 'OTP verified. Welcome back!',
                'is_new_user' => false,
                'data'        => [
                    'user'          => $this->formatUser($user),
                    'profile'       => $profileData,
                    'profile_step'  => $profileStep,
                    'next_screen'   => $nextScreen,   // app navigates here directly
                    'access_token'  => $accessToken,
                    'refresh_token' => $refreshToken,
                    'token_type'    => 'Bearer',
                ],
            ]);
        }

        // New user — issue temp token for registration type-selection screen
        $tempToken = base64_encode($request->mobile . '|' . now()->addMinutes(30)->timestamp);

        return response()->json([
            'success'     => true,
            'message'     => 'Mobile verified. Please select your account type.',
            'is_new_user' => true,
            'mobile'      => $request->mobile,
            'temp_token'  => $tempToken,
            'next_screen' => 'select_account_type',
        ]);
    }

    // ============================================================
    // STEP 3A — Employer Registration (after OTP)
    // ============================================================

    /**
     * POST /api/auth/employer/register
     *
     * Register a new Employer after mobile OTP verification.
     * Required: company_name, email, password, location, company_size
     */
    public function employerRegister(Request $request)
    {
        $request->validate([
            'mobile'       => 'required|string|size:10|regex:/^[6-9][0-9]{9}$/',
            'temp_token'   => 'required|string',
            'company_name' => 'required|string|max:150',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6|confirmed',
            'location'     => 'required|string|max:200',
            'company_size' => 'required|string|max:50',
        ]);

        // Validate temp_token
        if (!$this->validateTempToken($request->temp_token, $request->mobile)) {
            return response()->json([
                'success' => false,
                'message' => 'Mobile verification expired. Please verify your mobile again.',
            ], 422);
        }

        // Ensure mobile is not already taken
        if (User::where('mobile', $request->mobile)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'An account with this mobile number already exists.',
            ], 409);
        }

        $user = User::create([
            'name'               => $request->company_name,
            'full_name'          => $request->company_name,
            'mobile'             => $request->mobile,
            'email'              => $request->email,
            'password'           => $request->password,
            'role'               => 'employer',
            'is_verified'        => true,
            'is_active'          => true,
            'mobile_verified_at' => now(),
        ]);

        $user->employerProfile()->create([
            'company_name' => $request->company_name,
            'work_email'   => $request->email,
            'location'     => $request->location,
            'company_size' => $request->company_size,
        ]);

        $user->tokens()->delete();
        $accessToken  = $user->createToken('access_token',  ['*'],       now()->addDays(30))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'],  now()->addDays(90))->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Employer account created successfully.',
            'data'    => [
                'user'          => $this->formatUser($user),
                'profile'       => $user->employerProfile,
                'access_token'  => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type'    => 'Bearer',
            ],
        ], 201);
    }

    // ============================================================
    // STEP 3B — Employee: Select type & optional resume upload
    // ============================================================

    /**
     * POST /api/auth/employee/register
     *
     * Creates an Employee account after OTP verification.
     * No additional fields required — just mobile + temp_token.
     * Resume upload is optional (with skip option).
     */
    public function employeeRegister(Request $request)
    {
        $request->validate([
            'mobile'     => 'required|string|size:10|regex:/^[6-9][0-9]{9}$/',
            'temp_token' => 'required|string',
        ]);

        if (!$this->validateTempToken($request->temp_token, $request->mobile)) {
            return response()->json([
                'success' => false,
                'message' => 'Mobile verification expired. Please verify your mobile again.',
            ], 422);
        }

        if (User::where('mobile', $request->mobile)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'An account with this mobile number already exists.',
            ], 409);
        }

        $user = User::create([
            'name'               => 'Employee',
            'full_name'          => '',
            'mobile'             => $request->mobile,
            'password'           => Hash::make(\Illuminate\Support\Str::random(32)),
            'role'               => 'employee',
            'is_verified'        => true,
            'is_active'          => true,
            'mobile_verified_at' => now(),
            'profile_setup_complete' => false,
        ]);

        // Create base employee record
        Employee::create([
            'user_id'      => $user->id,
            'profile_step' => 0, // Not started — resume upload first
        ]);

        $user->tokens()->delete();
        $accessToken  = $user->createToken('access_token',  ['*'],       now()->addDays(30))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'],  now()->addDays(90))->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Employee account created. Please complete your profile.',
            'data'    => [
                'user'          => $this->formatUser($user),
                'profile_step'  => 0,
                'next_step'     => 'upload_resume', // or skip to step 1
                'access_token'  => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type'    => 'Bearer',
            ],
        ], 201);
    }

    // ============================================================
    // EMPLOYER LOGIN: Email + Password
    // ============================================================

    /**
     * POST /api/auth/employer/login
     */
    public function employerLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No account found with this email.'], 404);
        }

        if ($user->role !== 'employer') {
            return response()->json(['success' => false, 'message' => 'This login is for employers only.'], 403);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid credentials.'], 401);
        }

        if (!$user->is_active) {
            return response()->json(['success' => false, 'message' => 'Account deactivated. Contact support.'], 403);
        }

        $user->tokens()->delete();
        $accessToken  = $user->createToken('access_token',  ['*'],       now()->addDays(30))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'],  now()->addDays(90))->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'data'    => [
                'user'          => $this->formatUser($user),
                'profile'       => $user->employerProfile,
                'access_token'  => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type'    => 'Bearer',
            ],
        ]);
    }

    // ============================================================
    // MOBILE OTP LOGIN — Works for BOTH Employee & Employer
    // ============================================================

    /**
     * POST /api/auth/login/otp
     *
     * Universal mobile OTP login for both Employee and Employer.
     * Step 1: call /api/auth/send-otp
     * Step 2: call this endpoint OR use /api/auth/verify-otp directly.
     *
     * Note: /api/auth/verify-otp already handles login for existing users.
     * This endpoint is an explicit convenience wrapper.
     */
    public function loginWithOtp(Request $request)
    {
        $request->validate([
            'mobile'   => 'required|string|size:10|regex:/^[6-9][0-9]{9}$/',
            'otp_code' => 'required|string|size:6',
        ]);

        $otp = OtpVerification::where('mobile', $request->mobile)
            ->where('otp_code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otp) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP.'], 422);
        }

        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No account found with this mobile. Please register first.',
            ], 404);
        }

        if (!$user->is_active) {
            return response()->json(['success' => false, 'message' => 'Account deactivated. Contact support.'], 403);
        }

        $otp->update(['is_used' => true]);
        $user->update(['is_verified' => true, 'mobile_verified_at' => now()]);

        $user->tokens()->delete();
        $accessToken  = $user->createToken('access_token',  ['*'],      now()->addDays(30))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'], now()->addDays(90))->plainTextToken;

        // Load full profile for any role
        $profileData = null;
        $profileStep = null;
        $nextScreen  = 'dashboard';

        if ($user->isEmployee()) {
            $employee    = $user->employee ?? $user->employeeProfile;
            $profileData = $employee;
            $profileStep = $employee?->profile_step ?? 0;
            $nextScreen  = ($employee?->profile_completed)
                ? 'employee_dashboard'
                : 'profile_setup_step_' . $profileStep;
        } elseif ($user->isEmployer()) {
            $profileData = $user->employerProfile;
            $nextScreen  = 'employer_dashboard';
        } elseif ($user->isAdmin()) {
            $nextScreen = 'admin_dashboard';
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'data'    => [
                'user'          => $this->formatUser($user),
                'profile'       => $profileData,
                'profile_step'  => $profileStep,
                'next_screen'   => $nextScreen,
                'access_token'  => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type'    => 'Bearer',
            ],
        ]);
    }

    // ============================================================
    // COMMON AUTH ENDPOINTS
    // ============================================================

    /**
     * POST /api/auth/logout
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['success' => true, 'message' => 'Logged out successfully.']);
    }

    /**
     * POST /api/auth/refresh-token
     */
    public function refreshToken(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Invalid refresh token.'], 401);
        }

        $user->tokens()->delete();
        $accessToken  = $user->createToken('access_token',  ['*'],       now()->addDays(30))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'],  now()->addDays(90))->plainTextToken;

        return response()->json([
            'success' => true,
            'data'    => [
                'access_token'  => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type'    => 'Bearer',
            ],
        ]);
    }

    /**
     * GET /api/auth/profile
     *
     * Returns full profile + next_screen hint for app navigation.
     * Works for both Employee and Employer.
     */
    public function myProfile(Request $request)
    {
        $user = $request->user();

        $profileData = null;
        $profileStep = null;
        $nextScreen  = 'dashboard';

        if ($user->isEmployee()) {
            $employee    = $user->employee ?? $user->employeeProfile;
            $profileData = $employee;
            $profileStep = $employee?->profile_step ?? 0;
            $nextScreen  = ($employee?->profile_completed)
                ? 'employee_dashboard'
                : 'profile_setup_step_' . $profileStep;
        } elseif ($user->isEmployer()) {
            $profileData = $user->employerProfile;
            $nextScreen  = 'employer_dashboard';
            if ($profileData) {
                $profileData->subscription = $user->activeSubscription() ? [
                    'is_active'    => true,
                    'package_name' => $user->activeSubscription()->package->name ?? 'Standard',
                ] : null;
            }
        } elseif ($user->isAdmin()) {
            $nextScreen = 'admin_dashboard';
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'user'         => $this->formatUser($user),
                'profile'      => $profileData,
                'profile_step' => $profileStep,
                'next_screen'  => $nextScreen,
            ],
        ]);
    }

    /**
     * POST /api/auth/forgot-password
     *
     * Both Employee and Employer can reset via mobile OTP.
     * Employer can also reset via email OTP.
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'mobile' => 'nullable|string|size:10',
            'email'  => 'nullable|email',
        ]);

        if (!$request->mobile && !$request->email) {
            return response()->json(['success' => false, 'message' => 'Please provide mobile or email.'], 422);
        }

        // Email reset — Employer only
        if ($request->email) {
            $user = User::where('email', $request->email)->first();
            if (!$user) return response()->json(['success' => false, 'message' => 'User not found.'], 404);
            return $this->dispatchEmailOtp($request->email, 'forgot_password');
        }

        // Mobile OTP reset — both Employee and Employer
        if ($request->mobile) {
            $user = User::where('mobile', $request->mobile)->first();
            if (!$user) return response()->json(['success' => false, 'message' => 'No account found with this mobile.'], 404);
            return $this->dispatchOtp($request->mobile, 'forgot_password');
        }
    }

    /**
     * POST /api/auth/reset-password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'mobile'   => 'nullable|string|size:10',
            'email'    => 'nullable|email',
            'otp_code' => 'required|string|size:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!$request->mobile && !$request->email) {
            return response()->json(['success' => false, 'message' => 'Please provide mobile or email.'], 422);
        }

        $otpQuery = OtpVerification::where('otp_code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest();

        if ($request->email) {
            $otp  = $otpQuery->where('email', $request->email)->first();
            $user = User::where('email', $request->email)->first();
        } else {
            $otp  = $otpQuery->where('mobile', $request->mobile)->first();
            $user = User::where('mobile', $request->mobile)->first();
        }

        if (!$otp)  return response()->json(['success' => false, 'message' => 'Invalid or expired OTP.'], 422);
        if (!$user) return response()->json(['success' => false, 'message' => 'User not found.'], 404);

        $otp->update(['is_used' => true]);
        $user->update(['password' => $request->password]);

        return response()->json(['success' => true, 'message' => 'Password reset successfully.']);
    }

    /**
     * POST /api/auth/change-password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password'         => 'required|string|min:6|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.'], 422);
        }

        $user->update(['password' => $request->password]);

        return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
    }

    /**
     * POST /api/auth/change-mobile
     */
    public function changeMobile(Request $request)
    {
        $request->validate([
            'new_mobile' => 'required|string|size:10|unique:users,mobile',
            'otp_code'   => 'required|string|size:6',
        ]);

        $otp = OtpVerification::where('mobile', $request->new_mobile)
            ->where('otp_code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otp) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP for new mobile.'], 422);
        }

        $otp->update(['is_used' => true]);
        $request->user()->update(['mobile' => $request->new_mobile]);

        return response()->json(['success' => true, 'message' => 'Mobile number updated successfully.']);
    }

    // ============================================================
    // PRIVATE HELPERS
    // ============================================================

    /**
     * Generate, store, and send OTP via SMS
     */
    private function dispatchOtp(string $mobile, string $purpose = 'verify')
    {
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Invalidate previous unused OTPs for this mobile
        OtpVerification::where('mobile', $mobile)
            ->where('is_used', false)
            ->update(['is_used' => true]);

        OtpVerification::create([
            'mobile'     => $mobile,
            'otp_code'   => $otpCode,
            'purpose'    => $purpose,
            'expires_at' => now()->addMinutes(5),
            'is_used'    => false,
        ]);

        // Send via SMS in production
        $smsResult = null;
        if ($this->smsService->isConfigured() && !app()->environment('local')) {
            $smsResult = $this->smsService->sendOtp($mobile, $otpCode);
        }

        return response()->json([
            'success'          => true,
            'message'          => 'OTP sent to your mobile number.',
            'otp_code'         => $otpCode,  // Always returned for testing
            'expires_in_seconds' => 300,
            'sms_status'       => $smsResult['success'] ?? null,
        ]);
    }

    /**
     * Generate, store, and send OTP via Email
     */
    private function dispatchEmailOtp(string $email, string $purpose = 'verify')
    {
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        OtpVerification::where('email', $email)
            ->where('is_used', false)
            ->update(['is_used' => true]);

        OtpVerification::create([
            'email'      => $email,
            'otp_code'   => $otpCode,
            'purpose'    => $purpose,
            'expires_at' => now()->addMinutes(5),
            'is_used'    => false,
        ]);

        if (!app()->environment('local')) {
            try {
                \Illuminate\Support\Facades\Mail::raw(
                    "Your JobFindLink OTP is: $otpCode\n\nValid for 5 minutes.",
                    fn($msg) => $msg->to($email)->subject('JobFindLink OTP')
                );
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('OTP email failed: ' . $e->getMessage());
            }
        }

        return response()->json([
            'success'            => true,
            'message'            => 'OTP sent to your email address.',
            'otp_code'           => $otpCode,
            'expires_in_seconds' => 300,
        ]);
    }

    /**
     * Validate the temporary token issued after OTP verification
     */
    private function validateTempToken(string $token, string $mobile): bool
    {
        try {
            $decoded = base64_decode($token);
            [$tokenMobile, $expiry] = explode('|', $decoded, 2);
            return $tokenMobile === $mobile && (int) $expiry > now()->timestamp;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Format user for API response
     */
    private function formatUser(User $user): array
    {
        return [
            'id'                     => $user->id,
            'full_name'              => $user->full_name,
            'mobile'                 => $user->mobile,
            'email'                  => $user->email,
            'role'                   => $user->role,
            'is_verified'            => $user->is_verified,
            'profile_setup_complete' => $user->profile_setup_complete ?? false,
        ];
    }
}

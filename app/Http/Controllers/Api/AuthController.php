<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OtpVerification;
use App\Models\User;
use App\Services\Msg91Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected Msg91Service $msg91;

    public function __construct(Msg91Service $msg91)
    {
        $this->msg91 = $msg91;
    }

    /**
     * POST /api/auth/register
     *
     * Employee fields: full_name, mobile, email, password, age, gender
     * Employer fields: full_name, mobile, email, password, company_name, designation, industry, company_size, website, description
     */
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'mobile' => 'required|string|max:15|unique:users,mobile',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:employee,employer',
            // Employee specific
            'age' => 'nullable|integer|min:16|max:70',
            'gender' => 'nullable|in:male,female,other',
            'seeking_position' => 'nullable|string|max:100',
            'experience_type' => 'nullable|in:fresher,experienced',
            'preferred_locations' => 'nullable|string|max:255',
            'expected_salary' => 'nullable|string|max:50',
            // Employer specific
            'company_name' => 'required_if:role,employer|nullable|string|max:150',
            'designation' => 'nullable|string|max:100',
            'industry_type' => 'nullable|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'company_website' => 'nullable|string|max:255',
            'company_description' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->full_name,
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'is_verified' => false,
            'is_active' => true,
        ]);

        // Create profile based on role
        if ($request->role === 'employee') {
            $user->employeeProfile()->create([
                'age' => $request->age,
                'gender' => $request->gender,
                'job_position' => $request->seeking_position,
                'experience_type' => $request->experience_type,
                'preferred_locations' => $request->preferred_locations
                    ? array_map('trim', explode(',', $request->preferred_locations))
                    : null,
                'expected_salary' => $request->expected_salary
                    ? (int) preg_replace('/[^0-9]/', '', $request->expected_salary)
                    : null,
            ]);
        } elseif ($request->role === 'employer') {
            $user->employerProfile()->create([
                'company_name' => $request->company_name,
                'employer_designation' => $request->designation,
                'work_email' => $request->email,
                'industry_type' => $request->industry_type,
                'company_size' => $request->company_size,
                'company_website' => $request->company_website,
                'company_description' => $request->company_description,
            ]);
        }

        // Auto-send OTP for verification
        $this->dispatchOtp($request->mobile);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful. Please verify your mobile with OTP.',
            'user' => [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'mobile' => $user->mobile,
                'email' => $user->email,
                'role' => $user->role,
            ],
        ], 201);
    }

    /**
     * POST /api/auth/send-otp
     *
     * Sends OTP via MSG91 SMS Gateway
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
            'purpose' => 'nullable|in:login,register,verify,forgot_password',
        ]);

        return $this->dispatchOtp($request->mobile, $request->purpose ?? 'verify');
    }

    /**
     * POST /api/auth/resend-otp
     *
     * Resend OTP with rate limiting
     */
    public function resendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
        ]);

        // Check rate limiting - max 3 OTPs per mobile per 10 minutes
        $recentCount = OtpVerification::where('mobile', $request->mobile)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->count();

        if ($recentCount >= 3) {
            return response()->json([
                'success' => false,
                'message' => 'Too many OTP requests. Please try again after some time.',
                'retry_after_seconds' => 600,
            ], 429);
        }

        return $this->dispatchOtp($request->mobile, 'resend');
    }

    /**
     * POST /api/auth/verify-otp
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
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

        // Mark OTP as used
        $otp->update(['is_used' => true]);

        // Mark user as verified
        $user = User::where('mobile', $request->mobile)->first();
        if ($user) {
            $user->update(['is_verified' => true]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Mobile number verified successfully.',
        ]);
    }

    /**
     * POST /api/auth/login
     *
     * Supports two login modes matching the mockup:
     * 1. Mobile + OTP (primary, as shown in mockup)
     * 2. Mobile + Password (fallback)
     */
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string',
            'otp_code' => 'nullable|string|size:6',
            'password' => 'nullable|string',
        ]);

        // Must provide either OTP or password
        if (!$request->otp_code && !$request->password) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide either OTP or password.',
            ], 422);
        }

        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No account found with this mobile number.',
            ], 404);
        }

        // OTP-based login (primary flow from mockup)
        if ($request->otp_code) {
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

            // Verify user on successful OTP login
            if (!$user->is_verified) {
                $user->update(['is_verified' => true]);
            }
        }
        // Password-based login (fallback)
        elseif ($request->password) {
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials.',
                ], 401);
            }
        }

        if (!$user->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'Account is deactivated. Contact support.',
            ], 403);
        }

        // Revoke old tokens
        $user->tokens()->delete();

        // Create access token
        $accessToken = $user->createToken('access_token', ['*'], now()->addMinutes(15))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'], now()->addDays(7))->plainTextToken;

        // Load profile data based on role
        $profileData = null;
        if ($user->isEmployee()) {
            $profileData = $user->employeeProfile;
        } elseif ($user->isEmployer()) {
            $profileData = $user->employerProfile;
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'mobile' => $user->mobile,
                    'email' => $user->email,
                    'role' => $user->role,
                    'is_verified' => $user->is_verified,
                ],
                'profile' => $profileData,
                'access_token' => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type' => 'Bearer',
            ],
        ]);
    }

    /**
     * POST /api/auth/refresh-token
     */
    public function refreshToken(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required|string',
        ]);

        // Parse the refresh token
        $tokenParts = explode('|', $request->refresh_token);
        $tokenId = $tokenParts[0] ?? null;

        $user = $request->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid refresh token.',
            ], 401);
        }

        // Revoke old tokens
        $user->tokens()->delete();

        // Issue new tokens
        $accessToken = $user->createToken('access_token', ['*'], now()->addMinutes(15))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'], now()->addDays(7))->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => [
                'access_token' => $accessToken,
                'refresh_token' => $refreshToken,
                'token_type' => 'Bearer',
            ],
        ]);
    }

    /**
     * POST /api/auth/logout
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);
    }

    /**
     * POST /api/auth/forgot-password
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|exists:users,mobile',
        ]);

        return $this->dispatchOtp($request->mobile, 'forgot_password');
    }

    /**
     * POST /api/auth/reset-password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|exists:users,mobile',
            'otp_code' => 'required|string|size:6',
            'password' => 'required|string|min:6|confirmed',
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

        $user = User::where('mobile', $request->mobile)->first();
        $user->update(['password' => $request->password]);

        return response()->json([
            'success' => true,
            'message' => 'Password reset successfully.',
        ]);
    }

    /**
     * POST /api/auth/change-password
     * (From Settings screen in mockup)
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect.',
            ], 422);
        }

        $user->update(['password' => $request->password]);

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully.',
        ]);
    }

    /**
     * POST /api/auth/change-mobile
     * (From Settings screen in mockup)
     */
    public function changeMobile(Request $request)
    {
        $request->validate([
            'new_mobile' => 'required|string|max:15|unique:users,mobile',
            'otp_code' => 'required|string|size:6',
        ]);

        $otp = OtpVerification::where('mobile', $request->new_mobile)
            ->where('otp_code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP for new mobile.',
            ], 422);
        }

        $otp->update(['is_used' => true]);

        $user = $request->user();
        $user->update(['mobile' => $request->new_mobile]);

        return response()->json([
            'success' => true,
            'message' => 'Mobile number changed successfully.',
        ]);
    }

    // ========================
    // PRIVATE HELPERS
    // ========================

    /**
     * Internal helper to generate, store, and send OTP
     */
    private function dispatchOtp(string $mobile, string $purpose = 'verify')
    {
        // Generate 6-digit OTP
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Invalidate previous unused OTPs
        OtpVerification::where('mobile', $mobile)
            ->where('is_used', false)
            ->update(['is_used' => true]);

        // Create new OTP record
        OtpVerification::create([
            'mobile' => $mobile,
            'otp_code' => $otpCode,
            'expires_at' => now()->addMinutes(5),
            'is_used' => false,
        ]);

        // Send via MSG91 in production
        $smsResult = null;
        if ($this->msg91->isConfigured() && !app()->environment('local')) {
            $smsResult = $this->msg91->sendOtp($mobile, $otpCode);
        }

        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully.',
            'otp_code' => app()->environment('local') ? $otpCode : null, // Only in dev
            'expires_in_seconds' => 300,
            'sms_status' => $smsResult['success'] ?? null,
        ]);
    }
}

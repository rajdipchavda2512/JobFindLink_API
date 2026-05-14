<?php
// app/Http/Controllers/Frontend/Auth/AuthController.php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpVerification;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmployerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Show mobile form based on user type
     */
    public function mobileForm($type)
    {
        if (!in_array($type, ['employee', 'employer'])) {
            abort(404);
        }
        
        return view('Frontend.auth.mobileForm', compact('type'));
    }

    /**
     * Check if profile is complete for employee
     * Profile complete if full_name exists in employees table
     */
    private function isEmployeeProfileComplete($userId)
    {
        $employee = Employee::where('user_id', $userId)->first();
        
        if (!$employee) {
            return false;
        }
        
        // Check if full_name exists and is not empty
        return !empty($employee->full_name);
    }
    
    /**
     * Check if profile is complete for employer
     * Profile complete if company_name exists in employer_profiles table
     */
    private function isEmployerProfileComplete($userId)
    {
        $employerProfile = EmployerProfile::where('user_id', $userId)->first();
        
        if (!$employerProfile) {
            return false;
        }
        
        // Check if company_name exists and is not empty
        return !empty($employerProfile->company_name);
    }

    /**
     * Check mobile number status (AJAX endpoint)
     */
    public function checkMobileStatus(Request $request, $type)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        $mobile = $request->mobile;
        
        // FIRST: Check if user is already logged in
        if (Auth::check()) {
            $loggedInUser = Auth::user();
            
            // If logged in user matches the entered mobile
            if ($loggedInUser->mobile == $mobile) {
                
                // Check profile completion status
                if ($type === 'employee') {
                    $isProfileComplete = $this->isEmployeeProfileComplete($loggedInUser->id);
                } else {
                    $isProfileComplete = $this->isEmployerProfileComplete($loggedInUser->id);
                }
                
                if ($isProfileComplete) {
                    // PROFILE COMPLETE - Redirect to DASHBOARD
                    $redirectUrl = ($type === 'employee') 
                        ? route('employee.dashboard') 
                        : route('employer.dashboard');
                    
                    return response()->json([
                        'already_logged_in' => true,
                        'profile_complete' => true,
                        'redirect_to_dashboard' => true,
                        'message' => 'Welcome back! Redirecting to dashboard...',
                        'redirect_url' => $redirectUrl
                    ]);
                } else {
                    // PROFILE INCOMPLETE - Redirect to COMPLETE PROFILE
                    $redirectUrl = ($type === 'employee') 
                        ? route('employee.complete.profile') 
                        : route('employer.complete.profile');
                    
                    return response()->json([
                        'already_logged_in' => true,
                        'profile_complete' => false,
                        'redirect_to_profile' => true,
                        'message' => 'Please complete your profile to continue.',
                        'redirect_url' => $redirectUrl
                    ]);
                }
            }
        }

        // SECOND: Check if mobile exists in database
        $existingUser = User::where('mobile', $mobile)->first();

        // Case 1: New number - Send OTP
        if (!$existingUser) {
            return response()->json([
                'exists' => false,
                'can_proceed' => true,
                'message' => 'New number! Please verify with OTP to continue.',
                'action' => 'send_otp'
            ]);
        }

        // Case 2: Role mismatch - Block access
        if ($existingUser->role !== $type) {
            $correctType = ($existingUser->role === 'employee') ? 'Job Seeker' : 'Employer';
            $wrongType = ($type === 'employee') ? 'Employer' : 'Job Seeker';
            
            return response()->json([
                'exists' => true,
                'role_mismatch' => true,
                'can_proceed' => false,
                'message' => "❌ This number is already registered as a {$correctType}. You cannot login as a {$wrongType}.",
                'action' => 'role_mismatch',
                'correct_type' => $existingUser->role,
                'correct_type_url' => route('auth.mobile.form', $existingUser->role)
            ]);
        }

        // Case 3: Same role exists - Check profile completion
        if ($existingUser->role === $type) {
            // Check profile completion from respective tables
            if ($type === 'employee') {
                $isProfileComplete = $this->isEmployeeProfileComplete($existingUser->id);
            } else {
                $isProfileComplete = $this->isEmployerProfileComplete($existingUser->id);
            }
            
            if ($isProfileComplete) {
                // Profile complete - Need OTP to login (after logout scenario)
                return response()->json([
                    'exists' => true,
                    'profile_complete' => true,
                    'can_proceed' => true,
                    'needs_otp' => true,
                    'message' => 'Profile complete! Please verify OTP to login.',
                    'action' => 'send_otp'
                ]);
            } else {
                // Profile incomplete - Need OTP to complete profile
                return response()->json([
                    'exists' => true,
                    'profile_complete' => false,
                    'can_proceed' => true,
                    'needs_otp' => true,
                    'message' => 'Please verify OTP to complete your profile.',
                    'action' => 'send_otp'
                ]);
            }
        }

        return response()->json([
            'exists' => false,
            'can_proceed' => true,
            'message' => 'Please verify OTP to continue.',
            'action' => 'send_otp'
        ]);
    }

    /**
     * Send OTP based on user type
     */
    public function sendOtp(Request $request, $type)
    {
        if (!in_array($type, ['employee', 'employer'])) {
            abort(404);
        }

        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        $mobile = $request->mobile;

        // Check if user exists with different role
        $existingUser = User::where('mobile', $mobile)->first();

        if ($existingUser && $existingUser->role !== $type) {
            $correctType = ($existingUser->role === 'employee') ? 'Job Seeker' : 'Employer';
            return back()->withErrors([
                'mobile' => "This number is already registered as a {$correctType}. Please login as {$correctType}."
            ]);
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Store or update OTP
        OtpVerification::updateOrCreate(
            ['mobile' => $mobile],
            [
                'otp_code' => $otp,
                'is_used' => 0,
                'expires_at' => now()->addMinutes(5)
            ]
        );

        // Store in session
        session([
            'auth_mobile' => $mobile,
            'auth_type' => $type
        ]);

        Log::info("OTP for {$mobile}: {$otp}");

        return redirect()->route('auth.verify.form', $type)
            ->with('success', 'OTP sent successfully to ' . $mobile);
    }

    /**
     * Show OTP verification form
     */
    public function showOtpForm($type)
    {
        if (!in_array($type, ['employee', 'employer'])) {
            abort(404);
        }
        
        if (!session('auth_mobile') || session('auth_type') !== $type) {
            return redirect()->route('auth.mobile.form', $type)
                ->with('error', 'Session expired. Please try again.');
        }

        return view('Frontend.auth.verify', compact('type'));
    }

    /**
     * Verify OTP and create/update user
     */
    public function verifyOtp(Request $request, $type)
    {
        $request->validate([
            'otp_code' => 'required|digits:6'
        ]);

        if (!in_array($type, ['employee', 'employer'])) {
            abort(404);
        }

        $mobile = session('auth_mobile');
        $sessionType = session('auth_type');

        if (!$mobile || $sessionType !== $type) {
            return redirect()->route('auth.mobile.form', $type)
                ->with('error', 'Session expired. Please try again.');
        }

        // Verify OTP
        $otpRecord = OtpVerification::where('mobile', $mobile)
            ->where('otp_code', $request->otp_code)
            ->where('is_used', 0)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otpRecord) {
            return back()->withErrors([
                'otp_code' => 'Invalid or expired OTP. Please try again.'
            ]);
        }

        // Mark OTP as used
        $otpRecord->update(['is_used' => 1]);

        // Check if user already exists
        $existingUser = User::where('mobile', $mobile)->first();

        if ($existingUser && $existingUser->role !== $type) {
            return redirect()->route('auth.mobile.form', $type)
                ->withErrors([
                    'mobile' => 'This number is already registered with a different role.'
                ]);
        }

        // Check profile completion status BEFORE login
        $isProfileComplete = false;
        
        if ($existingUser) {
            if ($type === 'employee') {
                $isProfileComplete = $this->isEmployeeProfileComplete($existingUser->id);
            } else {
                $isProfileComplete = $this->isEmployerProfileComplete($existingUser->id);
            }
        }

        // Create or update user
        if (!$existingUser) {
            $user = User::create([
                'mobile' => $mobile,
                'name' => $type . '_' . $mobile,
                'full_name' => null,
                'role' => $type,
                'is_verified' => 1,
                'is_active' => 1,
                'email_verified_at' => now(),
            ]);
            
            // New user - profile not complete
            $isProfileComplete = false;
        } else {
            $user = $existingUser;
            $user->update([
                'is_verified' => 1,
                'email_verified_at' => now(),
            ]);
        }

        // Login the user
        Auth::login($user);

        // Clear session data
        session()->forget(['auth_mobile', 'auth_type']);

        // FINAL REDIRECT based on profile completion
        if (!$isProfileComplete) {
            // Profile incomplete - Go to complete profile page
            if ($type === 'employee') {
                return redirect()->route('employee.complete.profile')
                    ->with('success', 'Welcome! Please complete your profile to continue.');
            }
            return redirect()->route('employer.complete.profile')
                ->with('success', 'Welcome! Please complete your company profile to continue.');
        }

        // Profile complete - Go directly to dashboard
        if ($type === 'employee') {
            return redirect()->route('employee.dashboard')
                ->with('success', 'Welcome back!');
        }
        
        return redirect()->route('employer.dashboard')
            ->with('success', 'Welcome back!');
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request, $type)
    {
        $mobile = session('auth_mobile');
        
        if (!$mobile) {
            return redirect()->route('auth.mobile.form', $type)
                ->with('error', 'Session expired. Please try again.');
        }

        // Generate new OTP
        $otp = rand(100000, 999999);

        // Update OTP in database
        OtpVerification::updateOrCreate(
            ['mobile' => $mobile],
            [
                'otp_code' => $otp,
                'is_used' => 0,
                'expires_at' => now()->addMinutes(5)
            ]
        );

        Log::info("Resent OTP for {$mobile}: {$otp}");

        return back()->with('success', 'OTP resent successfully to ' . $mobile);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Logged out successfully');
    }
}
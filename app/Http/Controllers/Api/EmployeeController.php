<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\EmployeeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * GET /api/employee/profile
     */
    public function getProfile(Request $request)
    {
        $user = $request->user();
        $profile = $user->employeeProfile;

        return response()->json([
            'success' => true,
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'mobile' => $user->mobile,
                    'email' => $user->email,
                    'is_verified' => $user->is_verified,
                ],
                'profile' => $profile,
            ],
        ]);
    }

    /**
     * PUT /api/employee/profile
     *
     * Matches the Employee Profile & Settings screens in mockup:
     * - Skills, preferred locations, salary expectation
     * - Visibility toggles, show mobile toggle
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'experience_type' => 'required|in:fresher,experienced',
            'experience_field' => 'nullable|string|max:100',
            'preferred_locations' => 'nullable|array',
            'job_position' => 'nullable|string|max:100',
            'skills' => 'nullable|array',
            'expected_salary' => 'nullable|integer',
            'age' => 'nullable|integer|min:16|max:70',
            'gender' => 'nullable|in:male,female,other',
            'job_type' => 'nullable|array',
            'availability' => 'nullable|in:immediate,notice_period',
            'profile_visible' => 'nullable|boolean',
            'show_mobile' => 'nullable|boolean',
        ]);

        $user = $request->user();

        $profile = EmployeeProfile::updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'experience_type', 'experience_field', 'preferred_locations',
                'job_position', 'skills', 'expected_salary', 'age', 'gender',
                'job_type', 'availability', 'profile_visible', 'show_mobile',
            ])
        );

        // Check if profile is complete
        $isComplete = $profile->experience_type
            && $profile->job_position
            && $profile->skills
            && $profile->preferred_locations;

        $profile->update(['profile_complete' => $isComplete]);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'data' => $profile->fresh(),
        ]);
    }

    /**
     * GET /api/employee/dashboard
     *
     * Matches the Employee Dashboard screen in mockup:
     * - Stats: Applied (12), Shortlisted (3), Offered (1), Views (48)
     * - Recommended jobs
     * - Categories
     */
    public function dashboard(Request $request)
    {
        $user = $request->user();

        $applied = Application::where('employee_id', $user->id)->count();
        $shortlisted = Application::where('employee_id', $user->id)
            ->where('status', 'shortlisted')->count();
        $offered = Application::where('employee_id', $user->id)
            ->where('status', 'hired')->count();
        $underReview = Application::where('employee_id', $user->id)
            ->where('status', 'under_review')->count();

        // Profile views (from employee profile)
        $profile = $user->employeeProfile;
        $profileViews = $profile ? ($profile->views_count ?? 0) : 0;

        return response()->json([
            'success' => true,
            'data' => [
                'stats' => [
                    'applied' => $applied,
                    'shortlisted' => $shortlisted,
                    'offered' => $offered,
                    'under_review' => $underReview,
                    'profile_views' => $profileViews,
                ],
                'user' => [
                    'full_name' => $user->full_name,
                    'is_verified' => $user->is_verified,
                    'profile_complete' => $profile ? $profile->profile_complete : false,
                ],
            ],
        ]);
    }

    /**
     * POST /api/employee/upload-resume
     */
    public function uploadResume(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf|max:5120',
        ]);

        $user = $request->user();
        $path = $request->file('resume')->store('resumes', 'public');

        $profile = EmployeeProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'resume_url' => Storage::url($path),
                'resume_type' => 'uploaded',
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Resume uploaded successfully.',
            'data' => ['resume_url' => $profile->resume_url],
        ]);
    }

    /**
     * POST /api/employee/build-resume
     *
     * Matches Resume Builder screen in mockup:
     * - Template selection (Classic, Modern, Bold, Minimal)
     * - Personal info, experience, skills auto-filled from profile
     */
    public function buildResume(Request $request)
    {
        $request->validate([
            'template' => 'nullable|in:classic,modern,bold,minimal',
            'summary' => 'nullable|string',
            'experience' => 'nullable|array',
            'experience.*.title' => 'required|string',
            'experience.*.company' => 'required|string',
            'experience.*.start_date' => 'required|string',
            'experience.*.end_date' => 'nullable|string',
        ]);

        $user = $request->user();
        $profile = $user->employeeProfile;

        if (!$profile || !$profile->profile_complete) {
            return response()->json([
                'success' => false,
                'message' => 'Please complete your profile first.',
            ], 422);
        }

        // Store resume builder data
        $profile->update([
            'resume_type' => 'built',
            'resume_template' => $request->template ?? 'classic',
            'resume_data' => [
                'summary' => $request->summary,
                'experience' => $request->experience,
                'generated_at' => now()->toIso8601String(),
            ],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resume generated successfully.',
            'data' => [
                'template' => $profile->resume_template,
                'resume_data' => $profile->resume_data,
            ],
        ]);
    }

    /**
     * POST /api/employee/verify-id
     *
     * Matches Aadhaar Verification screen in mockup:
     * - Aadhaar number, name, DOB
     * - Upload front/back images
     */
    public function verifyId(Request $request)
    {
        $request->validate([
            'aadhaar_number' => 'nullable|string|max:14',
            'aadhaar_name' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'id_document_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'id_document_back' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $user = $request->user();

        $frontPath = $request->file('id_document_front')->store('id-documents', 'public');
        $backPath = $request->hasFile('id_document_back')
            ? $request->file('id_document_back')->store('id-documents', 'public')
            : null;

        $profile = EmployeeProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'id_document_url' => Storage::url($frontPath),
                'id_document_back_url' => $backPath ? Storage::url($backPath) : null,
                'aadhaar_number_masked' => $request->aadhaar_number
                    ? 'XXXX XXXX ' . substr(preg_replace('/[^0-9]/', '', $request->aadhaar_number), -4)
                    : null,
                'id_verified' => false, // Pending admin review
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'ID document uploaded. Pending admin verification.',
            'data' => [
                'id_document_url' => $profile->id_document_url,
                'id_verified' => $profile->id_verified,
                'aadhaar_masked' => $profile->aadhaar_number_masked,
            ],
        ]);
    }

    /**
     * GET /api/employee/applications
     *
     * Matches Applied jobs screen - "My Applications" in profile
     */
    public function myApplications(Request $request)
    {
        $user = $request->user();

        $applications = Application::where('employee_id', $user->id)
            ->with(['job' => function ($q) {
                $q->select('id', 'title', 'company_name', 'location', 'salary_min', 'salary_max', 'job_type', 'status');
            }])
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $applications,
        ]);
    }

    /**
     * PUT /api/employee/settings
     *
     * Matches Employee Settings screen in mockup:
     * - Job Alerts, Application Updates, Promotions toggles
     * - Profile Visibility, Show Mobile toggles
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'job_alerts' => 'nullable|boolean',
            'application_updates' => 'nullable|boolean',
            'promotions' => 'nullable|boolean',
            'profile_visible' => 'nullable|boolean',
            'show_mobile' => 'nullable|boolean',
        ]);

        $user = $request->user();

        $profile = EmployeeProfile::updateOrCreate(
            ['user_id' => $user->id],
            array_filter($request->only([
                'job_alerts', 'application_updates', 'promotions',
                'profile_visible', 'show_mobile',
            ]), fn ($v) => $v !== null)
        );

        return response()->json([
            'success' => true,
            'message' => 'Settings updated successfully.',
            'data' => $profile->fresh(),
        ]);
    }
}

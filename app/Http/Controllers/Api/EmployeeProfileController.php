<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * EmployeeProfileController
 *
 * Handles the 7-step Employee profile creation flow:
 *   Step 0: Upload Resume (optional — skip allowed)
 *   Step 1: Basic Details
 *   Step 2: Job Preference
 *   Step 3: Location & Salary
 *   Step 4: Skills & Languages
 *   Step 5: Education (Optional)
 *   Step 6: Work Experience
 *   Step 7: Resume & Availability
 */
class EmployeeProfileController extends Controller
{
    // ============================================================
    // GET: Current Profile State
    // ============================================================

    /**
     * GET /api/employee/profile/full
     * Returns the complete profile data with step information.
     */
    public function getFullProfile(Request $request)
    {
        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        return response()->json([
            'success'      => true,
            'profile_step' => $employee->profile_step ?? 0,
            'data'         => $employee,
        ]);
    }

    // ============================================================
    // STEP 0: Upload Resume (optional)
    // ============================================================

    /**
     * POST /api/employee/profile/upload-resume
     *
     * Accepts a PDF resume file. Skip allowed.
     * Body: resume (file) OR skip=true
     */
    public function uploadResume(Request $request)
    {
        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        if ($request->boolean('skip')) {
            $employee->update([
                'resume_skipped' => true,
                'profile_step'   => max($employee->profile_step ?? 0, 1),
            ]);

            return response()->json([
                'success'       => true,
                'message'       => 'Resume upload skipped. You can upload later.',
                'profile_step'  => $employee->profile_step,
                'next_step'     => 1,
            ]);
        }

        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $path = $request->file('resume')->store('resumes/' . $user->id, 'public');

        $employee->update([
            'resume_path'    => $path,
            'resume'         => Storage::url($path),
            'resume_skipped' => false,
            'profile_step'   => max($employee->profile_step ?? 0, 1),
        ]);

        return response()->json([
            'success'      => true,
            'message'      => 'Resume uploaded successfully.',
            'resume_url'   => Storage::url($path),
            'profile_step' => $employee->profile_step,
            'next_step'    => 1,
        ]);
    }

    // ============================================================
    // STEP 1: Basic Details
    // ============================================================

    /**
     * POST /api/employee/profile/step/1
     *
     * Fields: full_name, mobile_number, email, gender, profile_photo
     */
    public function step1BasicDetails(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|string|max:100',
            'mobile_number'=> 'nullable|string|size:10',
            'email'        => 'nullable|email|max:150',
            'gender'       => 'required|in:male,female,other',
            'age'          => 'required|integer|min:18|max:100',
            'profile_photo'=> 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $data = [
            'full_name'     => $request->full_name,
            'mobile_number' => $request->mobile_number ?? $user->mobile,
            'email'         => $request->email,
            'gender'        => $request->gender,
            'age'           => $request->age,
            'profile_step'  => max($employee->profile_step ?? 0, 1),
        ];

        // Update user name
        $user->update(['full_name' => $request->full_name, 'name' => $request->full_name]);

        if ($request->email) {
            $user->update(['email' => $request->email]);
        }

        // Handle profile photo
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile-photos/' . $user->id, 'public');
            $data['profile_photo']      = Storage::url($photoPath);
            $data['profile_photo_path'] = $photoPath;
        }

        $employee->update($data);

        return response()->json([
            'success'      => true,
            'message'      => 'Basic details saved.',
            'profile_step' => $employee->fresh()->profile_step,
            'next_step'    => 2,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // STEP 2: Job Preference
    // ============================================================

    /**
     * POST /api/employee/profile/step/2
     *
     * Fields: seeking_position, experience_type, exp_years (if experienced), exp_months (if experienced)
     */
    public function step2JobPreference(Request $request)
    {
        $request->validate([
            'job_title_id'     => 'required|integer',
            'seeking_position' => 'nullable|string|max:150', // kept for fallback
            'experience_type'  => 'required|in:fresher,experienced',
            'exp_years'        => 'required_if:experience_type,experienced|integer|min:0|max:40',
            'exp_months'       => 'required_if:experience_type,experienced|integer|min:0|max:11',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $data = [
            'job_title_id'     => $request->job_title_id,
            'seeking_position' => $request->seeking_position,
            'experience_type'  => $request->experience_type,
            'profile_step'     => max($employee->profile_step ?? 0, 2),
        ];

        if ($request->experience_type === 'experienced') {
            $data['exp_years']         = $request->exp_years ?? 0;
            $data['exp_months']        = $request->exp_months ?? 0;
            $data['total_experience']  = (($request->exp_years ?? 0) * 12) + ($request->exp_months ?? 0);
        } else {
            $data['exp_years']  = 0;
            $data['exp_months'] = 0;
            $data['total_experience'] = 0;
        }

        $employee->update($data);

        return response()->json([
            'success'      => true,
            'message'      => 'Job preference saved.',
            'profile_step' => $employee->fresh()->profile_step,
            'next_step'    => 3,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // STEP 3: Location & Salary
    // ============================================================

    /**
     * POST /api/employee/profile/step/3
     *
     * Fields: preferred_locations (array of city names), current_salary, expected_salary
     */
    public function step3LocationSalary(Request $request)
    {
        $request->validate([
            'preferred_locations'   => 'required|array|min:1',
            'preferred_locations.*' => 'string|max:100',
            'employment_type'       => 'required|string|max:50',
            'current_salary'        => 'nullable|numeric|min:0',
            'expected_salary'       => 'nullable|numeric|min:0',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $employee->update([
            'preferred_locations' => $request->preferred_locations,
            'employment_type'     => $request->employment_type,
            'current_salary'      => $request->current_salary,
            'expected_salary'     => $request->expected_salary,
            'profile_step'        => max($employee->profile_step ?? 0, 3),
        ]);

        return response()->json([
            'success'      => true,
            'message'      => 'Location & salary saved.',
            'profile_step' => $employee->fresh()->profile_step,
            'next_step'    => 4,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // STEP 4: Skills & Languages
    // ============================================================

    /**
     * POST /api/employee/profile/step/4
     *
     * Fields:
     *   - skills[] (array of strings)
     *   - languages (JSON string of language IDs — e.g., "[1, 2]")
     */
    public function step4SkillsLanguages(Request $request)
    {
        $request->validate([
            'skills'      => 'required|array|min:1',
            'skills.*'    => 'string|max:100',
            'languages'   => 'nullable|string',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $languagesData = [];
        if ($request->languages) {
            $decodedLanguages = json_decode($request->languages, true);
            if (is_array($decodedLanguages)) {
                $languagesData = $decodedLanguages;
            }
        }

        $employee->update([
            'skills_json'  => $request->skills,
            'skills'       => implode(', ', $request->skills),
            'languages'    => $languagesData,
            'profile_step' => max($employee->profile_step ?? 0, 4),
        ]);

        return response()->json([
            'success'      => true,
            'message'      => 'Skills & languages saved.',
            'profile_step' => $employee->fresh()->profile_step,
            'next_step'    => 5,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // STEP 5: Education (Optional)
    // ============================================================

    /**
     * POST /api/employee/profile/step/5
     *
     * Fields:
     *   - education_level (string, e.g., "Bachelor's Degree")
     *   - educations (JSON string of education objects)
     * Can be skipped (skip=true).
     */
    public function step5Education(Request $request)
    {
        if ($request->boolean('skip')) {
            $user     = $request->user();
            $employee = $this->getOrCreateEmployee($user->id);

            $employee->update(['profile_step' => max($employee->profile_step ?? 0, 5)]);

            return response()->json([
                'success'      => true,
                'message'      => 'Education step skipped.',
                'profile_step' => $employee->fresh()->profile_step,
                'next_step'    => 6,
            ]);
        }

        $request->validate([
            'education_level' => 'required|string',
            'educations'      => 'required|string',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $educationsData = json_decode($request->educations, true);

        // Derive highest qualification details for easy querying
        $collegeName = null;
        $degreeId = null;
        $specialisation = null;

        if (is_array($educationsData) && count($educationsData) > 0) {
            $lastEdu = end($educationsData);
            $collegeName = $lastEdu['college'] ?? null;
            $degreeId = $lastEdu['degree_id'] ?? null;
            $specialisation = $lastEdu['specialization'] ?? null;
        }

        $employee->update([
            'education_level' => $request->education_level,
            'college_name'    => $collegeName,
            'degree_id'       => $degreeId,
            'specialisation'  => $specialisation,
            'educations_json' => is_array($educationsData) ? $educationsData : [],
            'profile_step'    => max($employee->profile_step ?? 0, 5),
        ]);

        return response()->json([
            'success'      => true,
            'message'      => 'Education details saved.',
            'profile_step' => $employee->fresh()->profile_step,
            'next_step'    => 6,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // STEP 6: Work Experience
    // ============================================================

    /**
     * POST /api/employee/profile/step/6
     *
     * Fields:
     *   - experiences (JSON string of experience objects)
     * Can be skipped (skip=true).
     */
    public function step6WorkExperience(Request $request)
    {
        if ($request->boolean('skip')) {
            $user     = $request->user();
            $employee = $this->getOrCreateEmployee($user->id);

            $employee->update(['profile_step' => max($employee->profile_step ?? 0, 6)]);

            return response()->json([
                'success'      => true,
                'message'      => 'Work experience step skipped.',
                'profile_step' => $employee->fresh()->profile_step,
                'next_step'    => 7,
            ]);
        }

        $request->validate([
            'experiences' => 'required|string',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $experiencesData = json_decode($request->experiences, true);

        // Extract primary experience info for top-level columns if needed
        $companyName = null;
        $employmentType = null;
        $startDate = null;
        $endDate = null;
        $currentlyWorking = false;
        $noticePeriod = null;

        if (is_array($experiencesData) && count($experiencesData) > 0) {
            $firstExp = $experiencesData[0];
            $companyName = $firstExp['company_name'] ?? null;
            $employmentType = $firstExp['employment_type'] ?? null;
            $startDate = $firstExp['start_date'] ?? null;
            $endDate = $firstExp['end_date'] ?? null;
            $currentlyWorking = !empty($firstExp['currently_working']);
            $noticePeriod = $firstExp['notice_period'] ?? null;
        }

        $employee->update([
            'company_name'      => $companyName,
            'employment_type'   => $employmentType,
            'work_start_date'   => $startDate,
            'work_end_date'     => $currentlyWorking ? null : $endDate,
            'currently_working' => $currentlyWorking,
            'notice_period'     => $noticePeriod,
            'experiences_json'  => is_array($experiencesData) ? $experiencesData : [],
            'profile_step'      => max($employee->profile_step ?? 0, 6),
        ]);

        return response()->json([
            'success'      => true,
            'message'      => 'Work experience saved.',
            'profile_step' => $employee->fresh()->profile_step,
            'next_step'    => 7,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // STEP 7: Resume & Availability (Final Step)
    // ============================================================

    /**
     * POST /api/employee/profile/step/7
     *
     * Fields:
     *   - resume (file, optional if already uploaded)
     *   - availability: immediately | within_7_days | flexible
     */
    public function step7ResumeAvailability(Request $request)
    {
        $request->validate([
            'resume'       => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'availability' => 'required|in:immediately,within_7_days,flexible',
        ]);

        $user     = $request->user();
        $employee = $this->getOrCreateEmployee($user->id);

        $data = [
            'availability' => $request->availability,
            'profile_step' => 7,
        ];

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes/' . $user->id, 'public');
            $data['resume_path']    = $path;
            $data['resume']         = Storage::url($path);
            $data['resume_skipped'] = false;
        }

        // Mark profile as complete
        $data['profile_completed'] = true;
        $employee->update($data);

        // Mark user profile setup as complete
        $user->update(['profile_setup_complete' => true]);

        return response()->json([
            'success'      => true,
            'message'      => 'Profile setup complete! You are ready to find jobs.',
            'profile_step' => 7,
            'profile_completed' => true,
            'data'         => $employee->fresh(),
        ]);
    }

    // ============================================================
    // HELPER
    // ============================================================

    private function getOrCreateEmployee(int $userId): Employee
    {
        return Employee::firstOrCreate(
            ['user_id' => $userId],
            ['profile_step' => 0, 'profile_completed' => false]
        );
    }
}

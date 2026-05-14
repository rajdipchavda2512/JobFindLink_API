<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\ImageManipulator;
use Intervention\Image\Facades\ImageManipulatorFactory;


class ProfileSetupController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }

    public function showSetup()
    {
        $profile = auth()->user()->profile;
        return view('profile', compact('profile'));
    }

    public function saveBasicDetails(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'education_level' => 'required|string'
        ]);

        $profile = auth()->user()->profile ?? new UserProfile();
        $profile->user_id = auth()->id();
        $profile->full_name = $request->full_name;
        $profile->education_level = $request->education_level;
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveWorkStatus(Request $request)
    {
        $request->validate([
            'work_status' => 'required|in:experienced,fresher'
        ]);

        $profile = auth()->user()->profile;
        $profile->work_status = $request->work_status;
        
        if ($request->work_status == 'fresher') {
            $profile->total_experience_years = 0;
            $profile->total_experience_months = 0;
        }
        
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveExperience(Request $request)
    {
        $request->validate([
            'years' => 'required|integer|min:0|max:50',
            'months' => 'nullable|integer|min:0|max:11'
        ]);

        $profile = auth()->user()->profile;
        $profile->total_experience_years = $request->years;
        $profile->total_experience_months = $request->months ?? 0;
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveCompanyDetails(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string',
            'job_title' => 'required|string',
            'start_month' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'currently_working' => 'boolean',
            'end_month' => 'nullable|required_if:currently_working,false|string',
            'end_year' => 'nullable|required_if:currently_working,false|integer'
        ]);

        $profile = auth()->user()->profile;
        $profile->company_name = $request->company_name;
        $profile->company_industry = $request->industry;
        $profile->job_title = $request->job_title;
        $profile->currently_working = $request->currently_working ?? false;
        
        // Format start date
        $startDate = date('Y-m-d', strtotime("{$request->start_year}-{$request->start_month}-01"));
        $profile->start_date = $startDate;
        
        // Format end date if not currently working
        if (!$request->currently_working && $request->end_year && $request->end_month) {
            $endDate = date('Y-m-d', strtotime("{$request->end_year}-{$request->end_month}-01"));
            $profile->end_date = $endDate;
        } else {
            $profile->end_date = null;
        }
        
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveRolesAndSkills(Request $request)
    {
        $request->validate([
            'roles' => 'nullable|array',
            'skills' => 'nullable|array'
        ]);

        $profile = auth()->user()->profile;
        $profile->roles_responsibilities = $request->roles ?? [];
        $profile->skills = $request->skills ?? [];
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveSalary(Request $request)
    {
        $request->validate([
            'salary' => 'nullable|numeric|min:0'
        ]);

        $profile = auth()->user()->profile;
        $profile->current_salary = $request->salary;
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveJobPreference(Request $request)
    {
        $request->validate([
            'preferred_job_role' => 'required|string'
        ]);

        $profile = auth()->user()->profile;
        $profile->preferred_job_role = $request->preferred_job_role;
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function saveLanguageProficiency(Request $request)
    {
        $request->validate([
            'english_proficiency' => 'required|in:basic,intermediate,advanced',
            'other_languages' => 'nullable|array'
        ]);

        $profile = auth()->user()->profile;
        $profile->english_proficiency = $request->english_proficiency;
        $profile->other_languages = $request->other_languages ?? [];
        $profile->save();

        return response()->json(['success' => true]);
    }

    public function uploadResume(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120'
        ]);

        $profile = auth()->user()->profile;
        
        if ($profile->resume_path) {
            Storage::disk('public')->delete($profile->resume_path);
        }
        
        $path = $request->file('resume')->store('resumes', 'public');
        $profile->resume_path = $path;
        $profile->save();

        return response()->json([
            'success' => true,
            'filename' => $request->file('resume')->getClientOriginalName(),
            'size' => $request->file('resume')->getSize()
        ]);
    }

    public function completeProfile()
    {
        return redirect()->route('dashboard')->with('success', 'Profile completed successfully!');
    }
}
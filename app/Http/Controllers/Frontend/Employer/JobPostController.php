<?php
namespace App\Http\Controllers\Frontend\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Position;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\EmployerProfile;

class JobPostController extends Controller
{
    public function create()
    {
        $jobTitles = Position::where('is_active', 1)->orderBy('name')->get();
        $jobRoles = Position::where('is_active', 1)->orderBy('name')->get();
        $languages = Language::orderBy('name')->get();
        $employerProfile = EmployerProfile::where('user_id', Auth::id())->first();
        
        return view('Frontend.Employer.postjobs.create', compact('jobTitles', 'jobRoles', 'languages', 'employerProfile'));
    }

    public function store(Request $request)
    {
        $step = $request->step;
        
        // Validate based on which step we're on
        if ($step == 1) {
            $validator = $this->validateStep1($request);
        } elseif ($step == 2) {
            $validator = $this->validateStep2($request);
        } elseif ($step == 3) {
            $validator = $this->validateStep3($request);
        } elseif ($step == 'final') {
            $validator = $this->validateFinalStep($request);
        } else {
            $validator = $this->validateStep1($request);
        }
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false, 
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $this->prepareData($request);
        $data['employer_id'] = Auth::id();
        
        // Check if job post already exists in session or create new
        $jobPost = null;
        if ($request->has('job_post_id') && $request->job_post_id) {
            $jobPost = JobPost::where('employer_id', Auth::id())->find($request->job_post_id);
            if ($jobPost) {
                $jobPost->update($data);
            }
        }
        
        if (!$jobPost) {
            $jobPost = JobPost::create($data);
        }

        if ($step == 'final') {
            $jobPost->status = 'published';
            $jobPost->published_at = now();
            $jobPost->save();
            
            return response()->json([
                'success' => true, 
                'message' => 'Job posted successfully!', 
                'redirect' => route('employer.dashboard')
            ]);
        }

        return response()->json([
            'success' => true, 
            'message' => 'Job details saved successfully!', 
            'next_step' => (int)$step + 1,
            'job_post_id' => $jobPost->id
        ]);
    }

    // Validation for STEP 1 only
    private function validateStep1(Request $request)
    {
        $rules = [
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
           
            'job_type' => 'required|in:full_time,part_time,both',
            'work_location_type' => 'required|in:work_from_office,work_from_home,field_job',
            'pay_type' => 'required|in:fixed,fixed_incentive,incentive_only',
        ];

        // Conditional validation for location
        if ($request->work_location_type == 'work_from_office') {
            $rules['office_address'] = 'required|string|max:500';
        } elseif ($request->work_location_type == 'field_job') {
            $rules['field_work_area'] = 'required|string|max:500';
        } else {
            $rules['job_city'] = 'required|string|max:255';
        }

        // Conditional validation for salary
        if ($request->pay_type == 'fixed' || $request->pay_type == 'fixed_incentive') {
            $rules['min_fixed_salary'] = 'required|numeric|min:0';
            $rules['max_fixed_salary'] = 'required|numeric|gte:min_fixed_salary';
        }

        if ($request->pay_type == 'fixed_incentive' || $request->pay_type == 'incentive_only') {
            $rules['avg_incentive'] = 'required|numeric|min:0';
        }

        return Validator::make($request->all(), $rules);
    }

    // Validation for STEP 2 only
    private function validateStep2(Request $request)
    {
        $rules = [
            'minimum_education' => 'required|string',
            'experience_requirement' => 'required|in:any,experienced_only,fresher_only',
            'min_age' => 'required|integer|min:18|max:100',
            'max_age' => 'required|integer|gte:min_age',
            'gender_preference' => 'required|in:male,female,both',
        ];

        if ($request->experience_requirement == 'experienced_only') {
            $rules['min_experience_years'] = 'required|integer|min:0';
            $rules['max_experience_years'] = 'required|integer|gte:min_experience_years';
        }

        return Validator::make($request->all(), $rules);
    }

    // Validation for STEP 3 only
    private function validateStep3(Request $request)
    {
        $rules = [
            'contact_preference' => 'required|in:myself,other_recruiter,no',
            'candidate_contact_filter' => 'required|in:all,high_medium,high_only',
            'whatsapp_alert_preference' => 'required|in:myself,other_recruiter,daily_summary',
        ];

        if ($request->contact_preference == 'other_recruiter') {
            $rules['other_recruiter_name'] = 'required|string|max:255';
            $rules['other_recruiter_whatsapp'] = 'required|string|max:20';
            $rules['other_recruiter_email'] = 'required|email|max:255';
        }

        return Validator::make($request->all(), $rules);
    }

    // Validation for FINAL step (all fields)
    private function validateFinalStep(Request $request)
    {
        $rules = [
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
           
            
            'job_type' => 'required|in:full_time,part_time,both',
            'work_location_type' => 'required|in:work_from_office,work_from_home,field_job',
            'pay_type' => 'required|in:fixed,fixed_incentive,incentive_only',
            'minimum_education' => 'required|string',
            'experience_requirement' => 'required|in:any,experienced_only,fresher_only',
            'min_age' => 'required|integer|min:18|max:100',
            'max_age' => 'required|integer|gte:min_age',
            'gender_preference' => 'required|in:male,female,both',
            'contact_preference' => 'required|in:myself,other_recruiter,no',
            'candidate_contact_filter' => 'required|in:all,high_medium,high_only',
            'whatsapp_alert_preference' => 'required|in:myself,other_recruiter,daily_summary',
        ];

        // Conditional validation for location
        if ($request->work_location_type == 'work_from_office') {
            $rules['office_address'] = 'required|string|max:500';
        } elseif ($request->work_location_type == 'field_job') {
            $rules['field_work_area'] = 'required|string|max:500';
        } else {
            $rules['job_city'] = 'required|string|max:255';
        }

        // Conditional validation for salary
        if ($request->pay_type == 'fixed' || $request->pay_type == 'fixed_incentive') {
            $rules['min_fixed_salary'] = 'required|numeric|min:0';
            $rules['max_fixed_salary'] = 'required|numeric|gte:min_fixed_salary';
        }

        if ($request->pay_type == 'fixed_incentive' || $request->pay_type == 'incentive_only') {
            $rules['avg_incentive'] = 'required|numeric|min:0';
        }

        if ($request->experience_requirement == 'experienced_only') {
            $rules['min_experience_years'] = 'required|integer|min:0';
            $rules['max_experience_years'] = 'required|integer|gte:min_experience_years';
        }

        if ($request->contact_preference == 'other_recruiter') {
            $rules['other_recruiter_name'] = 'required|string|max:255';
            $rules['other_recruiter_whatsapp'] = 'required|string|max:20';
            $rules['other_recruiter_email'] = 'required|email|max:255';
        }

        return Validator::make($request->all(), $rules);
    }

    private function prepareData(Request $request)
    {
        $data = $request->except(['_token', 'perks', 'degrees', 'skills', 'known_languages', 'step', 'next_step', 'job_post_id']);
        
        if ($request->has('perks')) {
            $data['perks'] = json_encode($request->perks);
        }
        
        if ($request->has('degrees')) {
            $data['degrees'] = json_encode($request->degrees);
        }
        
        if ($request->has('skills')) {
            $data['skills'] = json_encode($request->skills);
        }
        
        if ($request->has('known_languages')) {
            $data['known_languages'] = json_encode($request->known_languages);
        }
        
        $data['is_night_shift'] = $request->has('is_night_shift');
        
        return $data;
    }
}
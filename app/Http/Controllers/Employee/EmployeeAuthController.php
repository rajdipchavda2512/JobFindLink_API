<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Industry;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtpVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Education;
use App\Models\EmploymentHistory;
use App\Models\EmployeeLanguage;
use App\Models\Location;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;


class EmployeeAuthController extends Controller
{
    public function home()
    {
        return view('home');
    }
    
    public function MobileForm()
    {
        return view('employee.auth.mobileForm');
    }
   

    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        $otp = rand(100000,999999);

        OtpVerification::updateOrCreate(
            ['mobile'=>$request->mobile],
            [
                'otp_code'=>$otp,
                'is_used'=>0,
                'expires_at'=>now()->addMinutes(5)
            ]
        );

        // SMS Send API here

        session([
            'mobile'=>$request->mobile
        ]);

        return redirect()->route('employee.verify.form')
            ->with('success','OTP Sent Successfully');
    }

    public function showOtpForm()
    {
        if(!session('mobile')){
            return redirect()->route('employee.login');
        }

        return view('employee.auth.verify');
    }

    public function verifyOtp(Request $request)
    {
        
        $request->validate([
            'otp_code'=>'required|digits:6'
        ]);

        $mobile = session('mobile');

        $otp = OtpVerification::where('mobile',$mobile)
       
                ->where('otp_code',$request->otp_code)
                ->where('is_used',0)
                ->where('expires_at','>',now())
                ->first();

        if(!$otp){
           
            return back()->withErrors([
                'otp_code'=>'Invalid OTP'
            ]);
        }

        $otp->update([
            'is_used'=>1
        ]);

        $user = User::firstOrCreate(
            ['mobile'=>$mobile],
            [
                'name'=>'employee'.'_'.$mobile,
                'full_name'=>null,
                'role'=>'employee',
                'is_verified'=>1,
                'is_active'=>1,
            ]
        );

        Auth::login($user);

        if(empty($user->full_name)){
            return redirect()->route('employee.complete.profile');
        }

        return redirect()->route('employee.index');
    }

    public function resendOtp()
    {
        $mobile = session('mobile');

        $otp = rand(100000,999999);

        OtpVerification::updateOrCreate(
            ['mobile'=>$mobile],
            [
                'otp_code'=>$otp,
                'is_used'=>0,
                'expires_at'=>now()->addMinutes(5)
            ]
        );

        return back()->with('success','OTP Resent');
    }
  

    public function showCompleteProfile()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        $positions = Position::all();
        $industries = Industry::all();
        $degrees = Degree::all();
        $languages = Language::all();
        
        // Decode JSON data for the view
        if ($employee) {
            if ($employee->educations_json) {
                $employee->educations_json = json_decode($employee->educations_json, true);
            } else {
                $employee->educations_json = [];
            }
            if ($employee->experiences_json) {
                $employee->experiences_json = json_decode($employee->experiences_json, true);
            } else {
                $employee->experiences_json = [];
            }
        }
        
        // Load cities from JSON file with error handling
        $citiesPath = public_path('data/gujarat-cities.json');
        $cities = ['cities' => []];
        
        if (file_exists($citiesPath)) {
            $jsonContent = file_get_contents($citiesPath);
            $cities = json_decode($jsonContent, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                \Log::error('JSON parse error: ' . json_last_error_msg());
                $cities = ['cities' => []];
            }
        } else {
            \Log::warning('Cities file not found: ' . $citiesPath);
            $cities = [
                'cities' => [
                    'Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Bhavnagar', 
                    'Jamnagar', 'Junagadh', 'Gandhinagar', 'Anand', 'Navsari'
                ]
            ];
        }
        
        return view('employee.complete-profile', compact('employee', 'positions', 'industries', 'degrees', 'languages', 'cities'));
    }
    
    public function uploadResume(Request $request)
    {
        try {
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                
                $validator = Validator::make($request->all(), [
                    'resume' => 'file|mimes:pdf,doc,docx|max:5120'
                ]);
                
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ], 422);
                }
                
                $filename = time() . '_' . Auth::id() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('resumes', $filename, 'public');
                
                session(['temp_resume' => $path]);
                
                return response()->json([
                    'success' => true,
                    'path' => $path,
                    'message' => 'Resume uploaded successfully'
                ]);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'No resume uploaded'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error uploading resume: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function saveStep1(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'mobile_number' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'gender' => 'required|in:male,female,other',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = Employee::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'full_name' => $request->full_name,
                    'mobile_number' => $request->mobile_number,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'age' => $request->age
                ]
            );
            
            if ($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                $filename = time() . '_profile_' . Auth::id() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profile-photos', $filename, 'public');
                $employee->profile_photo = $path;
                $employee->save();
            }
            
            $employee->profile_step = 2;
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 2,
                'message' => 'Basic details saved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
  public function saveStep2(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'job_title_id' => 'required|exists:positions,id',
            'experience_type' => 'required|in:fresher,experienced',
            'exp_years' => 'required_if:experience_type,experienced|integer|min:0',
            'exp_months' => 'required_if:experience_type,experienced|integer|min:0|max:11'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        $employee = Employee::where('user_id', Auth::id())->first();
        
        if (!$employee) {
            $employee = new Employee();
            $employee->user_id = Auth::id();
        }
        
        $employee->job_title_id = $request->job_title_id;
        $employee->experience_type = $request->experience_type;
        
        if ($request->experience_type == 'experienced') {
            $employee->exp_years = (int)$request->exp_years;
            $employee->exp_months = (int)$request->exp_months;
        } else {
            $employee->exp_years = 0;
            $employee->exp_months = 0;
        }
        
        $employee->profile_step = 3;
        $employee->save();
        
        return response()->json([
            'success' => true,
            'next_step' => 3,
            'message' => 'Job preference saved successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}
    
    public function saveStep3(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'preferred_locations' => 'required|array|min:1',
                'preferred_locations.*' => 'string|max:255',
                'expected_salary' => 'required|numeric|min:0',
                'current_salary' => 'nullable|numeric|min:0'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = Employee::where('user_id', Auth::id())->first();
            
            if (!$employee) {
                $employee = new Employee();
                $employee->user_id = Auth::id();
            }
            
            $employee->preferred_locations = json_encode($request->preferred_locations);
            $employee->current_salary = $request->current_salary;
            $employee->expected_salary = $request->expected_salary;
            $employee->profile_step = 4;
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 4,
                'message' => 'Location and salary saved successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Step 3 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function saveStep4(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'skills' => 'required|array|min:1|max:5',
                'skills.*' => 'string|max:100',
                'languages' => 'required'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = Employee::where('user_id', Auth::id())->first();
            
            if (!$employee) {
                $employee = new Employee();
                $employee->user_id = Auth::id();
            }
            
            $employee->skills = json_encode($request->skills);
            
            $languages = $request->languages;
            if (is_string($languages)) {
                $languages = json_decode($languages, true);
            }
            
            if (is_array($languages) && isset($languages[0]['id'])) {
                $languageIds = array_column($languages, 'id');
                $employee->languages = json_encode($languageIds);
            } else {
                $employee->languages = json_encode($languages);
            }
            
            $employee->profile_step = 5;
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 5,
                'message' => 'Skills and languages saved successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Step 4 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // FIXED: saveStep5 - now properly decodes JSON from request
    public function saveStep5(Request $request)
    {
        try {
            // Get the educations data as JSON string from the request
            $educationsJson = $request->input('educations');
            $educations = json_decode($educationsJson, true);
            
            // Validate that we have valid data
            if (!$educations || !is_array($educations) || empty($educations)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Education data is required'
                ], 422);
            }
            
            // Validate each education entry
            $higherLevels = ['12th', 'Diploma', 'Graduate', 'Post Graduate', 'PhD'];
            foreach ($educations as $key => $education) {
                if (!isset($education['level'])) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Education level is required for entry ' . ($key + 1)
                    ], 422);
                }
                
                if (in_array($education['level'], $higherLevels)) {
                    if (empty($education['college'])) {
                        return response()->json([
                            'success' => false,
                            'message' => 'College name is required for ' . $education['level']
                        ], 422);
                    }
                    if (empty($education['degree_id'])) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Degree is required for ' . $education['level']
                        ], 422);
                    }
                }
            }
            
            $employee = Employee::where('user_id', Auth::id())->first();
            
            if (!$employee) {
                $employee = new Employee();
                $employee->user_id = Auth::id();
            }
            
            // Store all educations as JSON
            $employee->educations_json = json_encode($educations);
            $employee->education_level = $request->input('education_level');
            
            // Also update old columns for backward compatibility
            $highestEducation = end($educations);
            if ($highestEducation) {
                if (isset($highestEducation['college'])) {
                    $employee->college_name = $highestEducation['college'];
                }
                if (isset($highestEducation['degree_id'])) {
                    $employee->degree_id = $highestEducation['degree_id'];
                }
                if (isset($highestEducation['specialization'])) {
                    $employee->specialisation = $highestEducation['specialization'];
                }
            }
            
            $employee->profile_step = 6;
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 6,
                'message' => 'Education details saved successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Step 5 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // FIXED: saveStep6 - now properly decodes JSON from request
   public function saveStep6(Request $request)
{
    try {
        $employee = Employee::where('user_id', Auth::id())->first();
        
        if (!$employee) {
            $employee = new Employee();
            $employee->user_id = Auth::id();
        }
        
        $experienceType = $employee->experience_type ?? 'fresher';
        
        if ($experienceType == 'experienced') {
            $experiencesJson = $request->input('experiences');
            $experiences = json_decode($experiencesJson, true);
            
            if ($experiences && is_array($experiences) && !empty($experiences)) {
                // Validate each experience entry
                foreach ($experiences as $key => $experience) {
                    if (empty($experience['company_name'])) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Company name is required for experience ' . ($key + 1)
                        ], 422);
                    }
                    if (empty($experience['employment_type'])) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Employment type is required for experience ' . ($key + 1)
                        ], 422);
                    }
                    if (empty($experience['start_date'])) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Start date is required for experience ' . ($key + 1)
                        ], 422);
                    }
                    if (empty($experience['currently_working']) && empty($experience['end_date'])) {
                        return response()->json([
                            'success' => false,
                            'message' => 'End date is required for experience ' . ($key + 1) . ' when not currently working'
                        ], 422);
                    }
                }
                
                // Store all experiences as JSON
                $employee->experiences_json = json_encode($experiences);
                
                // Calculate total experience in years and months
                $totalMonths = 0;
                foreach ($experiences as $experience) {
                    if (isset($experience['start_date'])) {
                        $start = new \DateTime($experience['start_date']);
                        $end = isset($experience['currently_working']) && $experience['currently_working'] 
                            ? new \DateTime() 
                            : (isset($experience['end_date']) ? new \DateTime($experience['end_date']) : null);
                        
                        if ($end && $start < $end) {
                            $diff = $start->diff($end);
                            $totalMonths += ($diff->y * 12) + $diff->m;
                        }
                    }
                }
                
                // Store total experience in years and months
                $totalYears = floor($totalMonths / 12);
                $totalMonthsRemaining = $totalMonths % 12;
                
                $employee->total_experience_years = $totalYears;
                $employee->total_experience_months = $totalMonthsRemaining;
                
                // IMPORTANT: Update exp_years and exp_months for backward compatibility
                $employee->exp_years = $totalYears;
                $employee->exp_months = $totalMonthsRemaining;
                
                // Also update total_experience (decimal) for backward compatibility
                $employee->total_experience = $totalYears + ($totalMonthsRemaining / 12);
                
                // Update old columns for backward compatibility (latest experience)
                $latestExperience = null;
                $latestDate = null;
                foreach ($experiences as $experience) {
                    if (isset($experience['start_date'])) {
                        $startDate = new \DateTime($experience['start_date']);
                        if (!$latestDate || $startDate > $latestDate) {
                            $latestDate = $startDate;
                            $latestExperience = $experience;
                        }
                    }
                }
                
                if ($latestExperience) {
                    $employee->company_name = $latestExperience['company_name'] ?? null;
                    $employee->industry_id = isset($latestExperience['industry_id']) ? (int)$latestExperience['industry_id'] : null;
                    $employee->employment_type = $latestExperience['employment_type'] ?? null;
                    $employee->work_start_date = $latestExperience['start_date'] ?? null;
                    $employee->work_end_date = $latestExperience['currently_working'] ? null : ($latestExperience['end_date'] ?? null);
                    $employee->currently_working = $latestExperience['currently_working'] ?? false;
                    $employee->notice_period = $latestExperience['notice_period'] ?? null;
                }
            } else {
                // No experiences provided for experienced user
                return response()->json([
                    'success' => false,
                    'message' => 'Please add at least one work experience'
                ], 422);
            }
        }
        
        $employee->profile_step = 7;
        $employee->save();
        
        return response()->json([
            'success' => true,
            'next_step' => 7,
            'message' => 'Work experience saved successfully'
        ]);
    } catch (\Exception $e) {
        \Log::error('Step 6 Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}
    
    public function saveStep7(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'availability' => 'required|in:immediately,within_7_days,flexible'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = Employee::where('user_id', Auth::id())->first();
            
            if (!$employee) {
                $employee = new Employee();
                $employee->user_id = Auth::id();
            }
            
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $filename = time() . '_resume_' . Auth::id() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('resumes', $filename, 'public');
                $employee->resume = $path;
            } elseif ($request->resume_path) {
                $employee->resume = $request->resume_path;
                session()->forget('temp_resume');
            } elseif (session('temp_resume')) {
                $employee->resume = session('temp_resume');
                session()->forget('temp_resume');
            }
            
            $employee->availability = $request->availability;
            $employee->save();
            
            return response()->json([
                'success' => true,
                'redirect' => route('employee.dashboard'),
                'message' => 'Profile completed successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function skipStep(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'next_step' => 'required|integer|min:1|max:7'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = Employee::where('user_id', Auth::id())->first();
            if (!$employee) {
                $employee = new Employee();
                $employee->user_id = Auth::id();
            }
            
            $employee->profile_step = $request->next_step;
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => $request->next_step,
                'message' => 'Skipped to step ' . $request->next_step
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $completion = $this->getProfileCompletion($employee);
        
        return view('Employee.index', compact('employee', 'completion'));
    }

    private function getOrCreateEmployee()
    {
        $user = Auth::user();
        
        if (!$user) {
            return null;
        }
        
        $employee = Employee::where('user_id', $user->id)->first();
        
        if (!$employee) {
            $employee = Employee::create([
                'user_id' => $user->id,
                'full_name' => $user->name ?? '',
                'email' => $user->email,
                'total_experience' => 0
            ]);
        }
        
        return $employee;
    }
    
    private function getProfileCompletion($employee)
    {
        if (!$employee) {
            return 0;
        }
        
        $fields = [
            'full_name', 'email', 'gender', 'birthdate', 'location_id',
            'job_title_id', 'skills', 'description', 'total_experience',
            'current_salary', 'expected_salary'
        ];
        
        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($employee->$field)) {
                $completed++;
            }
        }
        
        $educationsCount = Education::where('employee_id', $employee->id)->count();
        if ($educationsCount > 0) {
            $completed += 2;
        }
        
        $experiencesCount = EmploymentHistory::where('employee_id', $employee->id)->count();
        if ($experiencesCount > 0) {
            $completed += 2;
        }
        
        $languagesCount = EmployeeLanguage::where('employee_id', $employee->id)->count();
        if ($languagesCount > 0) {
            $completed += 1;
        }
        
        if (!empty($employee->resume)) {
            $completed += 1;
        }
        
        $total = count($fields) + 7;
        
        if ($total == 0) {
            return 0;
        }
        
        return round(($completed / $total) * 100);
    }
    
    public function personalDetails()
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $locations = Location::orderBy('state')->orderBy('city')->get();
        $jobTitles = Position::orderBy('name')->get();
      
        $selected_state = null;
        $selected_city = null;
        $selected_area = null;
        
        if ($employee->location_id) {
            $currentLocation = Location::find($employee->location_id);
            if ($currentLocation) {
                $selected_state = $currentLocation->state;
                $selected_city = $currentLocation->city;
                $selected_area = $currentLocation->area;
            }
        }
        
        return view('Employee.personal', compact('employee', 'locations', 'jobTitles', 'selected_state', 'selected_city', 'selected_area'));
    }
    
    public function removeResume(Request $request)
    {
        try {
            $employee = Employee::where('user_id', Auth::id())->first();
            
            if ($employee && $employee->resume) {
                if (Storage::disk('public')->exists($employee->resume)) {
                    Storage::disk('public')->delete($employee->resume);
                }
                
                $employee->resume = null;
                $employee->save();
                
                return response()->json([
                    'success' => true,
                    'message' => 'Resume removed successfully'
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'No resume found to remove'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error removing resume: ' . $e->getMessage()
            ]);
        }
    }
    
    public function getCitiesByState($state)
    {
        $cities = Location::where('state', $state)
            ->select('city')
            ->distinct()
            ->orderBy('city')
            ->get();
        
        return response()->json($cities);
    }

    public function getAreasByCity($city)
    {
        $areas = Location::where('city', $city)
            ->select('id', 'area', 'city', 'state')
            ->orderBy('area')
            ->get();
        
        return response()->json($areas);
    }
    
    public function updatePersonalDetails(Request $request)
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
       
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'gender' => 'nullable|in:male,female,other',
            'birthdate' => 'nullable|date|before:today',
            'location_id' => 'nullable|exists:locations,id',
            'job_title_id' => 'nullable|exists:positions,id',
            'skills' => 'nullable|string|max:5000',
            'description' => 'nullable|string|max:5000',
            'total_experience' => 'nullable|integer|min:0|max:50',
            'current_salary' => 'nullable|numeric|min:0|max:99999999',
            'expected_salary' => 'nullable|numeric|min:0|max:99999999',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);
        
        if ($request->filled('current_salary') && $request->filled('expected_salary')) {
            if ($request->expected_salary < $request->current_salary) {
                return back()->withErrors(['expected_salary' => 'Expected salary should be greater than or equal to current salary.'])->withInput();
            }
        }
        
        if ($request->hasFile('resume')) {
            if ($employee->resume && Storage::disk('public')->exists($employee->resume)) {
                Storage::disk('public')->delete($employee->resume);
            }
            
            $path = $request->file('resume')->store('resumes', 'public');
            $validated['resume'] = $path;
        }
        
        $employee->update($validated);
        
        return redirect()->route('employee.dashboard')->with('success', 'Personal details updated successfully!');
    }

  public function educationList()
{
    $employee = $this->getOrCreateEmployee();
    
    if (!$employee) {
        return redirect()->route('employee.login')->with('error', 'Please login to continue');
    }
    
    $educations = Education::where('employee_id', $employee->id)
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('employee.educations', compact('educations'));
}

public function educationForm($id = null)
{
    $employee = $this->getOrCreateEmployee();
    
    if (!$employee) {
        return redirect()->route('employee.login')->with('error', 'Please login to continue');
    }
    
    $education = null;
    if ($id) {
        $education = Education::where('id', $id)
            ->where('employee_id', $employee->id)
            ->firstOrFail();
    }
    
    // Pass degrees data (same as complete-profile)
    $degrees = \App\Models\Degree::orderBy('name')->get();
    
    return view('employee.education-form', compact('education', 'degrees'));
}
    
    
public function saveEducation(Request $request, $id = null)
{
    $employee = $this->getOrCreateEmployee();
    
    if (!$employee) {
        return redirect()->route('employee.login')->with('error', 'Please login to continue');
    }
    
    $validated = $request->validate([
        'education_level' => 'required|string|max:100',
        'educations_data' => 'nullable|json'
    ]);
    
    $validated['employee_id'] = $employee->id;
    
    // Decode and validate the educations data
    if (!empty($validated['educations_data'])) {
        $educationsData = json_decode($validated['educations_data'], true);
        
        // Validate based on education level
        $level = $validated['education_level'];
        
        if ($level === 'Graduate' && count($educationsData) < 1) {
            return redirect()->back()->with('error', 'Please fill in your graduate details')->withInput();
        }
        
        if ($level === 'Post Graduate' && count($educationsData) < 2) {
            return redirect()->back()->with('error', 'Please fill in both Graduate and Post Graduate details')->withInput();
        }
        
        if ($level === 'PhD' && count($educationsData) < 3) {
            return redirect()->back()->with('error', 'Please fill in Graduate, Post Graduate, and PhD details')->withInput();
        }
        
        // Validate each education entry has required fields
        foreach ($educationsData as $edu) {
            if (empty($edu['college'])) {
                return redirect()->back()->with('error', 'College name is required')->withInput();
            }
            if (empty($edu['degree_id'])) {
                return redirect()->back()->with('error', 'Degree is required')->withInput();
            }
        }
        
        $validated['educations_data'] = json_encode($educationsData);
    }
    
    try {
        if ($id) {
            $education = Education::where('id', $id)
                ->where('employee_id', $employee->id)
                ->firstOrFail();
            $education->update($validated);
            $message = 'Education updated successfully!';
        } else {
            $education = Education::create($validated);
            $message = 'Education added successfully!';
        }
        
        return redirect()->route('employee.educations')
            ->with('success', $message);
            
    } catch (\Exception $e) {
        \Log::error('Education save error: ' . $e->getMessage());
        
        return redirect()->back()
            ->with('error', 'An error occurred while saving education. Please try again.')
            ->withInput();
    }
}

public function deleteEducation($id)
{
    $employee = $this->getOrCreateEmployee();
    
    if (!$employee) {
        return redirect()->route('employee.login')->with('error', 'Please login to continue');
    }
    
    try {
        $education = Education::where('id', $id)
            ->where('employee_id', $employee->id)
            ->firstOrFail();
        
        $education->delete();
        
        return redirect()->route('employee.educations')
            ->with('success', 'Education deleted successfully!');
            
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('employee.educations')
            ->with('error', 'Education record not found.');
            
    } catch (\Exception $e) {
        \Log::error('Education delete error: ' . $e->getMessage());
        
        return redirect()->route('employee.educations')
            ->with('error', 'An error occurred while deleting education. Please try again.');
    }
}
    public function experienceList()
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $experiences = EmploymentHistory::where('employee_id', $employee->id)
            ->orderBy('start_date', 'desc')
            ->get();
        
        return view('Employee.experiences', compact('experiences'));
    }

    public function experienceForm($id = null)
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $experience = null;
        if ($id) {
            $experience = EmploymentHistory::where('id', $id)
                ->where('employee_id', $employee->id)
                ->firstOrFail();
        }
        
        return view('Employee.experience-form', compact('experience'));
    }

    public function saveExperience(Request $request, $id = null)
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $validated = $request->validate([
            'company_name' => 'required|string|max:200',
            'industry_sector' => 'nullable|string|max:100',
            'currently_working' => 'boolean',
            'employment_type' => 'required|in:full-time,part-time,contract,internship',
            'notice_period' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);
        
        if ($request->currently_working) {
            $validated['end_date'] = null;
        }
        
        $validated['employee_id'] = $employee->id;
        
        if ($id) {
            $experience = EmploymentHistory::where('id', $id)
                ->where('employee_id', $employee->id)
                ->firstOrFail();
            $experience->update($validated);
            $message = 'Experience updated successfully!';
        } else {
            EmploymentHistory::create($validated);
            $message = 'Experience added successfully!';
        }
        
        $this->updateTotalExperience($employee);
        
        return redirect()->route('employee.experiences')->with('success', $message);
    }

    public function deleteExperience($id)
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $experience = EmploymentHistory::where('id', $id)
            ->where('employee_id', $employee->id)
            ->firstOrFail();
        $experience->delete();
        
        $this->updateTotalExperience($employee);
        
        return redirect()->route('employee.experiences')->with('success', 'Experience deleted successfully!');
    }

    public function languageList()
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $languages = EmployeeLanguage::where('employee_id', $employee->id)
            ->with('language')
            ->get();
        $allLanguages = Language::orderBy('name')->get();
        
        return view('Employee.languages', compact('languages', 'allLanguages'));
    }

    public function addLanguage(Request $request)
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $validated = $request->validate([
            'language_id' => 'required|exists:languages,id'
        ]);
        
        $existing = EmployeeLanguage::where('employee_id', $employee->id)
            ->where('language_id', $validated['language_id'])
            ->exists();
            
        if ($existing) {
            return redirect()->back()->with('error', 'Language already added!');
        }
        
        EmployeeLanguage::create([
            'employee_id' => $employee->id,
            'language_id' => $validated['language_id']
        ]);
        
        return redirect()->route('employee.languages')->with('success', 'Language added successfully!');
    }

    public function removeLanguage($id)
    {
        $employee = $this->getOrCreateEmployee();
        
        if (!$employee) {
            return redirect()->route('employee.login')->with('error', 'Please login to continue');
        }
        
        $language = EmployeeLanguage::where('id', $id)
            ->where('employee_id', $employee->id)
            ->firstOrFail();
        $language->delete();
        
        return redirect()->route('employee.languages')->with('success', 'Language removed successfully!');
    }

    private function updateTotalExperience($employee)
    {
        if (!$employee) {
            return;
        }
        
        $experiences = EmploymentHistory::where('employee_id', $employee->id)->get();
        
        $totalYears = 0;
        foreach ($experiences as $exp) {
            $start = new \DateTime($exp->start_date);
            $end = $exp->currently_working ? new \DateTime() : new \DateTime($exp->end_date);
            $interval = $start->diff($end);
            $totalYears += $interval->y + ($interval->m / 12);
        }
        
        $employee->total_experience = round($totalYears, 1);
        $employee->save();
    }
      public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Industry;
use App\Models\Position;
use App\Models\Skill;
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
use Illuminate\Support\Facades\Log;


class EmployeeAuthController extends Controller
{
    public function home()
    {
        return view('home');
    }
    




    /**
     * Display complete profile page (supports both create and edit)
     */

    /**
 * Display complete profile page (supports both create and edit with step parameter)
 */
public function showCompleteProfile(Request $request, $edit_step = null)
{
    $employee = Employee::where('user_id', Auth::id())->first();
    $positions = Position::all();
    $industries = Industry::all();
    $degrees = Degree::all();
    $languages = Language::all();
    
    // Check if we're in edit mode (has edit_step parameter OR profile is complete)
    $isEditing = ($edit_step !== null) || ($employee && $employee->profile_step >= 8);
    
    // Determine which step to show
    $editStep = null;
    if ($edit_step !== null) {
        // If edit_step parameter is provided (0-7), use it
        $editStep = (int)$edit_step;
        $isEditing = true;
    } elseif ($employee && $employee->profile_step >= 8) {
        // If profile is complete but no specific step, default to step 1
        $editStep = 1;
        $isEditing = true;
    }
    
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
        if ($employee->skills) {
            $employee->skills = is_string($employee->skills) ? json_decode($employee->skills, true) : $employee->skills;
        } else {
            $employee->skills = [];
        }
        if ($employee->languages) {
            $employee->languages = is_string($employee->languages) ? json_decode($employee->languages, true) : $employee->languages;
        } else {
            $employee->languages = [];
        }
        if ($employee->preferred_locations) {
            $employee->preferred_locations = is_string($employee->preferred_locations) ? json_decode($employee->preferred_locations, true) : $employee->preferred_locations;
        } else {
            $employee->preferred_locations = [];
        }
    }
    
    // Load cities from JSON file
    $citiesPath = public_path('data/gujarat-cities.json');
    $cities = ['cities' => []];
    
    if (file_exists($citiesPath)) {
        $jsonContent = file_get_contents($citiesPath);
        $cities = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON parse error: ' . json_last_error_msg());
            $cities = ['cities' => []];
        }
    } else {
        Log::warning('Cities file not found: ' . $citiesPath);
        $cities = [
            'cities' => [
                'Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Bhavnagar', 
                'Jamnagar', 'Junagadh', 'Gandhinagar', 'Anand', 'Navsari'
            ]
        ];
    }
    
    // Calculate profile completion percentage
    $completion = $this->getProfileCompletion($employee);
    
    return view('Frontend.Employee.complete-profile', compact(
        'employee', 'positions', 'industries', 'degrees', 'languages', 
        'cities', 'isEditing', 'editStep', 'completion'
    ));
}
    
    /**
     * Get employee or create new one
     */
/**
 * Get employee or create new one
 */
private function getOrCreateEmployee()
{
    $employee = Employee::where('user_id', Auth::id())->first();
    
    if (!$employee) {
        $employee = new Employee();
        $employee->user_id = Auth::id();
        $employee->profile_step = 0;
        
        // Set default values for required fields
        $employee->full_name = Auth::user()->name ?? '';  // Use authenticated user's name
        $employee->email = Auth::user()->email ?? '';     // Use authenticated user's email
        $employee->gender = 'other';                      // Default gender
        $employee->age = 18;                              // Default age
        
        $employee->save();
    }
    
    return $employee;
}
    
    /**
     * Save any step (unified method for create and edit)
     */
    public function saveStep(Request $request, $step)
    {
        $methodName = 'saveStep' . $step;
        
        if (method_exists($this, $methodName)) {
            return $this->$methodName($request);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Invalid step'
        ], 400);
    }
    
    /**
     * Upload resume (separate from step saving for better UX)
     */
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
                
                $employee = $this->getOrCreateEmployee();
                
                // Delete old resume if exists
                if ($employee->resume && Storage::disk('public')->exists($employee->resume)) {
                    Storage::disk('public')->delete($employee->resume);
                }
                
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . Auth::id() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $originalName);
                $path = $file->storeAs('resumes', $filename, 'public');
                
                $employee->resume = $path;
                $employee->save();
                
                return response()->json([
                    'success' => true,
                    'path' => $path,
                    'original_name' => $originalName,
                    'message' => 'Resume uploaded successfully'
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'No file uploaded'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error uploading resume: ' . $e->getMessage()
            ], 500);
        }
    }
/**
 * Search skills for autocomplete
 */
public function searchSkills(Request $request)
{
    $query = $request->get('query');
    
    if (strlen($query) < 2) {
        return response()->json(['skills' => []]);
    }
    
    $skills = Skill::where('name', 'LIKE', "%{$query}%")
        ->limit(10)
        ->get(['id', 'name']);
    
    // Add category if you have a category field in your skills table
    $skillsWithCategory = $skills->map(function($skill) {
        return [
            'id' => $skill->id,
            'name' => $skill->name,
            'category' => $skill->category ?? '' // Optional: add category if exists
        ];
    });
    
    return response()->json(['skills' => $skillsWithCategory]);
}

/**
 * Get all skills (for reference)
 */
public function getAllSkills(Request $request)
{
    $skills = Skill::orderBy('name')->get(['id', 'name']);
    
    if ($request->ajax()) {
        return response()->json(['skills' => $skills]);
    }
    
    return $skills;
}

/**
 * Save Step 4: Skills & Languages (Updated)
 */
public function saveStep4(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'skills' => 'nullable|array|max:5',
            'skills.*' => 'string|max:100',
            'languages' => 'nullable'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        $employee = $this->getOrCreateEmployee();
        
        // Process and validate skills
        if ($request->has('skills') && is_array($request->skills)) {
            $skills = array_filter($request->skills);
            $skills = array_slice($skills, 0, 5); // Max 5 skills
            
            // Optional: Verify each skill exists in database
            $validatedSkills = [];
            foreach ($skills as $skillName) {
                $skillName = trim($skillName);
                if (!empty($skillName)) {
                    // Check if skill exists, if not, you might want to add it to the database
                    $existingSkill = Skill::where('name', $skillName)->first();
                    if (!$existingSkill) {
                        // Optionally create new skill
                        // Skill::create(['name' => $skillName]);
                    }
                    $validatedSkills[] = $skillName;
                }
            }
            
            $employee->skills = json_encode($validatedSkills);
        } else {
            $employee->skills = json_encode([]);
        }
        
        // Process languages
        $languages = $request->languages;
        if (is_string($languages)) {
            $languages = json_decode($languages, true);
        }
        
        if (is_array($languages) && isset($languages[0]['id'])) {
            $languageIds = array_column($languages, 'id');
            $employee->languages = json_encode($languageIds);
        } elseif (is_array($languages)) {
            $employee->languages = json_encode($languages);
        } else {
            $employee->languages = json_encode([]);
        }
        
        // Update profile step if needed
        if ($employee->profile_step < 5) {
            $employee->profile_step = 5;
        }
        $employee->save();
        
        return response()->json([
            'success' => true,
            'next_step' => 5,
            'message' => 'Skills and languages saved successfully'
        ]);
    } catch (\Exception $e) {
        Log::error('Step 4 Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error saving data: ' . $e->getMessage()
        ], 500);
    }
}
    /**
     * Remove resume
     */
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
    
    /**
     * Save Step 1: Basic Details
     */
    public function saveStep1(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'gender' => 'required|in:male,female,other',
                'age' => 'required|integer|min:18|max:100',
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = $this->getOrCreateEmployee();
            
            $employee->full_name = $request->full_name;
            $employee->email = $request->email;
            $employee->gender = $request->gender;
            $employee->age = $request->age;
            
            if ($request->hasFile('profile_photo')) {
                // Delete old photo if exists
                if ($employee->profile_photo && Storage::disk('public')->exists($employee->profile_photo)) {
                    Storage::disk('public')->delete($employee->profile_photo);
                }
                
                $file = $request->file('profile_photo');
                $filename = time() . '_profile_' . Auth::id() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('profile-photos', $filename, 'public');
                $employee->profile_photo = $path;
            }
            
            // Only update step if it's less than current step (for edit mode)
            if ($employee->profile_step < 2) {
                $employee->profile_step = 2;
            }
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 2,
                'message' => 'Basic details saved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Step 1 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Save Step 2: Job Preference
     */
    public function saveStep2(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'job_title_id' => 'required|exists:positions,id',
                'experience_type' => 'required|in:fresher,experienced',
                'exp_years' => 'required_if:experience_type,experienced|integer|min:0|max:50',
                'exp_months' => 'required_if:experience_type,experienced|integer|min:0|max:11'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = $this->getOrCreateEmployee();
            
            $employee->job_title_id = $request->job_title_id;
            $employee->experience_type = $request->experience_type;
            
            if ($request->experience_type == 'experienced') {
                $employee->exp_years = (int)$request->exp_years;
                $employee->exp_months = (int)$request->exp_months;
            } else {
                $employee->exp_years = 0;
                $employee->exp_months = 0;
            }
            
            if ($employee->profile_step < 3) {
                $employee->profile_step = 3;
            }
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 3,
                'message' => 'Job preference saved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Step 2 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Save Step 3: Location & Salary
     */
    public function saveStep3(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'preferred_locations' => 'required|array|min:1',
                'preferred_locations.*' => 'string|max:255',
                'expected_salary' => 'nullable|numeric|min:0',
                'current_salary' => 'nullable|numeric|min:0',
                'employment_type' => 'required|string|in:full_time,part_time,contract,freelancer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $employee = $this->getOrCreateEmployee();
            
            $employee->preferred_locations = json_encode($request->preferred_locations);
            $employee->current_salary = $request->current_salary;
            $employee->expected_salary = $request->expected_salary;
            $employee->employment_type = $request->employment_type;
            
            if ($employee->profile_step < 4) {
                $employee->profile_step = 4;
            }
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 4,
                'message' => 'Location and salary saved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Step 3 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error saving data: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Save Step 4: Skills & Languages
     */
    // public function saveStep4(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'skills' => 'nullable|array|max:5',
    //             'skills.*' => 'string|max:100',
    //             'languages' => 'nullable'
    //         ]);
            
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'errors' => $validator->errors()
    //             ], 422);
    //         }
            
    //         $employee = $this->getOrCreateEmployee();
            
    //         if ($request->has('skills') && is_array($request->skills)) {
    //             $employee->skills = json_encode(array_filter($request->skills));
    //         } else {
    //             $employee->skills = json_encode([]);
    //         }
            
    //         $languages = $request->languages;
    //         if (is_string($languages)) {
    //             $languages = json_decode($languages, true);
    //         }
            
    //         if (is_array($languages) && isset($languages[0]['id'])) {
    //             $languageIds = array_column($languages, 'id');
    //             $employee->languages = json_encode($languageIds);
    //         } elseif (is_array($languages)) {
    //             $employee->languages = json_encode($languages);
    //         } else {
    //             $employee->languages = json_encode([]);
    //         }
            
    //         if ($employee->profile_step < 5) {
    //             $employee->profile_step = 5;
    //         }
    //         $employee->save();
            
    //         return response()->json([
    //             'success' => true,
    //             'next_step' => 5,
    //             'message' => 'Skills and languages saved successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Step 4 Error: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error saving data: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }
    
    /**
     * Save Step 5: Education
     */
    public function saveStep5(Request $request)
    {
        try {
            $educationsJson = $request->input('educations');
            $educations = json_decode($educationsJson, true);
            
            if (!$educations || !is_array($educations) || empty($educations)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Education data is required'
                ], 422);
            }
            
            $higherLevels = ['Diploma', 'Graduate', 'Post Graduate', 'PhD'];
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
            
            $employee = $this->getOrCreateEmployee();
            
            $employee->educations_json = json_encode($educations);
            $employee->education_level = $request->input('education_level');
            
            $highestEducation = end($educations);
            if ($highestEducation && isset($highestEducation['college'])) {
                $employee->college_name = $highestEducation['college'];
            }
            if ($highestEducation && isset($highestEducation['degree_id'])) {
                $employee->degree_id = $highestEducation['degree_id'];
            }
            if ($highestEducation && isset($highestEducation['specialization'])) {
                $employee->specialisation = $highestEducation['specialization'];
            }
            
            if ($employee->profile_step < 6) {
                $employee->profile_step = 6;
            }
            $employee->save();
            
            return response()->json([
                'success' => true,
                'next_step' => 6,
                'message' => 'Education details saved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Step 5 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Save Step 6: Work Experience
     */
  /**
 * Save Step 6: Work Experience
 */
/**
 * Save Step 6: Work Experience
 */
public function saveStep6(Request $request)
{
    try {
        $employee = $this->getOrCreateEmployee();
        
        $experiencesJson = $request->input('experiences');
        $experiences = json_decode($experiencesJson, true);
        
        if ($experiences && is_array($experiences) && !empty($experiences)) {
            // Filter out completely empty entries
            $validExperiences = array_filter($experiences, function($experience) {
                return !empty($experience['company_name']);
            });
            
            // Save all experiences (including those without start dates)
            $employee->experiences_json = json_encode(array_values($validExperiences));
            
            // Calculate total experience only from entries with start dates
            $totalMonths = 0;
            foreach ($validExperiences as $experience) {
                if (!empty($experience['start_date'])) {
                    try {
                        $start = new \DateTime($experience['start_date']);
                        $end = isset($experience['currently_working']) && $experience['currently_working'] 
                            ? new \DateTime() 
                            : (isset($experience['end_date']) && !empty($experience['end_date']) 
                                ? new \DateTime($experience['end_date']) 
                                : null);
                        
                        if ($end && $start < $end) {
                            $diff = $start->diff($end);
                            $totalMonths += ($diff->y * 12) + $diff->m;
                        }
                    } catch (\Exception $e) {
                        Log::warning('Date parsing error: ' . $e->getMessage());
                    }
                }
            }
            
            $totalYears = floor($totalMonths / 12);
            $totalMonthsRemaining = $totalMonths % 12;
            $employee->total_experience = $totalYears + ($totalMonthsRemaining / 12);
            
            // Get latest experience (preferring those with start dates)
            $latestExperience = null;
            $latestDate = null;
            foreach ($validExperiences as $experience) {
                if (!empty($experience['start_date'])) {
                    try {
                        $startDate = new \DateTime($experience['start_date']);
                        if (!$latestDate || $startDate > $latestDate) {
                            $latestDate = $startDate;
                            $latestExperience = $experience;
                        }
                    } catch (\Exception $e) {
                        // Skip invalid dates
                    }
                }
            }
            
            // If no experience with start date, use the first experience
            if (!$latestExperience && !empty($validExperiences)) {
                $latestExperience = $validExperiences[0];
            }
            
            if ($latestExperience) {
                $employee->company_name = $latestExperience['company_name'] ?? null;
                $employee->job_title_id = $latestExperience['position_id'] ?? null;
                $employee->work_start_date = $latestExperience['start_date'] ?? null;
                $employee->work_end_date = ($latestExperience['currently_working'] ?? false) ? null : ($latestExperience['end_date'] ?? null);
                $employee->currently_working = $latestExperience['currently_working'] ?? false;
                $employee->notice_period = $latestExperience['notice_period'] ?? null;
            }
        } else {
            $employee->experiences_json = json_encode([]);
        }
        
        if ($employee->profile_step < 7) {
            $employee->profile_step = 7;
        }
        $employee->save();
        
        return response()->json([
            'success' => true,
            'next_step' => 7,
            'message' => 'Work experience saved successfully',
        ]);
    } catch (\Exception $e) {
        Log::error('Step 6 Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
} 
    /**
     * Save Step 7: Availability & Complete
     */
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
            
            $employee = $this->getOrCreateEmployee();
            
            $employee->availability = $request->availability;
            $employee->profile_step = 8; // Mark as complete
            $employee->save();
            
            return response()->json([
                'success' => true,
                'redirect' => route('employee.dashboard'),
                'message' => 'Profile completed successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Step 7 Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get specific step data for editing
     */
    public function getStepData($step)
    {
        $employee = $this->getOrCreateEmployee();
        
        $data = [
            'success' => true,
            'step' => $step,
            'data' => []
        ];
        
        switch ($step) {
            case 1:
                $data['data'] = [
                    'full_name' => $employee->full_name,
                    'email' => $employee->email,
                    'gender' => $employee->gender,
                    'age' => $employee->age,
                    'profile_photo' => $employee->profile_photo ? Storage::url($employee->profile_photo) : null
                ];
                break;
            case 2:
                $data['data'] = [
                    'job_title_id' => $employee->job_title_id,
                    'experience_type' => $employee->experience_type,
                    'exp_years' => $employee->exp_years,
                    'exp_months' => $employee->exp_months
                ];
                break;
            case 3:
                $data['data'] = [
                    'preferred_locations' => is_string($employee->preferred_locations) ? json_decode($employee->preferred_locations, true) : $employee->preferred_locations,
                    'current_salary' => $employee->current_salary,
                    'expected_salary' => $employee->expected_salary,
                    'employment_type' => $employee->employment_type
                ];
                break;
            case 4:
                $data['data'] = [
                    'skills' => is_string($employee->skills) ? json_decode($employee->skills, true) : $employee->skills,
                    'languages' => is_string($employee->languages) ? json_decode($employee->languages, true) : $employee->languages
                ];
                break;
            case 5:
                $data['data'] = [
                    'education_level' => $employee->education_level,
                    'educations' => is_string($employee->educations_json) ? json_decode($employee->educations_json, true) : $employee->educations_json
                ];
                break;
            case 6:
                $data['data'] = [
                    'experiences' => is_string($employee->experiences_json) ? json_decode($employee->experiences_json, true) : $employee->experiences_json
                ];
                break;
            case 7:
                $data['data'] = [
                    'availability' => $employee->availability,
                    'resume' => $employee->resume ? Storage::url($employee->resume) : null
                ];
                break;
        }
        
        return response()->json($data);
    }
    
    /**
     * Dashboard
     */
    public function index()
{
    $employee = $this->getOrCreateEmployee();
    $languages = Language::all(); // Make sure this is passed
    $positions = Position::all(); // For job titles
    $industries = Industry::all(); // For industries
    $degrees = Degree::all(); // For degrees
    
    $completion = $this->getProfileCompletion($employee);
    
    return view('Frontend.Employee.index', compact('employee', 'completion', 'languages', 'positions', 'industries', 'degrees'));
}
    
    /**
     * Get profile completion percentage
     */
  /**
 * Get profile completion percentage
 */
private function getProfileCompletion($employee)
{
    if (!$employee) {
        return 0;
    }
    
    $completedFields = 0;
    $totalFields = 0;
    
    // Step 1: Basic Details (4 fields)
    $totalFields += 4;
    if ($employee->full_name) $completedFields++;
    if ($employee->gender) $completedFields++;
    if ($employee->age) $completedFields++;
    if ($employee->profile_photo) $completedFields++;
    
    // Step 2: Job Preference (2 fields)
    $totalFields += 2;
    if ($employee->job_title_id) $completedFields++;
    if ($employee->experience_type) $completedFields++;
    
    // Step 3: Location & Salary (3 fields)
    $totalFields += 3;
    // Check if preferred_locations is not empty (already decoded or JSON string)
    $preferredLocations = $employee->preferred_locations;
    if (is_string($preferredLocations)) {
        $preferredLocations = json_decode($preferredLocations, true);
    }
    if (!empty($preferredLocations)) $completedFields++;
    
    if ($employee->employment_type) $completedFields++;
    if ($employee->expected_salary || $employee->expected_salary === 0 || $employee->expected_salary === '0') $completedFields++;
    
    // Step 4: Skills & Languages (2 fields)
    $totalFields += 2;
    // Check if skills is not empty (already decoded or JSON string)
    $skills = $employee->skills;
    if (is_string($skills)) {
        $skills = json_decode($skills, true);
    }
    if (!empty($skills)) $completedFields++;
    
    // Check if languages is not empty (already decoded or JSON string)
    $languages = $employee->languages;
    if (is_string($languages)) {
        $languages = json_decode($languages, true);
    }
    if (!empty($languages)) $completedFields++;
    
    // Step 5: Education (1 field)
    $totalFields += 1;
    $educations = $employee->educations_json;
    if (is_string($educations)) {
        $educations = json_decode($educations, true);
    }
    if (!empty($educations)) $completedFields++;
    
    // Step 6: Work Experience (1 field)
    $totalFields += 1;
    $experiences = $employee->experiences_json;
    if (is_string($experiences)) {
        $experiences = json_decode($experiences, true);
    }
    if (!empty($experiences)) $completedFields++;
    
    // Step 7: Availability & Resume (2 fields)
    $totalFields += 2;
    if ($employee->availability) $completedFields++;
    if ($employee->resume) $completedFields++;
    
    if ($totalFields == 0) return 0;
    
    return round(($completedFields / $totalFields) * 100);
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
        
        return view('Frontend.Employee.languages', compact('languages', 'allLanguages'));
    }

   

   

      public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
@extends('Frontend.Employee.layouts')

@section('title', 'Profile Dashboard')

@section('content')
<div>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">My Profile</h1>
        <p class="text-gray-600 mt-2">Manage your professional information and boost your career</p>
    </div>

    <!-- Profile Completion -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Profile Completion</h2>
                <p class="text-sm text-gray-500">Complete your profile to get better job matches</p>
            </div>
            <div class="flex-1 max-w-md">
                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-yellow-500 rounded-full transition-all duration-500" style="width: {{ $completion ?? 0 }}%"></div>
                        </div>
                    </div>
                    <div class="text-2xl font-bold text-yellow-600">{{ $completion ?? 0 }}%</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-4 gap-6">
        <!-- Sidebar Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                <div class="text-center mb-6">
                    @if(isset($employee) && $employee->profile_photo)
                        <div class="w-24 h-24 rounded-full mx-auto mb-3 overflow-hidden shadow-lg">
                            <img src="{{ Storage::url($employee->profile_photo) }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-24 h-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                            <i class="fas fa-user-circle text-white text-5xl"></i>
                        </div>
                    @endif
                    <h3 class="font-semibold text-gray-800">{{ $employee->full_name ?? 'Employee' }}</h3>
                    <p class="text-sm text-gray-500">{{ $employee->jobTitle->name ?? 'Job Seeker' }}</p>
                </div>

                <nav class="space-y-2 sidebar-nav">
                    <a href="/employee/complete-profile/1" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-user mr-2"></i> Edit Personal Details
                    </a>
                    <a href="/employee/complete-profile/2" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-bullseye mr-2"></i> Edit Job Preference
                    </a>
                    <a href="/employee/complete-profile/3" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-map-marker-alt mr-2"></i> Edit Location & Salary
                    </a>
                    <a href="/employee/complete-profile/4" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-language mr-2"></i> Edit Skills & Languages
                    </a>
                    <a href="/employee/complete-profile/5" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-graduation-cap mr-2"></i> Edit Education
                    </a>
                    <a href="/employee/complete-profile/6" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-briefcase mr-2"></i> Edit Work Experience
                    </a>
                    <a href="/employee/complete-profile/7" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-clock mr-2"></i> Edit Availability
                    </a>
                    <a href="/employee/complete-profile/0" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-file-alt mr-2"></i> Edit Resume/CV
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-6">
            
            <!-- Personal Details Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Personal Details</h2>
                    <a href="/employee/complete-profile/1" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm text-gray-500">Full Name</label>
                            <p class="font-medium text-gray-900">{{ $employee->full_name ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Email</label>
                            <p class="font-medium text-gray-900">{{ $employee->email ?? Auth::user()->email ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Mobile Number</label>
                            <p class="font-medium text-gray-900">{{ $employee->mobile_number ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Gender</label>
                            <p class="font-medium text-gray-900">{{ $employee->gender ? ucfirst($employee->gender) : '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Age</label>
                            <p class="font-medium text-gray-900">{{ $employee->age ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Description / Bio</label>
                            <p class="font-medium text-gray-900">{{ $employee->description ?? '—' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Preference Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Job Preference</h2>
                    <a href="/employee/complete-profile/2" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm text-gray-500">Position / Job Title</label>
                            <p class="font-medium text-gray-900">
                                @if(isset($employee) && $employee->job_title_id && isset($positions))
                                    @php $position = $positions->firstWhere('id', $employee->job_title_id); @endphp
                                    {{ $position ? $position->name : '—' }}
                                @else
                                    —
                                @endif
                            </p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Experience Type</label>
                            <p class="font-medium text-gray-900">{{ $employee->experience_type ? ucfirst($employee->experience_type) : '—' }}</p>
                        </div>
                        @if($employee->experience_type == 'experienced')
                        <div>
                            <label class="text-sm text-gray-500">Years of Experience</label>
                            <p class="font-medium text-gray-900">{{ $employee->exp_years ?? 0 }} years</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Months of Experience</label>
                            <p class="font-medium text-gray-900">{{ $employee->exp_months ?? 0 }} months</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Location & Salary Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Location & Salary</h2>
                    <a href="/employee/complete-profile/3" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="text-sm text-gray-500">Preferred Locations</label>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @php
                                    $locations = [];
                                    if(isset($employee) && $employee->preferred_locations) {
                                        if(is_array($employee->preferred_locations)) {
                                            $locations = $employee->preferred_locations;
                                        } elseif(is_string($employee->preferred_locations)) {
                                            $locations = json_decode($employee->preferred_locations, true);
                                        }
                                    }
                                @endphp
                                @if(!empty($locations))
                                    @foreach($locations as $location)
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $location }}</span>
                                    @endforeach
                                @else
                                    <p class="text-gray-500">—</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Employment Type</label>
                            <p class="font-medium text-gray-900">{{ $employee->employment_type ? ucfirst(str_replace('_', ' ', $employee->employment_type)) : '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Current Salary</label>
                            <p class="font-medium text-gray-900">{{ $employee->current_salary ? '₹ ' . number_format($employee->current_salary, 2) : '—' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Expected Salary</label>
                            <p class="font-medium text-gray-900">{{ $employee->expected_salary ? '₹ ' . number_format($employee->expected_salary, 2) : '—' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Skills Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Skills</h2>
                    <a href="/employee/complete-profile/4" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    @php
                        $skills = [];
                        if(isset($employee) && $employee->skills) {
                            if(is_array($employee->skills)) {
                                $skills = $employee->skills;
                            } elseif(is_string($employee->skills)) {
                                $skills = json_decode($employee->skills, true);
                            }
                        }
                    @endphp
                    @if(!empty($skills))
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $skill }}</span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">No skills added yet.</p>
                    @endif
                </div>
            </div>

            <!-- Languages Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Languages</h2>
                    <a href="/employee/complete-profile/4" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    @php
                        $languageIds = [];
                        if(isset($employee) && $employee->languages) {
                            if(is_array($employee->languages)) {
                                $languageIds = $employee->languages;
                            } elseif(is_string($employee->languages)) {
                                $languageIds = json_decode($employee->languages, true);
                            }
                        }
                        
                        $languageNames = [];
                        if(!empty($languageIds) && isset($languages)) {
                            foreach($languageIds as $langId) {
                                $language = $languages->firstWhere('id', $langId);
                                if($language) {
                                    $languageNames[] = $language->name;
                                }
                            }
                        }
                    @endphp
                    
                    @if(!empty($languageNames))
                        <div class="flex flex-wrap gap-2">
                            @foreach($languageNames as $langName)
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                    <i class="fas fa-language mr-1"></i> {{ $langName }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">No languages added yet.</p>
                    @endif
                </div>
            </div>

            <!-- Education Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Education</h2>
                    <a href="/employee/complete-profile/5" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    @php
                        $hasEducations = false;
                        $educationsList = [];
                        
                        if(isset($employee)) {
                            if(isset($employee->educations_json) && $employee->educations_json) {
                                $educationsList = is_array($employee->educations_json) ? $employee->educations_json : json_decode($employee->educations_json, true);
                                $hasEducations = is_array($educationsList) && count($educationsList) > 0;
                            } elseif(isset($employee->education_level) && $employee->education_level) {
                                $hasEducations = true;
                                $educationsList = [['level' => $employee->education_level, 'college' => $employee->college_name ?? '', 'specialization' => $employee->specialisation ?? '', 'degree_id' => $employee->degree_id ?? '']];
                            }
                        }
                    @endphp
                    
                    @if($hasEducations)
                        @foreach($educationsList as $education)
                        <div class="border-b border-gray-100 pb-4 mb-4 last:border-0 last:pb-0">
                            <h3 class="font-semibold text-gray-800">
                                {{ is_array($education) ? ($education['level'] ?? '') : ($education->level ?? '') }}
                                @if((is_array($education) && isset($education['specialization']) && $education['specialization']) || (!is_array($education) && isset($education->specialization) && $education->specialization))
                                    <span class="text-sm font-normal text-gray-600">
                                        in {{ is_array($education) ? $education['specialization'] : $education->specialization }}
                                    </span>
                                @endif
                            </h3>
                            <p class="text-sm text-gray-600 mt-1">{{ is_array($education) ? ($education['college'] ?? '') : ($education->college ?? '') }}</p>
                            @if((is_array($education) && isset($education['passing_year']) && $education['passing_year']) || (!is_array($education) && isset($education->passing_year) && $education->passing_year))
                                <p class="text-xs text-gray-500 mt-1">
                                    Passing Year: {{ is_array($education) ? $education['passing_year'] : $education->passing_year }}
                                </p>
                            @endif
                            @if((is_array($education) && isset($education['degree_id']) && $education['degree_id']) || (!is_array($education) && isset($education->degree_id) && $education->degree_id))
                                @php
                                    $degreeId = is_array($education) ? $education['degree_id'] : $education->degree_id;
                                    $degree = isset($degrees) ? $degrees->firstWhere('id', $degreeId) : null;
                                @endphp
                                @if($degree)
                                    <p class="text-xs text-gray-500">Degree: {{ $degree->name }}</p>
                                @endif
                            @endif
                        </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-center py-4">No education added yet.</p>
                    @endif
                </div>
            </div>

            <!-- Work Experience Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Work Experience</h2>
                    <a href="/employee/complete-profile/6" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    @php
                        $hasExperiences = false;
                        $experiencesList = [];
                        
                        if(isset($employee)) {
                            if(isset($employee->experiences_json) && $employee->experiences_json) {
                                $experiencesList = is_array($employee->experiences_json) ? $employee->experiences_json : json_decode($employee->experiences_json, true);
                                $hasExperiences = is_array($experiencesList) && count($experiencesList) > 0;
                            } elseif(isset($employee->company_name) && $employee->company_name) {
                                $hasExperiences = true;
                                $experiencesList = [[
                                    'company_name' => $employee->company_name, 
                                    'employment_type' => $employee->employment_type, 
                                    'start_date' => $employee->work_start_date, 
                                    'end_date' => $employee->work_end_date, 
                                    'currently_working' => $employee->currently_working,
                                    'notice_period' => $employee->notice_period,
                                    'industry_id' => $employee->industry_id
                                ]];
                            }
                        }
                    @endphp
                    
                    @if($hasExperiences)
                        @foreach($experiencesList as $exp)
                        <div class="border-b border-gray-100 pb-4 mb-4 last:border-0 last:pb-0">
                            <h3 class="font-semibold text-gray-800">{{ is_array($exp) ? ($exp['company_name'] ?? '') : ($exp->company_name ?? '') }}</h3>
                            <p class="text-sm text-gray-600 mt-1">
                                {{ isset($exp['employment_type']) ? ucfirst(str_replace('_', ' ', $exp['employment_type'])) : (isset($exp->employment_type) ? ucfirst(str_replace('_', ' ', $exp->employment_type)) : '') }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                @php
                                    $startDate = is_array($exp) ? ($exp['start_date'] ?? '') : ($exp->start_date ?? '');
                                    $endDate = is_array($exp) ? ($exp['end_date'] ?? '') : ($exp->end_date ?? '');
                                    $currentlyWorking = is_array($exp) ? ($exp['currently_working'] ?? false) : ($exp->currently_working ?? false);
                                @endphp
                                @if($startDate)
                                    {{ date('M Y', strtotime($startDate)) }} - {{ $currentlyWorking ? 'Present' : ($endDate ? date('M Y', strtotime($endDate)) : '') }}
                                @endif
                            </p>
                            @if((is_array($exp) && isset($exp['notice_period']) && $exp['notice_period']) || (!is_array($exp) && isset($exp->notice_period) && $exp->notice_period))
                                <p class="text-xs text-gray-400 mt-1">Notice Period: {{ is_array($exp) ? $exp['notice_period'] : $exp->notice_period }}</p>
                            @endif
                            @if((is_array($exp) && isset($exp['industry_id']) && $exp['industry_id']) || (!is_array($exp) && isset($exp->industry_id) && $exp->industry_id))
                                @php
                                    $industryId = is_array($exp) ? $exp['industry_id'] : $exp->industry_id;
                                    $industry = isset($industries) ? $industries->firstWhere('id', $industryId) : null;
                                @endphp
                                @if($industry)
                                    <p class="text-xs text-gray-400">Industry: {{ $industry->name }}</p>
                                @endif
                            @endif
                        </div>
                        @endforeach
                    @elseif(isset($employee) && $employee->experience_type == 'experienced')
                        <p class="text-gray-500 text-center py-4">No work experience added yet.</p>
                    @else
                        <p class="text-gray-500 text-center py-4">Fresher - No work experience</p>
                    @endif
                </div>
            </div>

            <!-- Availability Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Availability</h2>
                    <a href="/employee/complete-profile/7" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
                <div class="p-6">
                    <div>
                        <label class="text-sm text-gray-500">When can you join?</label>
                        <p class="font-medium text-gray-900 mt-1">
                            @if(isset($employee) && $employee->availability)
                                @if($employee->availability == 'immediately')
                                    <span class="inline-flex items-center gap-2 text-green-600">
                                        <i class="fas fa-check-circle"></i> Immediately
                                    </span>
                                @elseif($employee->availability == 'within_7_days')
                                    <span class="inline-flex items-center gap-2 text-blue-600">
                                        <i class="fas fa-calendar-week"></i> Within 7 Days
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 text-yellow-600">
                                        <i class="fas fa-clock"></i> Flexible
                                    </span>
                                @endif
                            @else
                                —
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Resume Section -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">Resume/CV</h2>
                    <a href="/employee/complete-profile/0" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-upload mr-1"></i> Update Resume
                    </a>
                </div>
                <div class="p-6">
                    @if(isset($employee) && $employee->resume)
                        <div class="flex items-center gap-4 p-4 bg-green-50 rounded-lg">
                            <i class="fas fa-file-pdf text-red-500 text-3xl"></i>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Resume Uploaded</p>
                                <p class="text-xs text-gray-500">{{ basename($employee->resume) }}</p>
                            </div>
                            <a href="{{ Storage::url($employee->resume) }}" target="_blank" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                <i class="fas fa-download mr-1"></i> Download
                            </a>
                        </div>
                    @else
                        <div class="text-center py-6">
                            <i class="fas fa-file-alt text-5xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">No resume uploaded yet.</p>
                            <p class="text-xs text-gray-400 mt-1">Upload your resume to get better job opportunities</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
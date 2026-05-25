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
            
            if(isset($employee) && $employee->experiences_json) {
                $experiencesList = is_array($employee->experiences_json) ? $employee->experiences_json : json_decode($employee->experiences_json, true);
                $hasExperiences = is_array($experiencesList) && count($experiencesList) > 0;
            }
        @endphp
        
        @if($hasExperiences)
            <div class="space-y-6">
                @foreach($experiencesList as $index => $exp)
                <div class="relative pl-6 {{ $index > 0 ? 'pt-6 border-t border-gray-200' : '' }}">
                    <!-- Timeline dot -->
                    <div class="absolute left-0 top-1 w-3 h-3 rounded-full {{ isset($exp['currently_working']) && $exp['currently_working'] == 1 ? 'bg-green-500' : 'bg-yellow-500' }}"></div>
                    <div class="absolute left-[5px] top-4 w-0.5 h-full -z-10 {{ $index < count($experiencesList) - 1 ? 'bg-gray-200' : '' }}"></div>
                    
                    <div class="flex flex-wrap justify-between items-start gap-2">
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg">
                                {{ $exp['company_name'] ?? 'N/A' }}
                            </h3>
                            <p class="text-gray-600">
                                {{ $exp['position_name'] ?? ($exp['position_id'] ?? 'Position not specified') }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ ucfirst(str_replace('_', ' ', $exp['employment_type'] ?? 'N/A')) }}
                            </p>
                        </div>
                        @if(isset($exp['currently_working']) && $exp['currently_working'] == 1)
                            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full flex items-center gap-1">
                                <i class="fas fa-check-circle text-xs"></i> Current Job
                            </span>
                        @endif
                    </div>
                    
                    <div class="mt-3 flex flex-wrap gap-4 text-sm">
                        @if(!empty($exp['start_date']))
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fas fa-calendar-alt text-gray-400"></i>
                                <span>From: {{ date('M Y', strtotime($exp['start_date'])) }}</span>
                            </div>
                        @endif
                        
                        @if(!empty($exp['end_date']) && empty($exp['currently_working']))
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fas fa-calendar-check text-gray-400"></i>
                                <span>To: {{ date('M Y', strtotime($exp['end_date'])) }}</span>
                            </div>
                        @elseif(isset($exp['currently_working']) && $exp['currently_working'] == 1)
                            <div class="flex items-center gap-1 text-green-600">
                                <i class="fas fa-infinity"></i>
                                <span>Present</span>
                            </div>
                        @endif
                        
                        @if(!empty($exp['notice_period']) && isset($exp['currently_working']) && $exp['currently_working'] == 1)
                            <div class="flex items-center gap-1 text-orange-600">
                                <i class="fas fa-hourglass-half"></i>
                                <span>Notice Period: {{ $exp['notice_period'] }}</span>
                            </div>
                        @endif
                    </div>
                    
                    @php
                        // Calculate duration
                        $durationText = '';
                        if (!empty($exp['start_date'])) {
                            $start = \Carbon\Carbon::parse($exp['start_date']);
                            $end = (isset($exp['currently_working']) && $exp['currently_working'] == 1) 
                                ? \Carbon\Carbon::now() 
                                : (!empty($exp['end_date']) ? \Carbon\Carbon::parse($exp['end_date']) : null);
                            
                            if ($end && $start <= $end) {
                                $diff = $start->diff($end);
                                $years = $diff->y;
                                $months = $diff->m;
                                $days = $diff->d;
                                
                                if ($years > 0) {
                                    $durationText .= $years . ' year' . ($years > 1 ? 's' : '');
                                }
                                if ($months > 0) {
                                    if ($years > 0) $durationText .= ' ';
                                    $durationText .= $months . ' month' . ($months > 1 ? 's' : '');
                                }
                                if ($years == 0 && $months == 0 && $days > 0) {
                                    $durationText = $days . ' day' . ($days > 1 ? 's' : '');
                                }
                                if ($years == 0 && $months == 0 && $days == 0) {
                                    $durationText = 'Less than a month';
                                }
                            }
                        }
                    @endphp
                    
                    @if(!empty($durationText))
                        <div class="mt-2 text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium text-gray-700 ml-1">{{ $durationText }}</span>
                        </div>
                    @endif
                    
                    <!-- Industry if available -->
                    @if(!empty($exp['industry_id']))
                        @php
                            $industry = isset($industries) ? $industries->firstWhere('id', $exp['industry_id']) : null;
                        @endphp
                        @if($industry)
                            <div class="mt-1 text-xs text-gray-400">
                                <i class="fas fa-industry mr-1"></i> {{ $industry->name }}
                            </div>
                        @endif
                    @endif
                </div>
                @endforeach
            </div>
            
            <!-- Total Experience Summary -->
            @php
                $totalMonths = 0;
                foreach($experiencesList as $exp) {
                    if (!empty($exp['start_date'])) {
                        $start = \Carbon\Carbon::parse($exp['start_date']);
                        $end = (isset($exp['currently_working']) && $exp['currently_working'] == 1) 
                            ? \Carbon\Carbon::now() 
                            : (!empty($exp['end_date']) ? \Carbon\Carbon::parse($exp['end_date']) : null);
                        if ($end && $start < $end) {
                            $diff = $start->diff($end);
                            $totalMonths += ($diff->y * 12) + $diff->m;
                        }
                    }
                }
                $totalYears = floor($totalMonths / 12);
                $totalRemainingMonths = $totalMonths % 12;
            @endphp
            
            @if($totalMonths > 0)
            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-yellow-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Total Professional Experience</p>
                            <p class="text-xl font-bold text-gray-800">
                                @if($totalYears > 0) {{ $totalYears }} year{{ $totalYears > 1 ? 's' : '' }} @endif
                                @if($totalRemainingMonths > 0) {{ $totalRemainingMonths }} month{{ $totalRemainingMonths > 1 ? 's' : '' }} @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
        @elseif(isset($employee) && $employee->experience_type == 'experienced')
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-briefcase text-gray-400 text-2xl"></i>
                </div>
                <p class="text-gray-500">No work experience added yet.</p>
                <a href="/employee/complete-profile/6" class="mt-3 inline-block text-yellow-600 hover:text-yellow-700 text-sm">
                    <i class="fas fa-plus-circle mr-1"></i> Add your work experience
                </a>
            </div>
        @else
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-graduation-cap text-gray-400 text-2xl"></i>
                </div>
                <p class="text-gray-500">Fresher - No work experience</p>
                <p class="text-xs text-gray-400 mt-1">You have selected "Fresher" as your experience type</p>
            </div>
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
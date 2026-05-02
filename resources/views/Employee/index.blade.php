@extends('Employee.layouts')

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
                    <div class="w-24 h-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-user-circle text-white text-5xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">{{ isset($employee) ? ($employee->full_name ?? 'Employee') : 'Employee' }}</h3>
                    <p class="text-sm text-gray-500">{{ isset($employee) && isset($employee->jobTitle) ? ($employee->jobTitle->name ?? 'Job Seeker') : 'Job Seeker' }}</p>
                </div>

                <nav class="space-y-2 sidebar-nav">
                    <a href="#personal" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-user mr-2"></i> Personal Details
                        @if(isset($employee) && !$employee->full_name) <span class="float-right text-xs text-red-500">!</span> @endif
                    </a>
                    <a href="#education" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-graduation-cap mr-2"></i> Education
                        <span class="float-right text-xs text-gray-400">
                            @php
                                $educationCount = 0;
                                if(isset($employee) && $employee->educations_json) {
                                    $educations = is_array($employee->educations_json) ? $employee->educations_json : json_decode($employee->educations_json, true);
                                    $educationCount = is_array($educations) ? count($educations) : 0;
                                } elseif(isset($employee) && $employee->educations && $employee->educations instanceof \Illuminate\Database\Eloquent\Collection) {
                                    $educationCount = $employee->educations->count();
                                } elseif(isset($employee) && $employee->educations && is_countable($employee->educations)) {
                                    $educationCount = count($employee->educations);
                                }
                            @endphp
                            {{ $educationCount }}
                        </span>
                    </a>
                    <a href="#experience" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-briefcase mr-2"></i> Work Experience
                        <span class="float-right text-xs text-gray-400">
                            @php
                                $experienceCount = 0;
                                if(isset($employee) && $employee->experiences_json) {
                                    $experiences = is_array($employee->experiences_json) ? $employee->experiences_json : json_decode($employee->experiences_json, true);
                                    $experienceCount = is_array($experiences) ? count($experiences) : 0;
                                } elseif(isset($employee) && $employee->experiences && $employee->experiences instanceof \Illuminate\Database\Eloquent\Collection) {
                                    $experienceCount = $employee->experiences->count();
                                } elseif(isset($employee) && $employee->experiences && is_countable($employee->experiences)) {
                                    $experienceCount = count($employee->experiences);
                                }
                            @endphp
                            {{ $experienceCount }}
                        </span>
                    </a>
                    <a href="#language" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-language mr-2"></i> Languages
                        <span class="float-right text-xs text-gray-400">
                            @php
                                $languageCount = 0;
                                if(isset($employee) && $employee->languages) {
                                    if(is_array($employee->languages)) {
                                        $languageCount = count($employee->languages);
                                    } elseif(is_string($employee->languages)) {
                                        $langs = json_decode($employee->languages, true);
                                        $languageCount = is_array($langs) ? count($langs) : 0;
                                    }
                                }
                            @endphp
                            {{ $languageCount }}
                        </span>
                    </a>
                    <a href="#resume" class="nav-link block px-4 py-2 rounded-lg text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                        <i class="fas fa-file-alt mr-2"></i> Resume/CV
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content - Quick View -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Personal Details Summary -->
            <div id="personal" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Personal Details</h2>
                    <a href="{{ route('employee.personal') }}" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-edit"></i> Edit All
                    </a>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Full Name</p>
                        <p class="font-medium">{{ isset($employee) ? ($employee->full_name ?? '—') : '—' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium">{{ isset($employee) ? ($employee->email ?? Auth::user()->email) : Auth::user()->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Mobile Number</p>
                        <p class="font-medium">{{ isset($employee) ? ($employee->mobile_number ?? Auth::user()->mobile) : Auth::user()->mobile }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Gender</p>
                        <p class="font-medium">{{ isset($employee) && $employee->gender ? ucfirst($employee->gender) : '—' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Experience Type</p>
                        <p class="font-medium">{{ isset($employee) && $employee->experience_type ? ucfirst($employee->experience_type) : '—' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Experience</p>
                        <p class="font-medium">
                            @if(isset($employee) && $employee->experience_type == 'experienced')
                                {{ $employee->exp_years ?? 0 }} years {{ $employee->exp_months ?? 0 }} months
                            @else
                                Fresher
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Current Salary</p>
                        <p class="font-medium">{{ isset($employee) && $employee->current_salary ? '₹ ' . number_format($employee->current_salary) : '—' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Expected Salary</p>
                        <p class="font-medium">{{ isset($employee) && $employee->expected_salary ? '₹ ' . number_format($employee->expected_salary) : '—' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Preferred Locations</p>
                        <p class="font-medium">
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
                                {{ implode(', ', $locations) }}
                            @else
                                —
                            @endif
                        </p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Skills</p>
                        <div class="flex flex-wrap gap-2 mt-1">
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
                                @foreach($skills as $skill)
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-sm">{{ $skill }}</span>
                                @endforeach
                            @else
                                —
                            @endif
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">About Me</p>
                        <p class="font-medium">{{ isset($employee) ? ($employee->description ?? '—') : '—' }}</p>
                    </div>
                </div>
            </div>

            <!-- Education Summary -->
            <div id="education" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Education</h2>
                    <a href="{{ route('employee.educations') }}" class="text-yellow-600 hover:text-yellow-700">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                @php
                    $hasEducations = false;
                    $educationsList = [];
                    
                    if(isset($employee)) {
                        // Check if educations is a collection (from relationship)
                        if($employee->educations instanceof \Illuminate\Database\Eloquent\Collection) {
                            $hasEducations = $employee->educations->count() > 0;
                            $educationsList = $employee->educations;
                        }
                        // Check if educations_json exists (JSON storage)
                        elseif(isset($employee->educations_json) && $employee->educations_json) {
                            $educationsList = is_array($employee->educations_json) ? $employee->educations_json : json_decode($employee->educations_json, true);
                            $hasEducations = is_array($educationsList) && count($educationsList) > 0;
                        }
                        // Check if old columns exist
                        elseif(isset($employee->education_level) && $employee->education_level) {
                            $hasEducations = true;
                            $educationsList = [['level' => $employee->education_level, 'college' => $employee->college_name ?? '']];
                        }
                    }
                @endphp
                
                @if($hasEducations)
                    @foreach(array_slice($educationsList, 0, 2) as $education)
                    <div class="border-b border-gray-100 pb-3 mb-3 last:border-0 last:pb-0">
                        <h3 class="font-semibold">
                            {{ is_array($education) ? ($education['level'] ?? '') : ($education->degree ?? $education->education_level ?? '') }}
                            @if(is_array($education) && isset($education['specialization']) && $education['specialization'])
                                in {{ $education['specialization'] }}
                            @elseif(!is_array($education) && isset($education->specialisation) && $education->specialisation)
                                in {{ $education->specialisation }}
                            @endif
                        </h3>
                        <p class="text-sm text-gray-600">{{ is_array($education) ? ($education['college'] ?? '') : ($education->college_name ?? '') }}</p>
                        <p class="text-xs text-gray-500">
                            @if(is_array($education) && isset($education['passing_year']) && $education['passing_year'])
                                Passing Year: {{ $education['passing_year'] }}
                            @elseif(!is_array($education) && isset($education->passing_year) && $education->passing_year)
                                Passing Year: {{ $education->passing_year }}
                            @elseif(!is_array($education) && isset($education->start_date) && $education->start_date)
                                {{ date('Y', strtotime($education->start_date)) }} 
                                - {{ isset($education->end_date) && $education->end_date ? date('Y', strtotime($education->end_date)) : 'Present' }}
                            @endif
                        </p>
                    </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-center py-4">No education added yet.</p>
                @endif
            </div>

            <!-- Experience Summary -->
            <div id="experience" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Work Experience</h2>
                    <a href="{{ route('employee.experiences') }}" class="text-yellow-600 hover:text-yellow-700">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                @php
                    $hasExperiences = false;
                    $experiencesList = [];
                    
                    if(isset($employee)) {
                        // Check if experiences is a collection (from relationship)
                        if($employee->experiences instanceof \Illuminate\Database\Eloquent\Collection) {
                            $hasExperiences = $employee->experiences->count() > 0;
                            $experiencesList = $employee->experiences;
                        }
                        // Check if experiences_json exists (JSON storage)
                        elseif(isset($employee->experiences_json) && $employee->experiences_json) {
                            $experiencesList = is_array($employee->experiences_json) ? $employee->experiences_json : json_decode($employee->experiences_json, true);
                            $hasExperiences = is_array($experiencesList) && count($experiencesList) > 0;
                        }
                        // Check if old columns exist
                        elseif(isset($employee->company_name) && $employee->company_name) {
                            $hasExperiences = true;
                            $experiencesList = [['company_name' => $employee->company_name, 'employment_type' => $employee->employment_type, 'start_date' => $employee->work_start_date, 'end_date' => $employee->work_end_date, 'currently_working' => $employee->currently_working]];
                        }
                    }
                @endphp
                
                @if($hasExperiences)
                    @foreach(array_slice($experiencesList, 0, 2) as $exp)
                    <div class="border-b border-gray-100 pb-3 mb-3 last:border-0 last:pb-0">
                        <h3 class="font-semibold">{{ is_array($exp) ? ($exp['company_name'] ?? '') : ($exp->company_name ?? '') }}</h3>
                        <p class="text-sm text-gray-600">{{ isset($exp['employment_type']) ? ucfirst($exp['employment_type']) : (isset($exp->employment_type) ? ucfirst($exp->employment_type) : '') }}</p>
                        <p class="text-xs text-gray-500">
                            @php
                                $startDate = is_array($exp) ? ($exp['start_date'] ?? '') : ($exp->start_date ?? '');
                                $endDate = is_array($exp) ? ($exp['end_date'] ?? '') : ($exp->end_date ?? '');
                                $currentlyWorking = is_array($exp) ? ($exp['currently_working'] ?? false) : ($exp->currently_working ?? false);
                            @endphp
                            {{ $startDate ? date('M Y', strtotime($startDate)) : '' }} 
                            - {{ $currentlyWorking ? 'Present' : ($endDate ? date('M Y', strtotime($endDate)) : '') }}
                        </p>
                    </div>
                    @endforeach
                @elseif(isset($employee) && $employee->experience_type == 'experienced')
                    <p class="text-gray-500 text-center py-4">No work experience added yet.</p>
                @else
                    <p class="text-gray-500 text-center py-4">Fresher - No work experience</p>
                @endif
            </div>

            <!-- Languages Summary -->
            <div id="language" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Languages</h2>
                    <a href="{{ route('employee.languages') }}" class="text-yellow-600 hover:text-yellow-700">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                @php
                    $languageIds = [];
                    $languageNames = [];
                    
                    if(isset($employee) && $employee->languages) {
                        // Decode languages from JSON
                        if(is_string($employee->languages)) {
                            $languageIds = json_decode($employee->languages, true);
                        } elseif(is_array($employee->languages)) {
                            $languageIds = $employee->languages;
                        }
                        
                        // If language IDs are stored, fetch language names
                        if(!empty($languageIds) && isset($allLanguages)) {
                            foreach($languageIds as $langId) {
                                $language = $allLanguages->firstWhere('id', $langId);
                                if($language) {
                                    $languageNames[] = $language->name;
                                }
                            }
                        }
                    }
                @endphp
                
                @if(!empty($languageNames))
                    <div class="flex flex-wrap gap-2">
                        @foreach($languageNames as $langName)
                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">
                            {{ $langName }}
                        </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">No languages added yet.</p>
                @endif
            </div>

            <!-- Resume Section -->
            <div id="resume" class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Resume/CV</h2>
                    <a href="{{ route('employee.complete.profile') }}" class="text-yellow-600 hover:text-yellow-700">
                        <i class="fas fa-upload"></i> Update Resume
                    </a>
                </div>
                
                @if(isset($employee) && $employee->resume)
                    <div class="flex items-center gap-3 p-4 bg-green-50 rounded-lg">
                        <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                        <div>
                            <p class="font-medium text-gray-800">Resume Uploaded</p>
                            <a href="{{ Storage::url($employee->resume) }}" target="_blank" class="text-sm text-yellow-600 hover:underline">
                                <i class="fas fa-download mr-1"></i> Download Resume
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-file-alt text-4xl text-gray-300 mb-2"></i>
                        <p class="text-gray-500">No resume uploaded yet.</p>
                        <p class="text-xs text-gray-400 mt-1">Upload your resume to get better job opportunities</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
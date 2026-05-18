@extends('Frontend.employee.layouts')

@section('title', isset($isEditing) && $isEditing ? 'Edit Profile - JobFindLink' : 'Complete Your Profile - JobFindLink')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 to-orange-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        
        @if(isset($isEditing) && $isEditing)
        {{-- Edit Mode Header --}}
        <div class="mb-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Edit Your Profile</h1>
                        <p class="text-gray-600 mt-1">Update any section of your profile</p>
                    </div>
                    <a href="{{ route('employee.dashboard') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Back to Dashboard
                    </a>
                </div>
                <div class="mt-4">
                    <div class="bg-gray-200 rounded-full h-2">
                        <div id="profileCompletionBar" class="bg-gradient-to-r from-yellow-500 to-orange-600 h-2 rounded-full transition-all" style="width: {{ $completion ?? 0 }}%"></div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Profile Completion: <span id="completionPercent">{{ $completion ?? 0 }}</span>%</p>
                </div>
            </div>
        </div>
        
        {{-- Edit Mode Section Selector --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 p-4 border-b">
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="1">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">1</span>
                        <span>Basic Details</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="2">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">2</span>
                        <span>Job Preference</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="3">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">3</span>
                        <span>Location & Salary</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="4">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">4</span>
                        <span>Skills & Languages</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="5">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">5</span>
                        <span>Education</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="6">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">6</span>
                        <span>Work Experience</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="7">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">7</span>
                        <span>Availability</span>
                    </div>
                </button>
                <button type="button" class="edit-section-btn px-4 py-2 rounded-lg text-left hover:bg-yellow-50 transition" data-section="0">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">R</span>
                        <span>Resume/CV</span>
                    </div>
                </button>
            </div>
        </div>
        @endif
        
        <!-- Progress Bar (only for create mode) -->
        @if(!isset($isEditing) || !$isEditing)
        <div class="mb-8">
            <div class="bg-white rounded-full h-2 overflow-hidden">
                <div id="progressBar" class="bg-gradient-to-r from-yellow-500 to-orange-600 h-2 transition-all duration-500" style="width: 0%"></div>
            </div>
            <div class="flex justify-between mt-2 text-sm text-gray-600">
                <span>Resume Upload</span>
                <span>Basic Details</span>
                <span>Job Preference</span>
                <span>Location & Salary</span>
                <span>Skills & Languages</span>
                <span>Education</span>
                <span>Experience</span>
                <span>Availability</span>
            </div>
        </div>
        @endif

        <!-- Alert Messages -->
        <div id="alertMessage" class="hidden mb-4 p-4 rounded-lg"></div>

        <!-- Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <form id="profileForm" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- STEP 0: UPLOAD RESUME (for create mode) -->
                @if(!isset($isEditing) || !$isEditing)
                <div class="step" data-step="0" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Upload Your Resume/CV</h2>
                        <p class="text-yellow-100 mt-1">Start by uploading your resume</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Resume (PDF, DOC, DOCX - Max 5MB)
                                </label>
                                
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-yellow-500 transition cursor-pointer"
                                     onclick="document.getElementById('resume').click()">
                                    <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="hidden">
                                    
                                    <div id="resumeUploadContent">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600">Click to upload or drag and drop</p>
                                        <p class="text-xs text-gray-500">PDF, DOC, DOCX (Max 5MB)</p>
                                    </div>
                                    
                                    <div id="resumeFileName" class="mt-3 text-center hidden"></div>
                                </div>
                                
                                <p class="text-xs text-gray-500 mt-2">ℹ️ You can skip this step and upload later, but a resume increases your chances of getting hired.</p>
                            </div>
                            
                            <div class="flex justify-end pt-4">
                                <button type="button" class="save-resume-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    Continue to Basic Details →
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- EDIT MODE RESUME STEP -->
                @if(isset($isEditing) && $isEditing)
                <div class="step" data-step="0" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Update Resume/CV</h2>
                        <p class="text-yellow-100 mt-1">Manage your resume document</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Upload New Resume (PDF, DOC, DOCX - Max 5MB)
                                </label>

                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-yellow-500 transition cursor-pointer"
                                     onclick="document.getElementById('edit_resume').click()">
                                    <input type="file" name="edit_resume" id="edit_resume" accept=".pdf,.doc,.docx" class="hidden">

                                    <div id="editResumeUploadContent">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600">Click to upload a new resume</p>
                                        <p class="text-xs text-gray-500">PDF, DOC, DOCX (Max 5MB)</p>
                                    </div>

                                    <div id="editResumeFileName" class="mt-3 text-center @if(!$employee || !$employee->resume) hidden @endif">
                                        @if($employee && $employee->resume)
                                            <div class="flex items-center justify-between bg-green-50 p-4 rounded-lg border border-green-200">
                                                <div class="flex items-center gap-3">
                                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <div>
                                                        <p class="text-sm font-semibold text-green-700">{{ basename($employee->resume) }}</p>
                                                        <p class="text-xs text-gray-500">Current resume</p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-2">
                                                    <button type="button" class="download-edit-resume-btn px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm">
                                                        Download
                                                    </button>
                                                    <button type="button" class="remove-edit-resume-btn px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <p class="text-xs text-gray-500 mt-2">ℹ️ Upload a new resume to replace the existing one.</p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" class="save-edit-resume-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    Update Resume
                                </button>
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- STEP 1: BASIC DETAILS -->
                <div class="step" data-step="1" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Basic Details' : 'Basic Details' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your personal information' : 'Tell us about yourself' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="full_name" id="full_name" 
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                       placeholder="Enter your full name" value="{{ old('full_name', $employee->full_name ?? '') }}">
                                <p class="text-red-500 text-xs mt-1 hidden" id="full_name_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" id="email" pattern="^[a-zA-Z0-9._%+-]+@(gmail|yahoo|hotmail|outlook)\.(com|in)$" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition" placeholder="your@gmail.com" value="{{ old('email', $employee->email ?? Auth::user()->email ?? '') }}">
                                <p class="text-red-500 text-xs mt-1 hidden" id="email_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender <span class="text-red-500">*</span></label>
                                <div class="flex gap-6">
                                    <label class="flex items-center"><input type="radio" name="gender" value="male" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'male' ? 'checked' : '' }}> Male</label>
                                    <label class="flex items-center"><input type="radio" name="gender" value="female" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'female' ? 'checked' : '' }}> Female</label>
                                    <label class="flex items-center"><input type="radio" name="gender" value="other" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'other' ? 'checked' : '' }}> Other</label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="gender_error"></p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Age <span class="text-red-500">*</span></label>
                                <input type="text" name="age" id="age" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition" placeholder="25" value="{{ old('age', $employee->age ?? '') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3)" maxlength="3">
                                <p class="text-red-500 text-xs mt-1 hidden" id="age_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                                <div class="flex items-center gap-4">
                                    <div id="profilePhotoPreview" class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden flex items-center justify-center">
                                        @if($employee && $employee->profile_photo)
                                            <img src="{{ Storage::url($employee->profile_photo) }}" class="w-full h-full object-cover">
                                        @else
                                            <img id="profilePhotoImg" src="" alt="Profile Preview" class="hidden w-full h-full object-cover">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="profile_photo_error"></p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                @if(!isset($isEditing) || !$isEditing)
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                @endif
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    {{ isset($isEditing) && $isEditing ? 'Update Changes' : 'Save & Continue' }}
                                </button>
                                @if(isset($isEditing) && $isEditing)
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: JOB PREFERENCE -->
                <div class="step" data-step="2" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Job Preference' : 'Job Preference' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your job preferences' : 'Tell us what role you\'re looking for' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Position <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="positionSelect" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                        <option value="">Select a position...</option>
                                        @foreach($positions ?? [] as $position)
                                            <option value="{{ $position->id }}" {{ old('job_title_id', $employee->job_title_id ?? '') == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="job_title_id" id="job_title_id" value="{{ old('job_title_id', $employee->job_title_id ?? '') }}">
                                <p class="text-red-500 text-xs mt-1 hidden" id="job_title_id_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Experience Type <span class="text-red-500">*</span></label>
                                <div class="flex gap-6">
                                    <label class="flex items-center">
                                        <input type="radio" name="experience_type" value="fresher" class="mr-2 exp-type" {{ old('experience_type', $employee->experience_type ?? '') == 'fresher' ? 'checked' : '' }}> 
                                        Fresher
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="experience_type" value="experienced" class="mr-2 exp-type" {{ old('experience_type', $employee->experience_type ?? '') == 'experienced' ? 'checked' : '' }}> 
                                        Experienced
                                    </label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="experience_type_error"></p>
                            </div>
                            
                            <div id="exp_details" style="{{ old('experience_type', $employee->experience_type ?? '') == 'experienced' ? '' : 'display: none;' }}">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                                        <select name="exp_years" id="exp_years" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                            <option value="0">0 Year</option>
                                            @for($i=1; $i<=30; $i++)
                                                <option value="{{ $i }}" {{ old('exp_years', $employee->exp_years ?? 0) == $i ? 'selected' : '' }}>{{ $i }} Year{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                        <p class="text-red-500 text-xs mt-1 hidden" id="exp_years_error"></p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Months</label>
                                        <select name="exp_months" id="exp_months" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                            <option value="0">0 Month</option>
                                            @for($i=1; $i<=11; $i++)
                                                <option value="{{ $i }}" {{ old('exp_months', $employee->exp_months ?? 0) == $i ? 'selected' : '' }}>{{ $i }} Month{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                        <p class="text-red-500 text-xs mt-1 hidden" id="exp_months_error"></p>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Note: This experience will be automatically calculated from your work history later.</p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                @if(!isset($isEditing) || !$isEditing)
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                @endif
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    {{ isset($isEditing) && $isEditing ? 'Update Changes' : 'Save & Continue' }}
                                </button>
                                @if(isset($isEditing) && $isEditing)
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: LOCATION & SALARY -->
                <div class="step" data-step="3" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Location & Salary' : 'Location & Salary' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your location and salary preferences' : 'Where do you want to work and employment preferences' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Location <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="citySelect" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                        <option value="">Search for a city...</option>
                                        @foreach($cities['cities'] ?? [] as $city)
                                            <option value="{{ $city }}">{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="selectedCitiesContainer" class="flex flex-wrap gap-2 mt-3 min-h-[50px]"></div>
                                <input type="hidden" name="preferred_locations" id="preferred_locations">
                                <p class="text-xs text-gray-500 mt-2">Tip: You can select up to 10 cities.</p>
                                <p class="text-red-500 text-xs mt-1 hidden" id="preferred_locations_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Employment Type <span class="text-red-500">*</span></label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-lg hover:border-yellow-500 cursor-pointer transition">
                                        <input type="radio" name="employment_type" value="full_time" class="mr-2" {{ old('employment_type', $employee->employment_type ?? '') == 'full_time' ? 'checked' : '' }}> Full-Time
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-lg hover:border-yellow-500 cursor-pointer transition">
                                        <input type="radio" name="employment_type" value="part_time" class="mr-2" {{ old('employment_type', $employee->employment_type ?? '') == 'part_time' ? 'checked' : '' }}> Part-Time
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-lg hover:border-yellow-500 cursor-pointer transition">
                                        <input type="radio" name="employment_type" value="contract" class="mr-2" {{ old('employment_type', $employee->employment_type ?? '') == 'contract' ? 'checked' : '' }}> Contract
                                    </label>
                                    <label class="flex items-center p-3 border-2 border-gray-300 rounded-lg hover:border-yellow-500 cursor-pointer transition">
                                        <input type="radio" name="employment_type" value="freelancer" class="mr-2" {{ old('employment_type', $employee->employment_type ?? '') == 'freelancer' ? 'checked' : '' }}> Freelancer
                                    </label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="employment_type_error"></p>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Salary (₹)</label>
                                    <input type="number" name="current_salary" id="current_salary" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500" placeholder="0" value="{{ old('current_salary', $employee->current_salary ?? '') }}">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Expected Salary (₹)</label>
                                    <input type="number" name="expected_salary" id="expected_salary" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500" placeholder="0" value="{{ old('expected_salary', $employee->expected_salary ?? '') }}">
                                    <p class="text-red-500 text-xs mt-1 hidden" id="expected_salary_error"></p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                @if(!isset($isEditing) || !$isEditing)
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                @endif
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    {{ isset($isEditing) && $isEditing ? 'Update Changes' : 'Save & Continue' }}
                                </button>
                                @if(isset($isEditing) && $isEditing)
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: SKILLS & LANGUAGES -->
                <div class="step" data-step="4" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Skills & Languages' : 'Skills & Languages' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your skills and language proficiency' : 'Tell us what you\'re good at' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Skills (Max 5)</label>
                                <div id="skills_container" class="space-y-2 mb-3"></div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="skills_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Languages</label>
                                <div id="languageButtonsContainer" class="flex flex-wrap gap-2 mb-3"></div>
                                <div id="selectedLanguagesContainer" class="flex flex-wrap gap-2 mt-3"></div>
                                <input type="hidden" name="languages" id="languagesInput">
                                <p class="text-red-500 text-xs mt-1 hidden" id="languages_error"></p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                @if(!isset($isEditing) || !$isEditing)
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                @endif
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    {{ isset($isEditing) && $isEditing ? 'Update Changes' : 'Save & Continue' }}
                                </button>
                                @if(isset($isEditing) && $isEditing)
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 5: EDUCATION -->
                <div class="step" data-step="5" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Education' : 'Education' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your educational background' : 'Your educational background' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Education Level <span class="text-red-500">*</span></label>
                                <select name="education_level" id="education_level" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                    <option value="">Select Education Level</option>
                                    <option value="Below 10th" {{ old('education_level', $employee->education_level ?? '') == 'Below 10th' ? 'selected' : '' }}>Below 10th</option>
                                    <option value="10th" {{ old('education_level', $employee->education_level ?? '') == '10th' ? 'selected' : '' }}>10th Pass</option>
                                    <option value="12th" {{ old('education_level', $employee->education_level ?? '') == '12th' ? 'selected' : '' }}>12th Pass</option>
                                    <option value="Diploma" {{ old('education_level', $employee->education_level ?? '') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                    <option value="Graduate" {{ old('education_level', $employee->education_level ?? '') == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                                    <option value="Post Graduate" {{ old('education_level', $employee->education_level ?? '') == 'Post Graduate' ? 'selected' : '' }}>Post Graduate</option>
                                    <option value="PhD" {{ old('education_level', $employee->education_level ?? '') == 'PhD' ? 'selected' : '' }}>PhD</option>
                                </select>
                                <p class="text-red-500 text-xs mt-1 hidden" id="education_level_error"></p>
                            </div>
                            
                            <div id="education_fields_container"></div>
                            
                            <div class="flex justify-between pt-4">
                                @if(!isset($isEditing) || !$isEditing)
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                @endif
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    {{ isset($isEditing) && $isEditing ? 'Update Changes' : 'Save & Continue' }}
                                </button>
                                @if(isset($isEditing) && $isEditing)
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 6: WORK EXPERIENCE -->
                <div class="step" data-step="6" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Work Experience' : 'Work Experience' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your professional experience' : 'Your professional journey (Optional)' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div id="experiences_container"></div>
                            
                            <button type="button" id="addMoreExperienceBtn" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add More Experience
                            </button>
                            
                            <div class="flex justify-between pt-4">
                                @if(!isset($isEditing) || !$isEditing)
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                @endif
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">
                                    {{ isset($isEditing) && $isEditing ? 'Update Changes' : 'Save & Continue' }}
                                </button>
                                @if(isset($isEditing) && $isEditing)
                                <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 7: AVAILABILITY & SUBMIT -->
                <div class="step" data-step="7" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">{{ isset($isEditing) && $isEditing ? 'Edit Availability' : 'Availability' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($isEditing) && $isEditing ? 'Update your availability' : 'Final step to complete your profile' }}</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">When can you join? <span class="text-red-500">*</span></label>
                                <div class="flex gap-6">
                                    <label class="flex items-center"><input type="radio" name="availability" value="immediately" class="mr-2" {{ old('availability', $employee->availability ?? '') == 'immediately' ? 'checked' : '' }}> Immediately</label>
                                    <label class="flex items-center"><input type="radio" name="availability" value="within_7_days" class="mr-2" {{ old('availability', $employee->availability ?? '') == 'within_7_days' ? 'checked' : '' }}> Within 7 Days</label>
                                    <label class="flex items-center"><input type="radio" name="availability" value="flexible" class="mr-2" {{ old('availability', $employee->availability ?? '') == 'flexible' ? 'checked' : '' }}> Flexible</label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="availability_error"></p>
                            </div>
                        </div>
                        
                        <div class="flex justify-between pt-4">
                            @if(!isset($isEditing) || !$isEditing)
                            <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                            @endif
                            @if(isset($isEditing) && $isEditing)
                            <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Update Changes</button>
                            <button type="button" class="cancel-edit px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                            @else
                            <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Complete Profile</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
    // Initialize currentStep based on edit mode and editStep parameter
    let currentStep = 0;
    let totalSteps = 8;
    let selectedCities = [];
    let selectedLanguages = [];
    let uploadedResumeFile = null;
    let existingResumeUrl = @json($employee && $employee->resume ? asset('storage/' . $employee->resume) : null);
    let existingResumeName = @json($employee && $employee->resume ? basename($employee->resume) : null);
    let experienceCounter = 0;
    let isEditMode = @json(isset($isEditing) && $isEditing);
    let isSaving = false; // Prevent multiple saves

    // Set current step based on edit mode
    @if(isset($isEditing) && $isEditing)
        @if(isset($editStep))
            currentStep = {{ $editStep }};
        @else
            currentStep = 1;
        @endif
    @else
        currentStep = 0;
    @endif

    let allPositions = @json($positions ?? []);
    let allIndustries = @json($industries ?? []);
    let allCities = @json($cities['cities'] ?? []);
    let allDegrees = @json($degrees ?? []);
    let allLanguages = @json($languages ?? []);

    let existingEmployee = @json($employee);
    let existingLanguages = @json($employee && $employee->languages ? (is_string($employee->languages) ? json_decode($employee->languages, true) : $employee->languages) : []);
    let existingSkills = @json($employee && $employee->skills ? (is_string($employee->skills) ? json_decode($employee->skills, true) : $employee->skills) : []);
    let existingCities = @json($employee && $employee->preferred_locations ? (is_string($employee->preferred_locations) ? json_decode($employee->preferred_locations, true) : $employee->preferred_locations) : []);
    let existingExperiences = @json($employee && $employee->experiences_json ? $employee->experiences_json : []);
    let existingEducations = @json($employee && $employee->educations_json ? $employee->educations_json : []);

    function showAlert(message, type = 'error') {
        let alertDiv = $('#alertMessage');
        alertDiv.removeClass('hidden bg-green-100 text-green-700 bg-red-100 text-red-700');
        
        if (type === 'success') {
            alertDiv.addClass('bg-green-100 text-green-700');
        } else {
            alertDiv.addClass('bg-red-100 text-red-700');
        }
        
        alertDiv.html('<div class="flex items-center">' +
            '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">' +
            (type === 'success' ? 
                '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>' :
                '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>'
            ) +
            '</svg>' + message + '</div>');
        alertDiv.removeClass('hidden');
        
        setTimeout(() => {
            alertDiv.addClass('hidden');
        }, 5000);
    }

    function clearErrors() {
        $('[id$="_error"]').addClass('hidden').text('');
        $('input, select').removeClass('border-red-500');
    }

    function showFieldError(field, message) {
        $(`#${field}_error`).removeClass('hidden').text(message);
        $(`#${field}`).addClass('border-red-500');
    }

    function showStep(step) {
        $('.step').hide();
        $(`.step[data-step="${step}"]`).show();
        
        if (!isEditMode) {
            let progressPercent = ((step + 1) / totalSteps) * 100;
            $('#progressBar').css('width', progressPercent + '%');
        }
        clearErrors();
        
        if (step === 5) {
            let selectedLevel = $('#education_level').val();
            if (selectedLevel && selectedLevel !== '') {
                generateEducationFields(selectedLevel, existingEducations);
            }
        }
        
        if (step === 6) {
            if ($('.experience-entry').length === 0 && existingExperiences && existingExperiences.length > 0) {
                existingExperiences.forEach(exp => {
                    addExperienceEntry(exp);
                });
            } else if ($('.experience-entry').length === 0) {
                addExperienceEntry(null);
            }
        }
    }

    function initializeSelect2() {
        $('#positionSelect').select2({
            placeholder: "Search for a position...",
            allowClear: true,
            width: '100%'
        }).on('change', function() {
            $('#job_title_id').val($(this).val());
        });

        $('#citySelect').select2({
            placeholder: "Search for a city...",
            allowClear: true,
            width: '100%'
        }).on('select2:select', function(e) {
            let city = e.params.data.text;
            if (!selectedCities.includes(city) && selectedCities.length < 10) {
                selectedCities.push(city);
                updateCitiesDisplay();
                showAlert(city + ' added successfully!', 'success');
            } else if (selectedCities.length >= 10) {
                showAlert('Maximum 10 cities can be selected');
            }
            $(this).val(null).trigger('change');
        });
    }

    function generateEducationFields(selectedLevel, savedData = null) {
        let container = $('#education_fields_container');
        container.empty();
        
        if (!selectedLevel) return;
        
        if (selectedLevel === 'Below 10th' || selectedLevel === '10th' || selectedLevel === '12th') {
            container.html('<div class="text-center text-gray-500 p-4">No additional details required for this education level.</div>');
            return;
        }
        
        let fieldSets = [];
        
        switch(selectedLevel) {
            case 'Diploma':
                fieldSets = [{ level: selectedLevel, title: selectedLevel + ' Details', required: true }];
                break;
            case 'Graduate':
                fieldSets = [{ level: selectedLevel, title: selectedLevel + ' Details', required: true }];
                break;
            case 'Post Graduate':
                fieldSets = [
                    { level: 'Graduate', title: 'Graduate Details', required: true },
                    { level: 'Post Graduate', title: 'Post Graduate Details', required: true }
                ];
                break;
            case 'PhD':
                fieldSets = [
                    { level: 'Graduate', title: 'Graduate Details', required: true },
                    { level: 'Post Graduate', title: 'Post Graduate Details', required: true },
                    { level: 'PhD', title: 'PhD Details', required: true }
                ];
                break;
            default:
                fieldSets = [];
        }
        
        fieldSets.forEach((fieldSet, index) => {
            let savedEducation = savedData ? savedData.find(edu => edu.level === fieldSet.level) : null;
            
            let html = `
                <div class="education-field-set border border-gray-200 rounded-xl p-4 mb-4 bg-gray-50" data-level="${fieldSet.level}">
                    <h3 class="text-md font-semibold text-gray-800 mb-3 pb-2 border-b">${fieldSet.title}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">College / University Name <span class="text-red-500">*</span></label>
                            <input type="text" class="college-name w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                                   value="${savedEducation ? (savedEducation.college || '') : ''}" 
                                   placeholder="Enter college/university name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Degree / Course <span class="text-red-500">*</span></label>
                            <select class="degree-select w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                <option value="">Select Degree</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                            <input type="text" class="specialization w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                                   value="${savedEducation ? (savedEducation.specialization || '') : ''}" 
                                   placeholder="e.g., Computer Science, Finance">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Passing Year</label>
                            <select class="passing-year w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                <option value="">Select Year</option>`;
            
            let currentYear = new Date().getFullYear();
            for (let year = currentYear; year >= 1950; year--) {
                let selected = (savedEducation && savedEducation.passing_year == year) ? 'selected' : '';
                html += `<option value="${year}" ${selected}>${year}</option>`;
            }
            
            html += `
                            </select>
                        </div>
                    </div>
                </div>
            `;
            
            container.append(html);
        });
        
        setTimeout(function() {
            $('.education-field-set').each(function() {
                let level = $(this).data('level');
                let $degreeSelect = $(this).find('.degree-select');
                let savedEducation = savedData ? savedData.find(edu => edu.level === level) : null;
                loadDegreesForLevel(level, $degreeSelect, savedEducation ? savedEducation.degree_id : null);
            });
        }, 100);
    }

    function loadDegreesForLevel(educationLevel, $degreeSelect, selectedDegreeId = null) {
        let degreesForLevel = [];
        
        if (educationLevel === '12th') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === '12th' || d.name === 'Intermediate' || d.name === 'High School' || d.name === 'HSC'
            );
        } else if (educationLevel === 'Diploma') {
            degreesForLevel = allDegrees.filter(d => d.name.toLowerCase().includes('diploma'));
        } else if (educationLevel === 'Graduate') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === "Bachelor's" || d.name === "Bachelor of Arts" || d.name === "Bachelor of Science" || 
                d.name === "Bachelor of Commerce" || d.name === "Bachelor of Engineering" || d.name === "Bachelor of Technology" ||
                d.name.toLowerCase().includes('bachelor') || d.name === "B.A." || d.name === "B.Sc." || d.name === "B.Com." || 
                d.name === "B.E." || d.name === "B.Tech" || d.name === "BCA" || d.name === "BBA"
            );
        } else if (educationLevel === 'Post Graduate') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === "Master's" || d.name === "Master of Arts" || d.name === "Master of Science" || 
                d.name === "Master of Commerce" || d.name === "Master of Engineering" || d.name === "Master of Technology" || 
                d.name === "MBA" || d.name === "MCA" || d.name.toLowerCase().includes('master') || 
                d.name === "M.A." || d.name === "M.Sc." || d.name === "M.Com." || d.name === "M.E." || d.name === "M.Tech"
            );
        } else if (educationLevel === 'PhD') {
            degreesForLevel = allDegrees.filter(d => d.name.toLowerCase().includes('phd') || d.name.toLowerCase().includes('doctor') || d.name === "Doctorate");
        }

        let options = '<option value="">Select Degree</option>';
        degreesForLevel.forEach(degree => {
            let selected = (selectedDegreeId && selectedDegreeId == degree.id) ? 'selected' : '';
            options += `<option value="${degree.id}" ${selected}>${degree.name}</option>`;
        });
        $degreeSelect.html(options);
    }

    function collectEducationsData() {
        let educations = [];
        let selectedLevel = $('#education_level').val();
        
        if (!selectedLevel) {
            showAlert('Please select education level', 'error');
            return null;
        }
        
        if (selectedLevel === 'Below 10th' || selectedLevel === '10th' || selectedLevel === '12th') {
            return [{ level: selectedLevel }];
        }
        
        let fieldSets = $('.education-field-set');
        if (fieldSets.length === 0) {
            showAlert('Please select an education level first', 'error');
            return null;
        }
        
        let hasError = false;
        fieldSets.each(function() {
            let level = $(this).data('level');
            let college = $(this).find('.college-name').val();
            let degreeId = $(this).find('.degree-select').val();
            let specialization = $(this).find('.specialization').val();
            let passingYear = $(this).find('.passing-year').val();
            
            if (!college || college.trim() === '') {
                showAlert(`College name is required for ${level}`, 'error');
                hasError = true;
                return false;
            }
            if (!degreeId || degreeId === '') {
                showAlert(`Degree is required for ${level}`, 'error');
                hasError = true;
                return false;
            }
            
            let eduData = { level: level, college: college.trim(), degree_id: degreeId };
            if (specialization && specialization.trim()) eduData.specialization = specialization.trim();
            if (passingYear && passingYear) eduData.passing_year = passingYear;
            educations.push(eduData);
        });
        
        if (hasError) return null;
        return educations;
    }

    function uploadResumeFile(file) {
        uploadedResumeFile = file;
        
        $('#resumeFileName').removeClass('hidden').html(`
            <div class="flex items-center justify-between bg-green-50 p-4 rounded-lg border border-green-200">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-green-700">${file.name}</p>
                        <p class="text-xs text-gray-500">${(file.size / 1024).toFixed(2)} KB</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="button" class="download-resume-btn px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-1 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download
                    </button>
                    <button type="button" class="remove-resume-btn px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition flex items-center gap-1 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Remove
                    </button>
                </div>
            </div>
        `);
        
        $('#resumeUploadContent').addClass('hidden');
        showAlert('Resume loaded successfully!', 'success');
    }

    // Function to handle edit mode resume upload
    function uploadEditResume(file) {
        let formData = new FormData();
        formData.append('resume', file);
        formData.append('_token', '{{ csrf_token() }}');
        
        $.ajax({
            url: '{{ route("employee.upload.resume") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    existingResumeUrl = response.path;
                    existingResumeName = file.name;
                    showAlert('Resume updated successfully!', 'success');
                    updateEditResumeDisplay(file);
                }
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'Error uploading resume');
            }
        });
    }

    function updateEditResumeDisplay(file) {
        $('#editResumeFileName').removeClass('hidden').html(`
            <div class="flex items-center justify-between bg-green-50 p-4 rounded-lg border border-green-200">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-green-700">${file.name}</p>
                        <p class="text-xs text-gray-500">${(file.size / 1024).toFixed(2)} KB</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="button" class="download-edit-resume-btn px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-1 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download
                    </button>
                    <button type="button" class="remove-edit-resume-btn px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition flex items-center gap-1 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Remove
                    </button>
                </div>
            </div>
        `);
        $('#editResumeUploadContent').addClass('hidden');
    }

    function removeEditResume() {
        $.ajax({
            url: '{{ route("employee.remove.resume") }}',
            type: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.success) {
                    existingResumeUrl = null;
                    existingResumeName = null;
                    $('#edit_resume').val('');
                    $('#editResumeFileName').addClass('hidden').empty();
                    $('#editResumeUploadContent').removeClass('hidden');
                    showAlert('Resume removed successfully', 'success');
                }
            },
            error: function() {
                showAlert('Error removing resume');
            }
        });
    }

    function initializeSkills() {
        $('#skills_container').empty();
        if (existingSkills && existingSkills.length > 0) {
            existingSkills.forEach(skill => {
                $('#skills_container').append(createSkillInput(skill));
            });
        } else {
            $('#skills_container').append(createSkillInput(''));
        }
        addAddSkillButton();
    }
    
    function createSkillInput(value = '') {
        return `
            <div class="skill-group flex gap-2 mb-2">
                <input type="text" class="skill-input flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition" 
                       placeholder="e.g., PHP, Laravel, React" value="${escapeHtml(value)}">
                <button type="button" class="remove-skill bg-red-500 text-white px-4 rounded-lg hover:bg-red-600 transition shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Remove
                </button>
            </div>
        `;
    }
    
    function addAddSkillButton() {
        if ($('#addSkillBtn').length === 0 && $('.skill-group').length < 5) {
            $('#skills_container').append(`
                <div class="mt-2">
                    <button type="button" id="addSkillBtn" class="add-skill bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:shadow-lg transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Skill
                    </button>
                </div>
            `);
        }
    }
    
    function escapeHtml(text) {
        if (!text) return '';
        return text.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }
    
    function initializeLanguages() {
        if (!allLanguages || allLanguages.length === 0) {
            $('#languageButtonsContainer').html('<p class="text-gray-500">No languages available</p>');
            return;
        }
        
        let allLangList = allLanguages;
        let initialShowCount = 12;
        let currentShowCount = initialShowCount;
        let showMore = allLangList.length > initialShowCount;
        
        function renderLanguageButtons() {
            let buttonsHtml = '';
            let languagesToShow = allLangList.slice(0, currentShowCount);
            
            languagesToShow.forEach(language => {
                let isSelected = selectedLanguages.some(l => l.id == language.id);
                let selectedClass = isSelected ? 'bg-yellow-500 text-white border-yellow-500' : 'bg-white text-gray-700 border-gray-300 hover:border-yellow-500';
                buttonsHtml += `
                    <button type="button" class="language-btn px-3 py-1.5 text-sm rounded-full border-2 transition ${selectedClass}" data-id="${language.id}" data-name="${language.name}">
                        ${language.name}
                    </button>
                `;
            });
            
            if (showMore && currentShowCount < allLangList.length) {
                buttonsHtml += `
                    <button type="button" id="showMoreLanguagesBtn" class="px-3 py-1.5 text-sm rounded-full border-2 border-blue-500 text-blue-600 hover:bg-blue-50 transition">
                        Show More (+${allLangList.length - currentShowCount})
                    </button>
                `;
            } else if (showMore && currentShowCount >= allLangList.length) {
                buttonsHtml += `
                    <button type="button" id="showLessLanguagesBtn" class="px-3 py-1.5 text-sm rounded-full border-2 border-gray-500 text-gray-600 hover:bg-gray-50 transition">
                        Show Less
                    </button>
                `;
            }
            
            $('#languageButtonsContainer').html(buttonsHtml);
            
            $('.language-btn').off('click').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let existingIndex = selectedLanguages.findIndex(l => l.id == id);
                
                if (existingIndex !== -1) {
                    selectedLanguages.splice(existingIndex, 1);
                    $(this).removeClass('bg-yellow-500 text-white border-yellow-500').addClass('bg-white text-gray-700 border-gray-300');
                } else {
                    selectedLanguages.push({ id: id, name: name });
                    $(this).addClass('bg-yellow-500 text-white border-yellow-500').removeClass('bg-white text-gray-700 border-gray-300');
                }
                updateLanguagesDisplay();
            });
        }
        
        renderLanguageButtons();
        
        $(document).off('click', '#showMoreLanguagesBtn').on('click', '#showMoreLanguagesBtn', function() {
            currentShowCount = Math.min(currentShowCount + 8, allLangList.length);
            renderLanguageButtons();
        });
        
        $(document).off('click', '#showLessLanguagesBtn').on('click', '#showLessLanguagesBtn', function() {
            currentShowCount = initialShowCount;
            renderLanguageButtons();
        });
    }
    
    function updateLanguagesDisplay() {
        if (selectedLanguages.length === 0) {
            $('#selectedLanguagesContainer').html('<p class="text-gray-400 text-sm">No languages selected. Click on the buttons above to select.</p>');
        } else {
            $('#selectedLanguagesContainer').html(selectedLanguages.map(lang => 
                `<span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-full flex items-center gap-2 text-sm">
                    ${lang.name}
                    <button type="button" class="remove-lang ml-1 text-red-500 hover:text-red-700 font-bold text-lg leading-none" data-id="${lang.id}">&times;</button>
                </span>`
            ).join(''));
        }
        $('#languagesInput').val(JSON.stringify(selectedLanguages.map(l => l.id)));
    }
    
    function addExperienceEntry(expData = null) {
        experienceCounter++;
        let expId = experienceCounter;
        
        let html = `
            <div class="experience-entry border border-gray-200 rounded-xl p-4 mb-4 relative bg-gray-50" data-exp-id="${expId}">
                <button type="button" class="remove-experience-btn absolute top-2 right-2 text-red-500 hover:text-red-700 bg-white rounded-full p-1 shadow-md" title="Remove Experience">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                        <input type="text" class="company-name w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                               value="${expData ? (expData.company_name || '') : ''}" placeholder="Enter company name">
                    </div>
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Industry Sector</label>
                        <select class="industry-select w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                            <option value="">Select Industry</option>
                            ${allIndustries.map(ind => `<option value="${ind.id}" ${expData && expData.industry_id == ind.id ? 'selected' : ''}>${ind.name}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employment Type</label>
                        <select class="employment-type w-full px-4 py-2 border-2 border-gray-300 rounded-xl">
                            <option value="">Select Type</option>
                            <option value="full_time" ${expData && expData.employment_type == 'full_time' ? 'selected' : ''}>Full-time</option>
                            <option value="part_time" ${expData && expData.employment_type == 'part_time' ? 'selected' : ''}>Part-time</option>
                            <option value="contract" ${expData && expData.employment_type == 'contract' ? 'selected' : ''}>Contract</option>
                            <option value="internship" ${expData && expData.employment_type == 'internship' ? 'selected' : ''}>Internship</option>
                            <option value="freelancer" ${expData && expData.employment_type == 'freelancer' ? 'selected' : ''}>Freelancer</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="date" class="start-date w-full px-4 py-2 border-2 border-gray-300 rounded-xl" 
                               value="${expData ? (expData.start_date || '') : ''}">
                    </div>
                    <div class="end-date-div">
                        <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <input type="date" class="end-date w-full px-4 py-2 border-2 border-gray-300 rounded-xl" 
                               value="${expData ? (expData.end_date || '') : ''}">
                    </div>
                    <div class="col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="currently-working mr-2" ${expData && expData.currently_working ? 'checked' : ''}>
                            <span>I currently work here</span>
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Notice Period</label>
                        <input type="text" class="notice-period w-full px-4 py-2 border-2 border-gray-300 rounded-xl" 
                               placeholder="e.g., 15 days, 1 month" value="${expData ? (expData.notice_period || '') : ''}">
                    </div>
                </div>
            </div>
        `;
        
        $('#experiences_container').append(html);
        
        let newEntry = $(`.experience-entry[data-exp-id="${expId}"]`);
        
        newEntry.find('.currently-working').on('change', function() {
            let endDateDiv = $(this).closest('.experience-entry').find('.end-date-div');
            if ($(this).is(':checked')) {
                endDateDiv.slideUp();
                endDateDiv.find('.end-date').val('');
            } else {
                endDateDiv.slideDown();
            }
        });
        
        newEntry.find('.currently-working').trigger('change');
    }
    
    function collectExperiencesData() {
        let experiences = [];
        $('.experience-entry').each(function() {
            let exp = {
                company_name: $(this).find('.company-name').val(),
                industry_id: $(this).find('.industry-select').val(),
                employment_type: $(this).find('.employment-type').val(),
                start_date: $(this).find('.start-date').val(),
                end_date: $(this).find('.end-date').val(),
                currently_working: $(this).find('.currently-working').is(':checked') ? 1 : 0,
                notice_period: $(this).find('.notice-period').val()
            };
            if (exp.company_name || exp.industry_id || exp.employment_type) {
                experiences.push(exp);
            }
        });
        return experiences;
    }

    function updateCitiesDisplay() {
        if (selectedCities.length === 0) {
            $('#selectedCitiesContainer').html('<p class="text-gray-400 text-sm">No cities selected. Select cities from the dropdown.</p>');
        } else {
            $('#selectedCitiesContainer').html(selectedCities.map(city => 
                `<span class="bg-yellow-100 text-yellow-700 px-3 py-2 rounded-full flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    ${city}
                    <button type="button" class="remove-city ml-1 text-red-500 hover:text-red-700 font-bold text-lg leading-none">&times;</button>
                </span>`
            ).join(''));
        }
        $('#preferred_locations').val(selectedCities.join(','));
    }
    
    function validateStep(step) {
        let isValid = true;
        clearErrors();
        
        switch(step) {
            case 0:
                if (isEditMode) {
                    let resumeFile = $('#edit_resume')[0].files[0];
                    if (resumeFile && resumeFile.size > 0) {
                        let allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                        if (!allowedTypes.includes(resumeFile.type)) {
                            showAlert('Only PDF, DOC, and DOCX files are allowed', 'error');
                            return false;
                        }
                        if (resumeFile.size > 5 * 1024 * 1024) {
                            showAlert('File size must be less than 5MB', 'error');
                            return false;
                        }
                    }
                }
                break;
            case 1:
                if (!$('#full_name').val().trim()) {
                    showFieldError('full_name', 'Full name is required');
                    isValid = false;
                }
                if (!$('input[name="gender"]:checked').val()) {
                    showFieldError('gender', 'Please select your gender');
                    isValid = false;
                }
                if (!$('#age').val()) {
                    showFieldError('age', 'Age is required');
                    isValid = false;
                }
                break;
            case 2:
                if (!$('#job_title_id').val()) {
                    showFieldError('job_title_id', 'Please select a position');
                    isValid = false;
                }
                if (!$('input[name="experience_type"]:checked').val()) {
                    showFieldError('experience_type', 'Please select experience type');
                    isValid = false;
                }
                break;
            case 3:
                if (selectedCities.length === 0) {
                    showFieldError('preferred_locations', 'Please select at least one preferred location');
                    isValid = false;
                }
                if (!$('input[name="employment_type"]:checked').val()) {
                    showFieldError('employment_type', 'Please select your employment type');
                    isValid = false;
                }
                break;
            case 4:
                break;
            case 5:
                let educations = collectEducationsData();
                if (!educations) {
                    isValid = false;
                }
                break;
            case 6:
                break;
            case 7:
                if (!$('input[name="availability"]:checked').val()) {
                    showFieldError('availability', 'Please select your availability');
                    isValid = false;
                }
                break;
        }
        
        return isValid;
    }
    
    function saveStep(step) {
        if (isSaving) {
            return;
        }
        
        if (!validateStep(step)) {
            return;
        }
        
        isSaving = true;
        
        // Show loading state on the clicked button
        let clickedBtn = $('.save-step, .save-resume-step, .save-edit-resume-step').filter(':focus');
        let originalText = clickedBtn.text();
        clickedBtn.text('Saving...').prop('disabled', true);
        
        let formData = new FormData();
        
        switch(step) {
            case 0:
                if (isEditMode) {
                    let resumeFile = $('#edit_resume')[0].files[0];
                    if (resumeFile && resumeFile.size > 0) {
                        uploadEditResume(resumeFile);
                    } else {
                        showAlert('Please select a resume file to upload', 'error');
                    }
                    clickedBtn.text(originalText).prop('disabled', false);
                    isSaving = false;
                    return;
                } else {
                    let file = $('#resume')[0].files[0];
                    if (file && file.size > 0) {
                        formData.append('resume', file);
                        $.ajax({
                            url: '{{ route("employee.upload.resume") }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            success: function(response) {
                                if (response.success) {
                                    showAlert('Resume uploaded successfully!', 'success');
                                    currentStep = 1;
                                    showStep(currentStep);
                                }
                                clickedBtn.text(originalText).prop('disabled', false);
                                isSaving = false;
                            },
                            error: function(xhr) {
                                showAlert(xhr.responseJSON?.message || 'Error uploading resume');
                                clickedBtn.text(originalText).prop('disabled', false);
                                isSaving = false;
                            }
                        });
                    } else {
                        if (confirm('You haven\'t uploaded a resume. You can upload it later from your profile. Continue anyway?')) {
                            currentStep = 1;
                            showStep(currentStep);
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                    return;
                }
                
            case 1:
                formData.append('full_name', $('#full_name').val());
                formData.append('email', $('#email').val());
                formData.append('gender', $('input[name="gender"]:checked').val());
                formData.append('age', $('#age').val());
                let profileFile = $('#profile_photo')[0].files[0];
                if (profileFile) formData.append('profile_photo', profileFile);
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 1]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            if (!isEditMode) {
                                currentStep = response.next_step;
                                showStep(currentStep);
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        if (errors) {
                            Object.keys(errors).forEach(key => {
                                showFieldError(key, errors[key][0]);
                            });
                        } else {
                            showAlert(xhr.responseJSON?.message || 'Error saving data.');
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
                
            case 2:
                let expYears = $('select[name="exp_years"]').val();
                let expMonths = $('select[name="exp_months"]').val();
                
                formData.append('job_title_id', $('#job_title_id').val());
                formData.append('experience_type', $('input[name="experience_type"]:checked').val());
                formData.append('exp_years', expYears);
                formData.append('exp_months', expMonths);
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 2]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            if (!isEditMode) {
                                currentStep = response.next_step;
                                showStep(currentStep);
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        if (errors) {
                            Object.keys(errors).forEach(key => {
                                showFieldError(key, errors[key][0]);
                            });
                        } else {
                            showAlert(xhr.responseJSON?.message || 'Error saving data.');
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
                
            case 3:
                selectedCities.forEach(city => {
                    formData.append('preferred_locations[]', city);
                });
                formData.append('current_salary', $('#current_salary').val());
                formData.append('expected_salary', $('#expected_salary').val());
                formData.append('employment_type', $('input[name="employment_type"]:checked').val());
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 3]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            if (!isEditMode) {
                                currentStep = response.next_step;
                                showStep(currentStep);
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        if (errors) {
                            Object.keys(errors).forEach(key => {
                                showFieldError(key, errors[key][0]);
                            });
                        } else {
                            showAlert(xhr.responseJSON?.message || 'Error saving data.');
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
                
            case 4:
                let skills = [];
                $('.skill-input').each(function() { 
                    let val = $(this).val().trim();
                    if (val) skills.push(val); 
                });
                
                skills.forEach(skill => {
                    formData.append('skills[]', skill);
                });
                
                let languageData = JSON.stringify(selectedLanguages.map(l => l.id));
                formData.append('languages', languageData);
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 4]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            if (!isEditMode) {
                                currentStep = response.next_step;
                                showStep(currentStep);
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        if (errors) {
                            Object.keys(errors).forEach(key => {
                                showFieldError(key, errors[key][0]);
                            });
                        } else {
                            showAlert(xhr.responseJSON?.message || 'Error saving data.');
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
                
            case 5:
                let educations = collectEducationsData();
                if (!educations) {
                    clickedBtn.text(originalText).prop('disabled', false);
                    isSaving = false;
                    return;
                }
                
                let eduFormData = new FormData();
                eduFormData.append('educations', JSON.stringify(educations));
                eduFormData.append('education_level', $('#education_level').val());
                eduFormData.append('_token', '{{ csrf_token() }}');
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 5]) }}',
                    type: 'POST',
                    data: eduFormData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            if (!isEditMode) {
                                currentStep = response.next_step;
                                showStep(currentStep);
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        } else {
                            showAlert(response.message || 'Error saving data', 'error');
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        showAlert(xhr.responseJSON?.message || 'Error saving education details.', 'error');
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
                
            case 6:
                let experiences = collectExperiencesData();
                formData.append('experiences', JSON.stringify(experiences));
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 6]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            if (!isEditMode) {
                                currentStep = response.next_step;
                                showStep(currentStep);
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        } else {
                            showAlert(response.message || 'Error saving data', 'error');
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        showAlert(xhr.responseJSON?.message || 'Error saving work experience.', 'error');
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
                
            case 7:
                formData.append('availability', $('input[name="availability"]:checked').val());
                
                $.ajax({
                    url: '{{ route("employee.step.save", ["step" => 7]) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                window.location.href = '{{ route("employee.dashboard") }}';
                            }
                        }
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    },
                    error: function(xhr) {
                        showAlert(xhr.responseJSON?.message || 'Error completing profile.', 'error');
                        clickedBtn.text(originalText).prop('disabled', false);
                        isSaving = false;
                    }
                });
                break;
        }
    }
    
    $(document).ready(function() {
        initializeSelect2();
        
        $('#profile_photo').change(function() {
            let file = this.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    showAlert('Profile photo must be less than 2MB');
                    $(this).val('');
                    return;
                }
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#profilePhotoImg').attr('src', e.target.result).removeClass('hidden');
                    $('#profilePhotoPreview svg').addClass('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        
        $('input[name="experience_type"]').change(function() {
            if ($(this).val() === 'experienced') {
                $('#exp_details').slideDown();
            } else {
                $('#exp_details').slideUp();
            }
        });
        
        // Create mode resume file selection
        $('#resume').on('change', function(e) {
            let file = this.files[0];
            if (file) {
                let allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (!allowedTypes.includes(file.type)) {
                    showAlert('Only PDF, DOC, and DOCX files are allowed', 'error');
                    $(this).val('');
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    showAlert('File size must be less than 5MB', 'error');
                    $(this).val('');
                    return;
                }
                uploadResumeFile(file);
            }
        });
        
        // Edit mode resume file selection
        $('#edit_resume').on('change', function(e) {
            let file = this.files[0];
            if (file) {
                let allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (!allowedTypes.includes(file.type)) {
                    showAlert('Only PDF, DOC, and DOCX files are allowed', 'error');
                    $(this).val('');
                    return;
                }
                if (file.size > 5 * 1024 * 1024) {
                    showAlert('File size must be less than 5MB', 'error');
                    $(this).val('');
                    return;
                }
                updateEditResumeDisplay(file);
            }
        });
        
        $('.save-step').on('click', function(e) {
            e.preventDefault();
            saveStep(currentStep);
        });
        
        $('.prev-step').on('click', function(e) {
            e.preventDefault();
            if (currentStep > (isEditMode ? 1 : 0)) { 
                currentStep--; 
                showStep(currentStep); 
            }
        });
        
        $('.save-resume-step').on('click', function(e) {
            e.preventDefault();
            saveStep(0);
        });
        
        $('.save-edit-resume-step').on('click', function(e) {
            e.preventDefault();
            saveStep(0);
        });
        
        $(document).on('click', '.remove-city', function(e) {
            e.stopPropagation();
            let cityText = $(this).closest('span').text().replace('×', '').trim();
            selectedCities = selectedCities.filter(c => c !== cityText);
            updateCitiesDisplay();
            showAlert(cityText + ' removed', 'success');
        });
        
        $(document).on('click', '.remove-lang', function(e) {
            e.stopPropagation();
            let langId = $(this).data('id');
            selectedLanguages = selectedLanguages.filter(l => l.id != langId);
            $(`.language-btn[data-id="${langId}"]`).removeClass('bg-yellow-500 text-white border-yellow-500').addClass('bg-white text-gray-700 border-gray-300');
            updateLanguagesDisplay();
        });
        
        // Create mode resume download/remove - Fixed to prevent event bubbling
        $(document).on('click', '.download-resume-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (uploadedResumeFile) {
                let tempUrl = URL.createObjectURL(uploadedResumeFile);
                window.open(tempUrl, '_blank');
                setTimeout(() => URL.revokeObjectURL(tempUrl), 100);
            } else {
                showAlert('No resume found to download', 'error');
            }
        });
        
        $(document).on('click', '.remove-resume-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (confirm('Are you sure you want to remove the resume?')) {
                uploadedResumeFile = null;
                $('#resume').val('');
                $('#resumeFileName').addClass('hidden').empty();
                $('#resumeUploadContent').removeClass('hidden');
                showAlert('Resume removed', 'success');
            }
        });
        
        // Edit mode resume download/remove - Fixed to prevent event bubbling
        $(document).on('click', '.download-edit-resume-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (existingResumeUrl) {
                window.open(existingResumeUrl, '_blank');
            } else {
                showAlert('No resume found to download', 'error');
            }
        });
        
        $(document).on('click', '.remove-edit-resume-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            if (confirm('Are you sure you want to remove the resume?')) {
                removeEditResume();
            }
        });
        
        $('#addMoreExperienceBtn').on('click', function() {
            addExperienceEntry();
            showAlert('New experience field added', 'success');
        });
        
        $(document).on('click', '.remove-experience-btn', function() {
            $(this).closest('.experience-entry').remove();
            showAlert('Experience entry removed', 'success');
        });
        
        $(document).on('click', '.add-skill', function() {
            if ($('.skill-group').length < 5) {
                $('#skills_container').find('.add-skill').closest('div').before(createSkillInput(''));
                updateAddButtonVisibility();
                showAlert('New skill field added', 'success');
            } else {
                showAlert('Maximum 5 skills allowed.', 'error');
            }
        });
        
        $(document).on('click', '.remove-skill', function() {
            if ($('.skill-group').length === 1) {
                $(this).closest('.skill-group').find('.skill-input').val('');
            } else {
                $(this).closest('.skill-group').remove();
            }
            updateAddButtonVisibility();
        });
        
        function updateAddButtonVisibility() {
            if ($('.skill-group').length >= 5) {
                $('#addSkillBtn').closest('div').remove();
            } else if ($('#addSkillBtn').length === 0) {
                addAddSkillButton();
            }
        }
        
        $('#education_level').change(function() {
            generateEducationFields($(this).val(), existingEducations);
        });
        
        $('#profileForm').on('submit', function(e) {
            e.preventDefault();
            if (isSaving) return;
            if (!validateStep(7)) return;
            
            isSaving = true;
            let formData = new FormData();
            formData.append('availability', $('input[name="availability"]:checked').val());
            formData.append('_token', '{{ csrf_token() }}');
            
            let submitBtn = $(this).find('button[type="submit"]');
            let originalText = submitBtn.text();
            submitBtn.text('Processing...').prop('disabled', true);
            
            $.ajax({
                url: '{{ route("employee.step.save", ["step" => 7]) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                    isSaving = false;
                },
                error: function(xhr) {
                    submitBtn.text(originalText).prop('disabled', false);
                    showAlert(xhr.responseJSON?.message || 'Error completing profile.', 'error');
                    isSaving = false;
                }
            });
        });
        
        $('.edit-section-btn').on('click', function() {
            let section = parseInt($(this).data('section'));
            currentStep = section;
            showStep(currentStep);
            $('.edit-section-btn').removeClass('bg-yellow-100 border-yellow-500');
            $(this).addClass('bg-yellow-100 border-yellow-500');
            
            let newUrl = '{{ route("employee.complete.profile", "") }}/' + section;
            window.history.pushState({}, '', newUrl);
        });
        
        $('.cancel-edit').on('click', function() {
            window.location.href = '{{ route("employee.dashboard") }}';
        });
        
        showStep(currentStep);
        
        if (isEditMode) {
            $(`.edit-section-btn[data-section="${currentStep}"]`).addClass('bg-yellow-100 border-yellow-500');
        }
        
        setTimeout(function() {
            if (existingCities && existingCities.length > 0) {
                selectedCities = existingCities;
                updateCitiesDisplay();
            } else {
                updateCitiesDisplay();
            }
            
            if (existingLanguages && existingLanguages.length > 0) {
                existingLanguages.forEach(langId => {
                    let lang = allLanguages.find(l => l.id == langId);
                    if (lang) {
                        selectedLanguages.push({ id: lang.id, name: lang.name });
                    }
                });
                updateLanguagesDisplay();
                $('.language-btn').each(function() {
                    let id = $(this).data('id');
                    if (selectedLanguages.some(l => l.id == id)) {
                        $(this).addClass('bg-yellow-500 text-white border-yellow-500').removeClass('bg-white text-gray-700 border-gray-300');
                    }
                });
            }
            
            initializeSkills();
            initializeLanguages();
            
            if (existingExperiences && existingExperiences.length > 0) {
                existingExperiences.forEach(exp => {
                    addExperienceEntry(exp);
                });
            } else if ($('.experience-entry').length === 0 && !isEditMode) {
                addExperienceEntry(null);
            }
            
            if ($('input[name="experience_type"]:checked').val() === 'experienced') {
                $('#exp_details').show();
            }
            
            if ($('#job_title_id').val()) {
                $('#positionSelect').val($('#job_title_id').val()).trigger('change');
            }
        }, 100);
    });
    
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('email_error');
    
    if (emailInput) {
        emailInput.addEventListener('input', function () {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail|yahoo|hotmail|outlook)\.(com|in)$/;
            
            if (this.value.trim() === '') {
                emailError.classList.add('hidden');
                emailError.innerText = '';
            } 
            else if (!emailPattern.test(this.value)) {
                emailError.classList.remove('hidden');
                emailError.innerText = 'Only Gmail, Yahoo, Hotmail, and Outlook email formats are allowed.';
            } 
            else {
                emailError.classList.add('hidden');
                emailError.innerText = '';
            }
        });
    }
</script>

<style>
.select2-container--default .select2-selection--single {
    border: 2px solid #e5e7eb;
    border-radius: 0.75rem;
    padding: 0.5rem;
    height: auto;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 1.5;
    padding: 0.25rem 0;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 50%;
    transform: translateY(-50%);
}
.select2-dropdown {
    border-radius: 0.75rem;
    border-color: #e5e7eb;
}
.edit-section-btn.active, .edit-section-btn:hover {
    background-color: #fef3c7;
    border-color: #f59e0b;
}
</style>

@endsection
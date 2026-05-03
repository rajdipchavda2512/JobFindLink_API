{{-- resources/views/employee/complete-profile.blade.php --}}
@extends('employee.layouts')

@section('title', 'Complete Your Profile - JobFindLink')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 to-orange-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Progress Bar -->
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

        <!-- Alert Messages -->
        <div id="alertMessage" class="hidden mb-4 p-4 rounded-lg"></div>

        <!-- Debug Console -->
        <div id="debugConsole" class="hidden mb-4 bg-gray-900 text-green-400 p-4 rounded-lg font-mono text-xs max-h-60 overflow-y-auto">
            <div class="font-bold text-white mb-2">Debug Console:</div>
            <div id="debugLogs"></div>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <form id="profileForm" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- STEP 0: UPLOAD RESUME -->
                <div class="step active" data-step="0">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Upload Your Resume</h2>
                        <p class="text-yellow-100 mt-1">Start by uploading your resume (You can skip this for now)</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Resume (Optional)</label>
                                <label for="resume" class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-yellow-500 transition cursor-pointer block">
                                    <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="hidden">
                                    <div id="resumeUploadContent">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600">Click to upload or drag and drop</p>
                                        <p class="text-xs text-gray-500">PDF, DOC, DOCX (Max 5MB)</p>
                                    </div>
                                    <div id="resumeFileName" class="hidden mt-2 text-sm text-green-600"></div>
                                </label>
                            </div>
                            <div class="flex justify-end pt-4">
                                <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Skip</button>
                                <button type="button" class="save-resume-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg ml-3">Upload & Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 1: BASIC DETAILS -->
                <div class="step" data-step="1" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Basic Details</h2>
                        <p class="text-yellow-100 mt-1">Tell us about yourself</p>
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
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mobile Number <span class="text-red-500">*</span></label>
                                <div class="flex gap-3">
                                    <input type="tel" name="mobile_number" id="mobile_number" 
                                           class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                           placeholder="Enter mobile number" value="{{ old('mobile_number', $employee->mobile_number ?? Auth::user()->mobile ?? '') }}">
                                    <button type="button" id="changeMobileBtn" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-sm">Change</button>
                                </div>
                                <p class="text-xs text-green-600 mt-1">Verified number: {{ Auth::user()->mobile ?? '' }}</p>
                                <p class="text-red-500 text-xs mt-1 hidden" id="mobile_number_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email (Optional)</label>
                                <input type="email" name="email" id="email" 
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                       placeholder="your@email.com" value="{{ old('email', $employee->email ?? Auth::user()->email ?? '') }}">
                                <p class="text-red-500 text-xs mt-1 hidden" id="email_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender <span class="text-red-500">*</span></label>
                                <div class="flex gap-6">
                                    <label class="flex items-center">
                                        <input type="radio" name="gender" value="male" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'male' ? 'checked' : '' }}> Male
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="gender" value="female" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'female' ? 'checked' : '' }}> Female
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="gender" value="other" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'other' ? 'checked' : '' }}> Other
                                    </label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="gender_error"></p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                                <input type="number" name="age" id="age" 
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                       placeholder="25" value="{{ old('age', $employee->age ?? '') }}">
                                <p class="text-red-500 text-xs mt-1 hidden" id="age_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Profile Photo (Optional)</label>
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
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 mr-3">Skip</button>
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: JOB PREFERENCE -->
                <div class="step" data-step="2" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Job Preference</h2>
                        <p class="text-yellow-100 mt-1">Tell us what role you're looking for</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Position <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="positionSearch" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500" placeholder="Search for a position..." value="{{ $employee && $employee->jobTitle ? $employee->jobTitle->name : '' }}">
                                    <div id="positionSuggestions" class="absolute z-10 w-full bg-white border-2 border-gray-300 rounded-xl mt-1 max-h-60 overflow-y-auto hidden"></div>
                                </div>
                                <input type="hidden" name="job_title_id" id="job_title_id" value="{{ old('job_title_id', $employee->job_title_id ?? '') }}">
                                <p class="text-red-500 text-xs mt-1 hidden" id="job_title_id_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Experience Type <span class="text-red-500">*</span></label>
                                <div class="flex gap-6">
                                    <label class="flex items-center">
                                        <input type="radio" name="experience_type" value="fresher" class="mr-2 exp-type" {{ old('experience_type', $employee->experience_type ?? '') == 'fresher' ? 'checked' : '' }}> Fresher
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="experience_type" value="experienced" class="mr-2 exp-type" {{ old('experience_type', $employee->experience_type ?? '') == 'experienced' ? 'checked' : '' }}> Experienced
                                    </label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="experience_type_error"></p>
                            </div>
                            
                            <div id="exp_details" style="{{ old('experience_type', $employee->experience_type ?? '') == 'experienced' ? '' : 'display: none;' }}">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Years</label>
                                        <select name="exp_years" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                            <option value="0">0 Year</option>
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{ $i }}" {{ old('exp_years', $employee->exp_years ?? 0) == $i ? 'selected' : '' }}>{{ $i }} Year{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Months</label>
                                        <select name="exp_months" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                            <option value="0">0 Month</option>
                                            @for($i=1; $i<=11; $i++)
                                            <option value="{{ $i }}" {{ old('exp_months', $employee->exp_months ?? 0) == $i ? 'selected' : '' }}>{{ $i }} Month{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 mr-3">Skip</button>
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: LOCATION & SALARY -->
                <div class="step" data-step="3" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Location & Salary</h2>
                        <p class="text-yellow-100 mt-1">Where do you want to work?</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Location <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="citySearch" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500" placeholder="Search for a city..." autocomplete="off">
                                    <div id="citySuggestions" class="absolute z-10 w-full bg-white border-2 border-gray-300 rounded-xl mt-1 max-h-60 overflow-y-auto hidden shadow-lg"></div>
                                </div>
                                <div id="selectedCitiesContainer" class="flex flex-wrap gap-2 mt-3 min-h-[50px]"></div>
                                <input type="hidden" name="preferred_locations" id="preferred_locations">
                                <p class="text-xs text-gray-500 mt-2">Tip: You can select up to 10 cities. Start typing to search.</p>
                                <p class="text-red-500 text-xs mt-1 hidden" id="preferred_locations_error"></p>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Salary (₹)</label>
                                    <input type="number" name="current_salary" id="current_salary" 
                                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500"
                                           placeholder="0" value="{{ old('current_salary', $employee->current_salary ?? '') }}">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Expected Salary (₹) <span class="text-red-500">*</span></label>
                                    <input type="number" name="expected_salary" id="expected_salary" 
                                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500"
                                           placeholder="0" value="{{ old('expected_salary', $employee->expected_salary ?? '') }}">
                                    <p class="text-red-500 text-xs mt-1 hidden" id="expected_salary_error"></p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 mr-3">Skip</button>
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: SKILLS & LANGUAGES -->
                <div class="step" data-step="4" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Skills & Languages</h2>
                        <p class="text-yellow-100 mt-1">Tell us what you're good at</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Skills <span class="text-red-500">*</span> (Max 5)</label>
                                <div id="skills_container" class="space-y-2 mb-3"></div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="skills_error"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Languages <span class="text-red-500">*</span></label>
                                <div id="languageButtonsContainer" class="flex flex-wrap gap-2">
                                    @foreach($languages ?? [] as $language)
                                    <button type="button" class="language-btn px-4 py-2 border-2 border-gray-300 rounded-full hover:border-yellow-500 transition" data-id="{{ $language->id }}" data-name="{{ $language->name }}">
                                        {{ $language->name }}
                                    </button>
                                    @endforeach
                                </div>
                                <div id="selectedLanguagesContainer" class="flex flex-wrap gap-2 mt-3"></div>
                                <input type="hidden" name="languages" id="languagesInput">
                                <p class="text-red-500 text-xs mt-1 hidden" id="languages_error"></p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 mr-3">Skip</button>
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 5: EDUCATION -->
                <div class="step" data-step="5" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Education</h2>
                        <p class="text-yellow-100 mt-1">Your educational background</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Education Level <span class="text-red-500">*</span></label>
                                <select name="education_level" id="education_level" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                    <option value="">Select Education Level</option>
                                    <option value="Below 10th">Below 10th</option>
                                    <option value="10th">10th Pass</option>
                                    <option value="12th">12th Pass</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Graduate">Graduate</option>
                                    <option value="Post Graduate">Post Graduate</option>
                                    <option value="PhD">PhD</option>
                                </select>
                                <p class="text-red-500 text-xs mt-1 hidden" id="education_level_error"></p>
                            </div>
                            
                            <div id="education_fields_container"></div>
                            
                            <!-- SINGLE SET OF NAVIGATION BUTTONS -->
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <div class="flex gap-3">
                                    <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Skip</button>
                                    <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 6: WORK EXPERIENCE - FIXED VERSION -->
                <div class="step" data-step="6" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Work Experience</h2>
                        <p class="text-yellow-100 mt-1">Your professional journey (Add one or more experiences)</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <!-- Container for dynamic experience entries -->
                            <div id="experiences_container"></div>
                            
                            <!-- Add More Experience Button -->
                            <button type="button" id="addMoreExperienceBtn" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add More Experience
                            </button>
                            
                            <!-- SINGLE SET OF NAVIGATION BUTTONS -->
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <div class="flex gap-3">
                                    <button type="button" class="skip-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Skip</button>
                                    <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 7: AVAILABILITY & SUBMIT -->
                <div class="step" data-step="7" style="display: none;">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Availability</h2>
                        <p class="text-yellow-100 mt-1">Final step to complete your profile</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">When can you join? <span class="text-red-500">*</span></label>
                                <div class="flex gap-6">
                                    <label class="flex items-center">
                                        <input type="radio" name="availability" value="immediately" class="mr-2"> Immediately
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="availability" value="within_7_days" class="mr-2"> Within 7 Days
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="availability" value="flexible" class="mr-2"> Flexible
                                    </label>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="availability_error"></p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg hover:shadow-lg">Complete Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Toggle Debug Button -->
<div class="fixed bottom-4 right-4">
    <button type="button" id="toggleDebugBtn" class="bg-gray-800 text-white px-3 py-1 rounded-lg text-xs hover:bg-gray-700 shadow-lg">
        🐛 Show Debug
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentStep = 0;
    let totalSteps = 8;
    let selectedCities = [];
    let selectedLanguages = [];
    let uploadedResumePath = null;
    let debugMode = false;
    let experienceCounter = 0;
    let educationCounter = 0;

    let allPositions = @json($positions ?? []);
    let allIndustries = @json($industries ?? []);
    let allCities = @json($cities['cities'] ?? []);
    let allDegrees = @json($degrees ?? []);

    let existingEmployee = @json($employee);
    let existingLanguages = @json($employee && $employee->languages ? $employee->languages : []);
    let existingSkills = @json($employee && $employee->skills ? (is_string($employee->skills) ? json_decode($employee->skills, true) : $employee->skills) : []);
    let existingCities = @json($employee && $employee->preferred_locations ? (is_string($employee->preferred_locations) ? json_decode($employee->preferred_locations, true) : $employee->preferred_locations) : []);
    let existingExperiences = @json($employee && $employee->experiences_json ? $employee->experiences_json : []);
    let existingEducations = @json($employee && $employee->educations_json ? $employee->educations_json : []);

    function addDebugLog(message, data = null) {
        if (!debugMode && message !== 'Always log') return;
        let timestamp = new Date().toLocaleTimeString();
        let logEntry = `[${timestamp}] ${message}`;
        if (data) {
            logEntry += `<br>📦 Data: ${JSON.stringify(data, null, 2)}`;
        }
        $('#debugLogs').prepend(`<div class="border-b border-gray-700 pb-1 mb-1">${logEntry}</div>`);
        if (message !== 'Always log') {
            console.log(message, data);
        }
    }

    $('#toggleDebugBtn').click(function() {
        debugMode = !debugMode;
        $('#debugConsole').toggleClass('hidden');
        $(this).text(debugMode ? '🔍 Hide Debug' : '🐛 Show Debug');
        addDebugLog('🔧 Debug mode ' + (debugMode ? 'enabled' : 'disabled'), 'always');
    });

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
        addDebugLog(`❌ Validation error on ${field}: ${message}`);
    }

    function showStep(step) {
        $('.step').hide();
        $(`.step[data-step="${step}"]`).show();
        
        let progressPercent = ((step + 1) / totalSteps) * 100;
        $('#progressBar').css('width', progressPercent + '%');
        clearErrors();
        addDebugLog(`📍 Moved to step ${step}`);
        
        if (step === 5) {
            let selectedLevel = $('#education_level').val();
            if (selectedLevel && selectedLevel !== '') {
                generateEducationFields(selectedLevel, existingEducations);
            }
        }
        
        if (step === 6) {
            // Ensure at least one experience entry exists
            if ($('.experience-entry').length === 0) {
                addExperienceEntry(null);
            }
        }
    }

    // Load degrees based on education level
    function loadDegreesForLevel(educationLevel, $degreeSelect, selectedDegreeId = null) {
        let degreesForLevel = [];
        
        if (educationLevel === '12th') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === '12th' || d.name === 'Intermediate' || d.name === 'High School' || d.name === 'HSC'
            );
        } else if (educationLevel === 'Diploma') {
            degreesForLevel = allDegrees.filter(d => 
                d.name.toLowerCase().includes('diploma')
            );
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
            degreesForLevel = allDegrees.filter(d => 
                d.name.toLowerCase().includes('phd') || d.name.toLowerCase().includes('doctor') || d.name === "Doctorate"
            );
        }

        let options = '<option value="">Select Degree</option>';
        degreesForLevel.forEach(degree => {
            let selected = (selectedDegreeId && selectedDegreeId == degree.id) ? 'selected' : '';
            options += `<option value="${degree.id}" ${selected}>${degree.name}</option>`;
        });
        $degreeSelect.html(options);
        addDebugLog(`Loaded ${degreesForLevel.length} degrees for education level: ${educationLevel}`);
    }

    // Generate dynamic fields based on selected education level
    function generateEducationFields(selectedLevel, savedData = null) {
        let container = $('#education_fields_container');
        container.empty();
        
        addDebugLog('generateEducationFields - Called with level: ' + selectedLevel);
        
        if (!selectedLevel) return;
        
        let fieldSets = [];
        
        switch(selectedLevel) {
            case 'Below 10th':
            case '10th':
                fieldSets = [];
                break;
            case '12th':
            case 'Diploma':
            case 'Graduate':
                fieldSets = [{
                    level: selectedLevel,
                    title: selectedLevel + ' Details',
                    required: true
                }];
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
                            <label class="block text-sm font-medium text-gray-700 mb-1">Specialization (Optional)</label>
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
        
        if (fieldSets.length === 0) {
            container.html('<div class="text-center text-gray-500 p-4">No additional details required for this education level.</div>');
        }
    }

    function collectEducationsData() {
        let educations = [];
        let selectedLevel = $('#education_level').val();
        
        if (!selectedLevel) {
            showAlert('Please select education level', 'error');
            return null;
        }
        
        if (selectedLevel === 'Below 10th' || selectedLevel === '10th') {
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
        
        if (selectedLevel === 'Graduate' && educations.length < 1) {
            showAlert('Please fill in your graduate details', 'error');
            return null;
        }
        if (selectedLevel === 'Post Graduate' && educations.length < 2) {
            showAlert('Please fill in both Graduate and Post Graduate details', 'error');
            return null;
        }
        if (selectedLevel === 'PhD' && educations.length < 3) {
            showAlert('Please fill in Graduate, Post Graduate, and PhD details', 'error');
            return null;
        }
        
        return educations;
    }

    $('#education_level').change(function() {
        generateEducationFields($(this).val(), existingEducations);
    });

    // Experience Management
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
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company Name <span class="text-red-500">*</span></label>
                        <input type="text" class="company-name w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                               value="${expData ? (expData.company_name || '') : ''}" placeholder="Enter company name">
                    </div>
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Industry Sector (Optional)</label>
                        <input type="text" class="industry-search w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                               placeholder="Search for industry..." value="${expData && expData.industry ? expData.industry.name : ''}">
                        <input type="hidden" class="industry-id" value="${expData ? (expData.industry_id || '') : ''}">
                        <div class="industry-suggestions absolute z-10 w-full bg-white border-2 border-gray-300 rounded-xl mt-1 max-h-40 overflow-y-auto hidden shadow-lg"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employment Type <span class="text-red-500">*</span></label>
                        <select class="employment-type w-full px-4 py-2 border-2 border-gray-300 rounded-xl">
                            <option value="">Select Type</option>
                            <option value="full-time" ${expData && expData.employment_type == 'full-time' ? 'selected' : ''}>Full-time</option>
                            <option value="part-time" ${expData && expData.employment_type == 'part-time' ? 'selected' : ''}>Part-time</option>
                            <option value="contract" ${expData && expData.employment_type == 'contract' ? 'selected' : ''}>Contract</option>
                            <option value="internship" ${expData && expData.employment_type == 'internship' ? 'selected' : ''}>Internship</option>
                            <option value="freelance" ${expData && expData.employment_type == 'freelance' ? 'selected' : ''}>Freelance</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Start Date <span class="text-red-500">*</span></label>
                        <input type="date" class="start-date w-full px-4 py-2 border-2 border-gray-300 rounded-xl" 
                               value="${expData ? (expData.start_date || '') : ''}">
                    </div>
                    <div class="end-date-div">
                        <label class="block text-sm font-medium text-gray-700 mb-1">End Date <span class="text-red-500 end-date-required">*</span></label>
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
        initIndustrySearchForEntry(newEntry);
        
        newEntry.find('.currently-working').on('change', function() {
            let endDateDiv = $(this).closest('.experience-entry').find('.end-date-div');
            let endDateRequired = endDateDiv.find('.end-date-required');
            if ($(this).is(':checked')) {
                endDateDiv.slideUp();
                endDateDiv.find('.end-date').val('');
                endDateRequired.hide();
            } else {
                endDateDiv.slideDown();
                endDateRequired.show();
            }
        });
        
        newEntry.find('.currently-working').trigger('change');
        addDebugLog(`Added experience entry, total: ${$('.experience-entry').length}`);
    }
    
    function initIndustrySearchForEntry(entryElement) {
        let searchInput = entryElement.find('.industry-search');
        let suggestionsDiv = entryElement.find('.industry-suggestions');
        let hiddenInput = entryElement.find('.industry-id');
        
        searchInput.off('keyup').on('keyup', function() {
            let search = $(this).val().toLowerCase();
            let suggestions = allIndustries.filter(i => i.name.toLowerCase().includes(search));
            if (suggestions.length > 0 && search.length > 0) {
                suggestionsDiv.html(suggestions.map(i => 
                    `<div class="p-2 hover:bg-yellow-50 cursor-pointer border-b" data-id="${i.id}" data-name="${i.name}">${i.name}</div>`
                ).join('')).removeClass('hidden');
            } else {
                suggestionsDiv.addClass('hidden');
            }
        });
        
        suggestionsDiv.off('click', 'div').on('click', 'div', function() {
            searchInput.val($(this).data('name'));
            hiddenInput.val($(this).data('id'));
            suggestionsDiv.addClass('hidden');
        });
    }
    
    $('#addMoreExperienceBtn').click(function() {
        addExperienceEntry();
        showAlert('New experience field added', 'success');
    });
    
    $(document).on('click', '.remove-experience-btn', function() {
        if ($('.experience-entry').length > 1) {
            $(this).closest('.experience-entry').remove();
            showAlert('Experience entry removed', 'success');
        } else {
            showAlert('You must have at least one experience entry', 'error');
        }
    });
    
    function collectExperiencesData() {
        let experiences = [];
        $('.experience-entry').each(function() {
            let exp = {
                company_name: $(this).find('.company-name').val(),
                industry_id: $(this).find('.industry-id').val(),
                employment_type: $(this).find('.employment-type').val(),
                start_date: $(this).find('.start-date').val(),
                end_date: $(this).find('.end-date').val(),
                currently_working: $(this).find('.currently-working').is(':checked') ? 1 : 0,
                notice_period: $(this).find('.notice-period').val()
            };
            if (exp.company_name) {
                experiences.push(exp);
            }
        });
        return experiences;
    }
    
    function validateExperiences() {
        let experiences = collectExperiencesData();
        if (experiences.length === 0) {
            showAlert('Please add at least one work experience', 'error');
            return false;
        }
        
        for (let i = 0; i < experiences.length; i++) {
            let exp = experiences[i];
            if (!exp.company_name) {
                showAlert(`Company name is required for experience ${i+1}`, 'error');
                return false;
            }
            if (!exp.employment_type) {
                showAlert(`Employment type is required for experience ${i+1}`, 'error');
                return false;
            }
            if (!exp.start_date) {
                showAlert(`Start date is required for experience ${i+1}`, 'error');
                return false;
            }
            if (!exp.currently_working && !exp.end_date) {
                showAlert(`End date is required for experience ${i+1} or check "I currently work here"`, 'error');
                return false;
            }
            if (exp.start_date && exp.end_date && exp.end_date < exp.start_date) {
                showAlert(`End date cannot be before start date for experience ${i+1}`, 'error');
                return false;
            }
        }
        return true;
    }

    function validateStep(step) {
        let isValid = true;
        clearErrors();
        addDebugLog(`🔍 Validating step ${step}`);
        
        switch(step) {
            case 1:
                if (!$('#full_name').val().trim()) {
                    showFieldError('full_name', 'Full name is required');
                    isValid = false;
                }
                if (!$('#mobile_number').val().trim()) {
                    showFieldError('mobile_number', 'Mobile number is required');
                    isValid = false;
                } else if (!/^[0-9]{10}$/.test($('#mobile_number').val().trim())) {
                    showFieldError('mobile_number', 'Please enter a valid 10-digit mobile number');
                    isValid = false;
                }
                if ($('#email').val() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($('#email').val())) {
                    showFieldError('email', 'Please enter a valid email address');
                    isValid = false;
                }
                if (!$('input[name="gender"]:checked').val()) {
                    showFieldError('gender', 'Please select your gender');
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
                if (!$('#expected_salary').val()) {
                    showFieldError('expected_salary', 'Expected salary is required');
                    isValid = false;
                }
                break;
            case 4:
                let skills = [];
                $('.skill-input').each(function() { 
                    if($(this).val().trim()) skills.push($(this).val().trim()); 
                });
                if (skills.length === 0) {
                    showFieldError('skills', 'Please enter at least one skill');
                    isValid = false;
                }
                if (selectedLanguages.length === 0) {
                    showFieldError('languages', 'Please select at least one language');
                    isValid = false;
                }
                break;
            case 5:
                let educations = collectEducationsData();
                if (!educations) {
                    isValid = false;
                }
                break;
            case 6:
                let expType = $('input[name="experience_type"]:checked').val();
                if (expType === 'experienced') {
                    if (!validateExperiences()) {
                        isValid = false;
                    }
                }
                break;
            case 7:
                if (!$('input[name="availability"]:checked').val()) {
                    showFieldError('availability', 'Please select your availability');
                    isValid = false;
                }
                break;
        }
        
        addDebugLog(`Step ${step} validation result: ${isValid ? '✅ PASSED' : '❌ FAILED'}`);
        return isValid;
    }
    
    function saveStep(step) {
        addDebugLog(`💾 Saving step ${step}`);
        
        if (!validateStep(step)) {
            addDebugLog(`Step ${step} validation failed, not saving`);
            return;
        }
        
        let formData = new FormData();
        
        switch(step) {
            case 1:
                formData.append('full_name', $('#full_name').val());
                formData.append('mobile_number', $('#mobile_number').val());
                formData.append('email', $('#email').val());
                formData.append('gender', $('input[name="gender"]:checked').val());
                formData.append('age', $('#age').val());
                let profileFile = $('#profile_photo')[0].files[0];
                if (profileFile) formData.append('profile_photo', profileFile);
                
                $.ajax({
                    url: '{{ route("employee.step1") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            currentStep = response.next_step;
                            showStep(currentStep);
                        }
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
                    }
                });
                break;
                
            case 2:
                formData.append('job_title_id', $('#job_title_id').val());
                formData.append('experience_type', $('input[name="experience_type"]:checked').val());
                formData.append('exp_years', $('select[name="exp_years"]').val());
                formData.append('exp_months', $('select[name="exp_months"]').val());
                
                $.ajax({
                    url: '{{ route("employee.step2") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            currentStep = response.next_step;
                            showStep(currentStep);
                        }
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
                    }
                });
                break;
                
            case 3:
                selectedCities.forEach(city => {
                    formData.append('preferred_locations[]', city);
                });
                formData.append('current_salary', $('#current_salary').val());
                formData.append('expected_salary', $('#expected_salary').val());
                
                $.ajax({
                    url: '{{ route("employee.step3") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            currentStep = response.next_step;
                            showStep(currentStep);
                        }
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
                
                let languageData = JSON.stringify(selectedLanguages);
                formData.append('languages', languageData);
                
                $.ajax({
                    url: '{{ route("employee.step4") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            currentStep = response.next_step;
                            showStep(currentStep);
                        }
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
                    }
                });
                break;
                
            case 5:
                let educations = collectEducationsData();
                if (!educations) return;
                
                let eduFormData = new FormData();
                eduFormData.append('educations', JSON.stringify(educations));
                eduFormData.append('education_level', $('#education_level').val());
                eduFormData.append('_token', '{{ csrf_token() }}');
                
                let saveBtn = $('.save-step');
                let originalText = saveBtn.text();
                saveBtn.text('Saving...').prop('disabled', true);
                
                $.ajax({
                    url: '{{ route("employee.step5") }}',
                    type: 'POST',
                    data: eduFormData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        saveBtn.text(originalText).prop('disabled', false);
                        if (response.success) {
                            showAlert(response.message, 'success');
                            currentStep = response.next_step;
                            showStep(currentStep);
                        } else {
                            showAlert(response.message || 'Error saving data', 'error');
                        }
                    },
                    error: function(xhr) {
                        saveBtn.text(originalText).prop('disabled', false);
                        showAlert(xhr.responseJSON?.message || 'Error saving education details.', 'error');
                    }
                });
                break;
                
            case 6:
                let expTypeVal = $('input[name="experience_type"]:checked').val();
                let experiences = collectExperiencesData();
                formData.append('experiences', JSON.stringify(experiences));
                
                $.ajax({
                    url: '{{ route("employee.step6") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            currentStep = response.next_step;
                            showStep(currentStep);
                        } else {
                            showAlert(response.message || 'Error saving data', 'error');
                        }
                    },
                    error: function(xhr) {
                        showAlert(xhr.responseJSON?.message || 'Error saving work experience.', 'error');
                    }
                });
                break;
        }
    }
    
    function skipStep(step) {
        addDebugLog(`⏭️ Skipping step ${step}`);
        let nextStep = step + 1;
        if (nextStep > 7) nextStep = 7;
        
        $.ajax({
            url: '{{ route("employee.skip.step") }}',
            type: 'POST',
            data: { 
                step: step,
                next_step: nextStep, 
                _token: '{{ csrf_token() }}' 
            },
            success: function(response) {
                if (response.success) {
                    currentStep = response.next_step;
                    showStep(currentStep);
                }
            },
            error: function(xhr) {
                currentStep = nextStep;
                showStep(currentStep);
            }
        });
    }
    
    // Resume upload function
    function uploadResumeFile(file) {
        let formData = new FormData();
        formData.append('resume', file);
        formData.append('_token', '{{ csrf_token() }}');
        
        $('#resumeFileName').html(`
            <div class="flex items-center justify-between bg-blue-50 p-3 rounded-lg">
                <div class="flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-sm font-medium text-blue-700">Uploading ${file.name}...</span>
                </div>
            </div>
        `);
        
        $.ajax({
            url: '{{ route("employee.upload.resume") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    uploadedResumePath = response.path;
                    $('#resumeFileName').html(`
                        <div class="flex items-center justify-between bg-green-50 p-3 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-medium text-green-700">${file.name} uploaded successfully!</span>
                            </div>
                            <button type="button" id="removeResumeBtn" class="text-red-500 hover:text-red-700 ml-3 font-bold text-xl leading-none">&times;</button>
                        </div>
                    `);
                    showAlert('Resume uploaded successfully!', 'success');
                }
            },
            error: function(xhr) {
                showAlert('Error uploading resume. Please try again.', 'error');
                $('#resume').val('');
                $('#resumeFileName').addClass('hidden');
                $('#resumeUploadContent').removeClass('hidden');
            }
        });
    }
    
    $('#resume').off('change').on('change', function(e) {
        let file = e.target.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                showAlert('File size must be less than 5MB', 'error');
                $(this).val('');
                return;
            }
            let validExtensions = ['.pdf', '.doc', '.docx'];
            let fileName = file.name;
            let fileExt = fileName.substr(fileName.lastIndexOf('.')).toLowerCase();
            if (!validExtensions.includes(fileExt)) {
                showAlert('Please upload PDF, DOC, or DOCX files only', 'error');
                $(this).val('');
                return;
            }
            $('#resumeUploadContent').addClass('hidden');
            $('#resumeFileName').removeClass('hidden').html(`
                <div class="flex items-center justify-between bg-green-50 p-3 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-green-700">${fileName}</span>
                        <span class="text-xs text-gray-500 ml-2">(${(file.size / 1024).toFixed(2)} KB)</span>
                    </div>
                    <button type="button" id="removeResumeBtn" class="text-red-500 hover:text-red-700 ml-3 font-bold text-xl leading-none">&times;</button>
                </div>
            `);
            uploadResumeFile(file);
        }
    });
    
    $(document).on('click', '#removeResumeBtn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#resume').val('');
        $('#resumeFileName').addClass('hidden').empty();
        $('#resumeUploadContent').removeClass('hidden');
        uploadedResumePath = null;
        showAlert('Resume removed', 'success');
    });
    
    $('.save-resume-step').off('click').on('click', function(e) {
        e.preventDefault();
        let file = $('#resume')[0].files[0];
        if (file && !uploadedResumePath) {
            showAlert('Uploading resume, please wait...', 'success');
            uploadResumeFile(file);
            let checkInterval = setInterval(function() {
                if (uploadedResumePath || !$('#resume')[0].files[0]) {
                    clearInterval(checkInterval);
                    setTimeout(function() {
                        currentStep = 1;
                        showStep(currentStep);
                    }, 500);
                }
            }, 500);
        } else {
            currentStep = 1;
            showStep(currentStep);
        }
    });
    
    // Profile photo preview
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
    
    // Position search
    $('#positionSearch').on('keyup', function() {
        let search = $(this).val().toLowerCase();
        let suggestions = allPositions.filter(p => p.name.toLowerCase().includes(search));
        if (suggestions.length > 0 && search.length > 0) {
            $('#positionSuggestions').html(suggestions.map(p => 
                `<div class="p-3 hover:bg-yellow-50 cursor-pointer border-b" data-id="${p.id}" data-name="${p.name}">${p.name}</div>`
            ).join('')).removeClass('hidden');
        } else {
            $('#positionSuggestions').addClass('hidden');
        }
    });
    
    $(document).on('click', '#positionSuggestions div', function() {
        $('#positionSearch').val($(this).data('name'));
        $('#job_title_id').val($(this).data('id'));
        $('#positionSuggestions').addClass('hidden');
    });
    
    // City multi-select
    $('#citySearch').on('keyup', function() {
        let search = $(this).val().toLowerCase().trim();
        if (search.length === 0) {
            $('#citySuggestions').addClass('hidden');
            return;
        }
        let suggestions = allCities.filter(city => 
            city.toLowerCase().includes(search) && !selectedCities.includes(city)
        );
        if (suggestions.length > 0) {
            let html = '<div class="border-b border-gray-200 px-3 py-2 bg-gray-50 text-xs text-gray-500">Found ' + suggestions.length + ' cities</div>';
            html += suggestions.slice(0, 10).map(city => 
                `<div class="p-3 hover:bg-yellow-50 cursor-pointer border-b border-gray-100 transition" data-city="${city}">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        ${city}
                    </div>
                </div>`
            ).join('');
            $('#citySuggestions').html(html).removeClass('hidden');
        }
    });
    
    $(document).on('click', '#citySuggestions div[data-city]', function() {
        let city = $(this).data('city');
        if (!selectedCities.includes(city) && selectedCities.length < 10) {
            selectedCities.push(city);
            updateCitiesDisplay();
            showAlert(city + ' added successfully!', 'success');
        } else if (selectedCities.length >= 10) {
            showAlert('Maximum 10 cities can be selected');
        }
        $('#citySearch').val('');
        $('#citySuggestions').addClass('hidden');
    });
    
    function updateCitiesDisplay() {
        if (selectedCities.length === 0) {
            $('#selectedCitiesContainer').html('<p class="text-gray-400 text-sm">No cities selected. Start typing to add cities.</p>');
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
    
    $(document).on('click', '.remove-city', function(e) {
        e.stopPropagation();
        let cityText = $(this).closest('span').text().replace('×', '').trim();
        selectedCities = selectedCities.filter(c => c !== cityText);
        updateCitiesDisplay();
        showAlert(cityText + ' removed', 'success');
    });
    
    // Skills management
    function initializeSkills() {
        if (existingSkills && existingSkills.length > 0) {
            $('#skills_container').empty();
            existingSkills.forEach(skill => {
                $('#skills_container').append(createSkillInput(skill));
            });
            if (existingSkills.length < 5) {
                addAddSkillButton();
            }
        } else {
            $('#skills_container').html(createSkillInput(''));
            addAddSkillButton();
        }
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
        if ($('#addSkillBtn').length === 0) {
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
    
    $(document).off('click', '.add-skill').on('click', '.add-skill', function() {
        if ($('.skill-group').length < 5) {
            $('#skills_container').find('.add-skill').closest('div').before(createSkillInput(''));
            updateAddButtonVisibility();
            showAlert('New skill field added', 'success');
        } else {
            showAlert('Maximum 5 skills allowed.', 'error');
        }
    });
    
    $(document).off('click', '.remove-skill').on('click', '.remove-skill', function() {
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
    
    // Languages initialization
    function initializeLanguages() {
        selectedLanguages = [];
        
        if (existingLanguages && existingLanguages.length > 0) {
            existingLanguages.forEach(langId => {
                let btn = $(`.language-btn[data-id="${langId}"]`);
                if (btn.length) {
                    selectedLanguages.push({ id: langId, name: btn.data('name') });
                    btn.addClass('bg-yellow-500 text-white').removeClass('border-gray-300');
                }
            });
        }
        updateLanguagesDisplay();
    }
    
    $(document).on('click', '.language-btn', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let existingIndex = selectedLanguages.findIndex(l => l.id == id);
        
        if (existingIndex !== -1) {
            selectedLanguages.splice(existingIndex, 1);
            $(this).removeClass('bg-yellow-500 text-white').addClass('border-gray-300');
        } else {
            selectedLanguages.push({ id: id, name: name });
            $(this).addClass('bg-yellow-500 text-white').removeClass('border-gray-300');
        }
        updateLanguagesDisplay();
    });
    
    function updateLanguagesDisplay() {
        if (selectedLanguages.length === 0) {
            $('#selectedLanguagesContainer').html('<p class="text-gray-400 text-sm">No languages selected. Click on the buttons above to select.</p>');
        } else {
            $('#selectedLanguagesContainer').html(selectedLanguages.map(lang => 
                `<span class="bg-green-100 text-green-700 px-3 py-2 rounded-full flex items-center gap-2">
                    ${lang.name}
                    <button type="button" class="remove-lang ml-1 text-red-500 hover:text-red-700 font-bold text-lg leading-none" data-id="${lang.id}">&times;</button>
                </span>`
            ).join(''));
        }
        $('#languagesInput').val(JSON.stringify(selectedLanguages.map(l => l.id)));
    }
    
    $(document).on('click', '.remove-lang', function(e) {
        e.stopPropagation();
        let langId = $(this).data('id');
        selectedLanguages = selectedLanguages.filter(l => l.id != langId);
        $(`.language-btn[data-id="${langId}"]`).removeClass('bg-yellow-500 text-white').addClass('border-gray-300');
        updateLanguagesDisplay();
    });
    
    // Toggle functions
    $('input[name="experience_type"]').change(function() {
        if ($(this).val() === 'experienced') {
            $('#exp_details').slideDown();
        } else {
            $('#exp_details').slideUp();
        }
    });
    
    // Navigation
    $('.save-step').click(function() { saveStep(currentStep); });
    $('.skip-step').click(function() { skipStep(currentStep); });
    $('.prev-step').click(function() { if (currentStep > 0) { currentStep--; showStep(currentStep); } });
    
    // Form submission
    $('#profileForm').on('submit', function(e) {
        e.preventDefault();
        if (!validateStep(7)) return;
        
        let formData = new FormData();
        let resumeFile = $('#resume')[0].files[0];
        if (resumeFile) {
            formData.append('resume', resumeFile);
        } else if (uploadedResumePath) {
            formData.append('resume_path', uploadedResumePath);
        } else if (existingEmployee && existingEmployee.resume) {
            formData.append('resume_path', existingEmployee.resume);
        }
        formData.append('availability', $('input[name="availability"]:checked').val());
        formData.append('_token', '{{ csrf_token() }}');
        
        let submitBtn = $(this).find('button[type="submit"]');
        let originalText = submitBtn.text();
        submitBtn.text('Processing...').prop('disabled', true);
        
        $.ajax({
            url: '{{ route("employee.step7") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function(xhr) {
                submitBtn.text(originalText).prop('disabled', false);
                showAlert(xhr.responseJSON?.message || 'Error completing profile.', 'error');
            }
        });
    });
    
    // Initialize
    showStep(0);
    
    setTimeout(function() {
        if (existingCities && existingCities.length > 0) {
            selectedCities = existingCities;
            updateCitiesDisplay();
        } else {
            updateCitiesDisplay();
        }
        initializeSkills();
        initializeLanguages();
        
        // Load existing experiences
        if (existingExperiences && existingExperiences.length > 0) {
            existingExperiences.forEach(exp => {
                addExperienceEntry(exp);
            });
        } else {
            addExperienceEntry(null);
        }
        
        if ($('input[name="experience_type"]:checked').val() === 'experienced') {
            $('#exp_details').show();
        }
        
        addDebugLog('✅ Application initialized');
    }, 100);
</script>
@endsection
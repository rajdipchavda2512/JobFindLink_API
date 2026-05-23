

@section('title', 'Complete Your Profile - JobFind')


<div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="bg-white rounded-full h-2 overflow-hidden">
                <div id="progressBar" class="bg-gradient-to-r from-purple-600 to-pink-600 h-2 transition-all duration-500" style="width: 0%"></div>
            </div>
            <div class="flex justify-between mt-2 text-sm text-gray-600">
                <span>Basic Details</span>
                <span>Experience</span>
                <span>Job Preferences</span>
                <span>Resume</span>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <form id="profileForm" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- STEP 1: Basic Details -->
                <div class="step active" data-step="1">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Basic Details</h2>
                        <p class="text-purple-100 mt-1">Tell us your full name</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" name="full_name" id="full_name" 
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500 focus:ring-purple-500 transition"
                                       placeholder="e.g., Dipali" value="{{ old('full_name', $profile->full_name ?? '') }}">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">What is your highest level of education? *</label>
                                <p class="text-xs text-gray-500 mb-3">Select highest education level even if not completed</p>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    @php
                                        $educations = ['10th or Below 10th', '12th Pass', 'Diploma', 'ITI', 'Graduate', 'Post Graduate'];
                                    @endphp
                                    @foreach($educations as $edu)
                                    <label class="flex items-center p-3 border-2 rounded-xl cursor-pointer hover:bg-purple-50 transition edu-option">
                                        <input type="radio" name="education_level" value="{{ $edu }}" 
                                               class="mr-3 text-purple-600" 
                                               {{ isset($profile) && $profile->education_level == $edu ? 'checked' : '' }}>
                                        <span class="text-sm">{{ $edu }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="bg-purple-50 rounded-xl p-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">⏱️ Takes less than 2 minutes</p>
                                    <p class="text-sm text-gray-600 mt-1">📄 Have Resume / LinkedIn profile?</p>
                                </div>
                                <span class="text-purple-600 font-semibold">Fastrack your apna profile</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Work Status -->
                <div class="step" data-step="2" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">Confirm your work status</p>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-700 mb-4 font-medium">Choose your current work status to personalize your job search</p>
                        <div class="space-y-4">
                            <label class="flex items-center p-4 border-2 rounded-xl cursor-pointer hover:bg-purple-50 transition">
                                <input type="radio" name="work_status" value="experienced" class="mr-4 text-purple-600" 
                                       {{ isset($profile) && $profile->work_status == 'experienced' ? 'checked' : '' }}>
                                <div>
                                    <p class="font-semibold">I'm working / I have work experience</p>
                                    <p class="text-sm text-gray-500">excluding internships</p>
                                </div>
                            </label>
                            <label class="flex items-center p-4 border-2 rounded-xl cursor-pointer hover:bg-purple-50 transition">
                                <input type="radio" name="work_status" value="fresher" class="mr-4 text-purple-600"
                                       {{ isset($profile) && $profile->work_status == 'fresher' ? 'checked' : '' }}>
                                <div>
                                    <p class="font-semibold">I am a fresher / student / Intern</p>
                                    <p class="text-sm text-gray-500">haven't worked after graduation.</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Total Experience -->
                <div class="step" data-step="3" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">Total years of experience</p>
                    </div>
                    <div class="p-8">
                        <p class="text-sm text-gray-500 mb-4">Sum all the experiences from your previous jobs</p>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Years</label>
                                <input type="number" name="exp_years" id="exp_years" min="0" max="50"
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500"
                                       value="{{ isset($profile) ? $profile->total_experience_years : '' }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Months (Optional)</label>
                                <input type="number" name="exp_months" id="exp_months" min="0" max="11"
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500"
                                       value="{{ isset($profile) ? $profile->total_experience_months : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Company Details -->
                <div class="step" data-step="4" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">Add your most recent company details</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Company Name *</label>
                                <input type="text" name="company_name" id="company_name"
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500"
                                       value="{{ isset($profile) ? $profile->company_name : '' }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">What's your company's line of business? *</label>
                                <select name="industry" id="industry" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                    <option value="">Select Industry</option>
                                    <option value="Content Development / Language">Content Development / Language</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Software Development">Software Development</option>
                                    <option value="Education">Education</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Banking">Banking</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Others">Others</option>
                                </select>
                                <p class="text-xs text-gray-500 mt-1">AI suggested industries</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 5: Job Title & Dates -->
                <div class="step" data-step="5" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">Confirm your most recent company details</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-4 rounded-xl">
                                <p class="font-semibold" id="displayCompanyName"></p>
                                <p class="text-sm text-gray-600" id="displayIndustry"></p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Job Title *</label>
                                <input type="text" name="job_title" id="job_title" placeholder="e.g., PHP Laravel Developer"
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500"
                                       value="{{ isset($profile) ? $profile->job_title : '' }}">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <select name="start_month" id="start_month" class="px-3 py-2 border rounded-lg">
                                            <option value="">Month</option>
                                            @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                                            <option value="{{ substr($month,0,3) }}">{{ $month }}</option>
                                            @endforeach
                                        </select>
                                        <select name="start_year" id="start_year" class="px-3 py-2 border rounded-lg">
                                            <option value="">Year</option>
                                            @for($i = date('Y'); $i >= 2000; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="currently_working" id="currently_working" value="1" class="mr-3">
                                    <span>Are you currently working in this company?</span>
                                </label>
                            </div>
                            
                            <div id="endDateDiv" style="display: none;">
                                <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <select name="end_month" id="end_month" class="px-3 py-2 border rounded-lg">
                                        <option value="">Month</option>
                                        @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                                        <option value="{{ substr($month,0,3) }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                    <select name="end_year" id="end_year" class="px-3 py-2 border rounded-lg">
                                        <option value="">Year</option>
                                        @for($i = date('Y'); $i >= 2000; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 6: Roles & Responsibilities -->
                <div class="step" data-step="6" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">Add more details about your latest experience</p>
                    </div>
                    <div class="p-8">
                        <div class="mb-6">
                            <div class="bg-purple-50 p-4 rounded-xl mb-4">
                                <p class="font-semibold" id="displayJobTitle"></p>
                                <p class="text-sm text-gray-600" id="displayCompany"></p>
                                <p class="text-sm text-gray-600" id="displayIndustry2"></p>
                            </div>
                            
                            <label class="block text-sm font-medium text-gray-700 mb-2">Roles and responsibilities</label>
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                @php
                                    $roles = ['DevOps', 'Software Engineering', 'Frontend Development', 'Backend Development', 
                                             'Full Stack Development', 'UI/UX Design', 'Database Management', 'API Development',
                                             'Project Management', 'Quality Assurance', 'System Architecture', 'Technical Writing'];
                                @endphp
                                @foreach($roles as $role)
                                <label class="flex items-center">
                                    <input type="checkbox" name="roles[]" value="{{ $role }}" class="mr-2">
                                    <span class="text-sm">{{ $role }}</span>
                                </label>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-500">AI suggested roles and responsibilities</p>
                        </div>
                    </div>
                </div>

                <!-- STEP 7: Skills -->
                <div class="step" data-step="7" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">What skills did you gain in this role?</p>
                    </div>
                    <div class="p-8">
                        <div class="mb-6">
                            <div class="bg-purple-50 p-4 rounded-xl mb-4">
                                <p class="font-semibold" id="displayJobTitle2"></p>
                                <p class="text-sm text-gray-600" id="displayCompany2"></p>
                                <p class="text-sm text-gray-600" id="displayIndustry3"></p>
                            </div>
                            
                            <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                                @php
                                    $skills = ['HTML/CSS', 'PHP', 'SQL', 'API Development', 'JavaScript', 'MySQL', 
                                              'Laravel', 'React', 'Python', 'Java', 'AWS', 'Docker', 'Git', 'Node.js', 'Vue.js'];
                                @endphp
                                @foreach($skills as $skill)
                                <label class="flex items-center">
                                    <input type="checkbox" name="skills[]" value="{{ $skill }}" class="mr-2">
                                    <span class="text-sm">{{ $skill }}</span>
                                </label>
                                @endforeach
                            </div>
                            <div class="mt-3">
                                <input type="text" id="customSkill" placeholder="Search Skills" class="w-full px-4 py-2 border rounded-lg">
                                <p class="text-xs text-gray-500 mt-1">AI Suggested skills</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 8: Salary -->
                <div class="step" data-step="8" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Experience Details</h2>
                        <p class="text-purple-100 mt-1">Current annual salary (CTC)</p>
                    </div>
                    <div class="p-8">
                        <div class="text-center mb-4">
                            <i class="fas fa-rupee-sign text-4xl text-purple-600"></i>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                            <input type="number" name="salary" id="salary" step="10000" placeholder="e.g., 500000"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500"
                                   value="{{ isset($profile) ? $profile->current_salary : '' }}">
                            <p class="text-xs text-gray-500 mt-2">Your salary detail will help us to improve your job recommendations.</p>
                        </div>
                    </div>
                </div>

                <!-- STEP 9: Preferred Job Role -->
                <div class="step" data-step="9" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Preferred Job Role</h2>
                        <p class="text-purple-100 mt-1">What kind of job are you looking for?</p>
                    </div>
                    <div class="p-8">
                        <div>
                            <input type="text" name="preferred_job_role" id="preferred_job_role" 
                                   placeholder="Search by job title/role"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500"
                                   value="{{ isset($profile) ? $profile->preferred_job_role : '' }}">
                            <p class="text-xs text-gray-500 mt-2">AI suggested job roles</p>
                        </div>
                    </div>
                </div>

                <!-- STEP 10: Language Proficiency -->
                <div class="step" data-step="10" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Preferred Language</h2>
                        <p class="text-purple-100 mt-1">Select your English proficiency</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">English Proficiency</label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <label class="flex items-center p-3 border rounded-xl cursor-pointer">
                                        <input type="radio" name="english_level" value="basic" class="mr-2">
                                        <div>
                                            <p class="font-semibold">Basic</p>
                                            <p class="text-xs text-gray-500">You can understand/speak basic sentences</p>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-3 border rounded-xl cursor-pointer">
                                        <input type="radio" name="english_level" value="intermediate" class="mr-2">
                                        <div>
                                            <p class="font-semibold">Intermediate</p>
                                            <p class="text-xs text-gray-500">You can have a conversation in English on some topics</p>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-3 border rounded-xl cursor-pointer">
                                        <input type="radio" name="english_level" value="advanced" class="mr-2">
                                        <div>
                                            <p class="font-semibold">Advanced</p>
                                            <p class="text-xs text-gray-500">You can do your entire job in English and speak fluently</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Add other languages you can speak (Optional)</label>
                                <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
                                    @php
                                        $languages = ['Hindi', 'Gujarati', 'Marathi', 'Bengali', 'Urdu', 'Punjabi', 'Oriya', 'French', 'Spanish', 'German', 'Telugu', 'Kannada', 'Tamil', 'Malayalam'];
                                    @endphp
                                    @foreach($languages as $lang)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="other_languages[]" value="{{ $lang }}" class="mr-1">
                                        <span class="text-sm">{{ $lang }}</span>
                                    </label>
                                    @endforeach
                                </div>
                                <p class="text-xs text-gray-500 mt-2">AI matched languages to your profile</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 11: Resume Upload -->
                <div class="step" data-step="11" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Resume</h2>
                        <p class="text-purple-100 mt-1">Upload your resume!</p>
                    </div>
                    <div class="p-8">
                        <div class="text-center">
                            <div class="bg-purple-50 rounded-xl p-8 mb-4">
                                <i class="fas fa-cloud-upload-alt text-5xl text-purple-600 mb-4"></i>
                                <h3 class="text-lg font-semibold mb-2">Receive 2x job offers after uploading</h3>
                                <p class="text-sm text-gray-600 mb-2">Takes less than a min to upload</p>
                                <p class="text-xs text-gray-500">Upload .pdf or .docx file only (Max file size: 5 MB)</p>
                                <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="hidden">
                                <button type="button" id="uploadResumeBtn" class="mt-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-2 rounded-full hover:shadow-lg transition">
                                    <i class="fas fa-upload mr-2"></i>Upload Resume
                                </button>
                            </div>
                            
                            <div id="resumeInfo" class="hidden bg-green-50 rounded-xl p-4">
                                <i class="fas fa-file-pdf text-green-600"></i>
                                <span id="resumeName"></span>
                                <span id="resumeSize" class="text-sm text-gray-500 ml-2"></span>
                            </div>
                            
                            <div class="mt-6 text-left bg-yellow-50 rounded-xl p-4">
                                <p class="text-sm font-semibold mb-2">✨ Unlock jobs from top companies faster</p>
                                <p class="text-sm">✓ Get direct calls from top HRs</p>
                                <p class="text-sm">✓ Get jobs specifically suited for your role and experience level</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 12: Submit -->
                <div class="step" data-step="12" style="display: none;">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Submit your resume</h2>
                        <p class="text-purple-100 mt-1">Only visible to HRs</p>
                    </div>
                    <div class="p-8 text-center">
                        <div id="finalResumeInfo" class="bg-gray-50 rounded-xl p-6 mb-6">
                            <i class="fas fa-file-alt text-3xl text-purple-600 mb-2"></i>
                            <p id="finalResumeName" class="font-semibold"></p>
                            <p id="finalResumeSize" class="text-sm text-gray-500"></p>
                        </div>
                        
                        <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition">
                            Complete Profile
                        </button>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="px-8 py-6 bg-gray-50 border-t flex justify-between">
                    <button type="button" id="prevBtn" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition hidden">
                        <i class="fas fa-arrow-left mr-2"></i>Previous
                    </button>
                    <button type="button" id="nextBtn" class="px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg hover:shadow-lg transition ml-auto">
                        Next <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let currentStep = 1;
const totalSteps = 12;
let profileData = {};

// Show/hide steps
function showStep(step) {
    $('.step').hide();
    $(`.step[data-step="${step}"]`).show();
    
    // Update progress bar
    let progress = (step / totalSteps) * 100;
    $('#progressBar').css('width', progress + '%');
    
    // Update navigation buttons
    if (step === 1) {
        $('#prevBtn').hide();
    } else {
        $('#prevBtn').show();
    }
    
    if (step === totalSteps) {
        $('#nextBtn').hide();
    } else {
        $('#nextBtn').show();
    }
    
    // Load saved data for the step
    loadStepData(step);
}

// Save data for current step
function saveCurrentStep() {
    let stepData = {};
    
    switch(currentStep) {
        case 1:
            stepData = {
                full_name: $('#full_name').val(),
                education_level: $('input[name="education_level"]:checked').val()
            };
            if (stepData.full_name && stepData.education_level) {
                $.post('{{ route("profile.save.basic") }}', stepData);
            }
            break;
            
        case 2:
            stepData = {
                work_status: $('input[name="work_status"]:checked').val()
            };
            if (stepData.work_status) {
                $.post('{{ route("profile.save.workstatus") }}', stepData);
            }
            break;
            
        case 3:
            stepData = {
                years: $('#exp_years').val(),
                months: $('#exp_months').val()
            };
            $.post('{{ route("profile.save.experience") }}', stepData);
            break;
            
        case 4:
            // Store company details temporarily
            profileData.company_name = $('#company_name').val();
            profileData.industry = $('#industry').val();
            break;
            
        case 5:
            stepData = {
                company_name: profileData.company_name,
                industry: profileData.industry,
                job_title: $('#job_title').val(),
                start_month: $('#start_month').val(),
                start_year: $('#start_year').val(),
                currently_working: $('#currently_working').is(':checked')
            };
            if (!$('#currently_working').is(':checked')) {
                stepData.end_month = $('#end_month').val();
                stepData.end_year = $('#end_year').val();
            }
            $.post('{{ route("profile.save.company") }}', stepData);
            break;
            
        case 6:
            stepData = {
                roles: $('input[name="roles[]"]:checked').map(function() { return $(this).val(); }).get()
            };
            profileData.roles = stepData.roles;
            break;
            
        case 7:
            stepData = {
                skills: $('input[name="skills[]"]:checked').map(function() { return $(this).val(); }).get()
            };
            $.post('{{ route("profile.save.roles") }}', Object.assign({}, profileData, stepData));
            break;
            
        case 8:
            stepData = {
                salary: $('#salary').val()
            };
            $.post('{{ route("profile.save.salary") }}', stepData);
            break;
            
        case 9:
            stepData = {
                preferred_job_role: $('#preferred_job_role').val()
            };
            $.post('', stepData);
            break;
            
        case 10:
            stepData = {
                english_proficiency: $('input[name="english_level"]:checked').val(),
                other_languages: $('input[name="other_languages[]"]:checked').map(function() { return $(this).val(); }).get()
            };
            $.post('{{ route("profile.save.language") }}', stepData);
            break;
    }
}

// Load saved data for step
function loadStepData(step) {
    switch(step) {
        case 4:
            if (profileData.company_name) {
                $('#company_name').val(profileData.company_name);
                $('#industry').val(profileData.industry);
            }
            break;
            
        case 5:
            if (profileData.company_name) {
                $('#displayCompanyName').text(profileData.company_name);
                $('#displayIndustry').text(profileData.industry);
            }
            break;
            
        case 6:
            if (profileData.company_name) {
                $('#displayJobTitle').text($('#job_title').val() || 'Not specified');
                $('#displayCompany').text(profileData.company_name);
                $('#displayIndustry2').text(profileData.industry);
            }
            if (profileData.roles) {
                profileData.roles.forEach(role => {
                    $(`input[name="roles[]"][value="${role}"]`).prop('checked', true);
                });
            }
            break;
            
        case 7:
            if (profileData.company_name) {
                $('#displayJobTitle2').text($('#job_title').val() || 'Not specified');
                $('#displayCompany2').text(profileData.company_name);
                $('#displayIndustry3').text(profileData.industry);
            }
            break;
    }
}

// Navigation
$('#nextBtn').click(function() {
    saveCurrentStep();
    if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
    }
});

$('#prevBtn').click(function() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
});

// Currently working checkbox toggle
$('#currently_working').change(function() {
    if ($(this).is(':checked')) {
        $('#endDateDiv').hide();
    } else {
        $('#endDateDiv').show();
    }
});

// Resume upload
$('#uploadResumeBtn').click(function() {
    $('#resume').click();
});

$('#resume').change(function() {
    let file = this.files[0];
    if (file) {
        let formData = new FormData();
        formData.append('resume', file);
        
        $.ajax({
            url: '{{ route("profile.upload.resume") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#resumeInfo').removeClass('hidden').show();
                $('#resumeName').text(response.filename);
                let sizeKB = (response.size / 1024).toFixed(1);
                $('#resumeSize').text(`(${sizeKB} KB)`);
                
                $('#finalResumeName').text(response.filename);
                $('#finalResumeSize').text(`${sizeKB} KB`);
            }
        });
    }
});

// Custom skill addition
$('#customSkill').on('keypress', function(e) {
    if (e.which === 13) {
        e.preventDefault();
        let newSkill = $(this).val().trim();
        if (newSkill) {
            $('.grid-cols-2.md\\:grid-cols-3').append(`
                <label class="flex items-center">
                    <input type="checkbox" name="skills[]" value="${newSkill}" class="mr-2" checked>
                    <span class="text-sm">${newSkill}</span>
                </label>
            `);
            $(this).val('');
        }
    }
});

// Form submission
$('#profileForm').on('submit', function(e) {
    e.preventDefault();
    
    // Final save
    saveCurrentStep();
    
    $.ajax({
        url: '{{ route("profile.complete") }}',
        method: 'POST',
        success: function() {
            window.location.href = '{{ route("dashboard") }}';
        }
    });
});

// Initialize
showStep(1);

// Auto-save on input changes
$('input, select').on('change', function() {
    if ($(this).closest('.step').data('step') == currentStep) {
        saveCurrentStep();
    }
});
</script>

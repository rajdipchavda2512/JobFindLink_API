{{-- resources/views/employer/jobs/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Post a New Job - JobFindLink</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #eab308;
            --secondary-dark: #ca8a04;
        }
        
        .step {
            display: none;
        }
        
        .step.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .step-indicator {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .step-indicator.active .step-circle {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        }
        
        .step-indicator.completed .step-circle {
            background: #10b981;
            color: white;
        }
        
        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e7eb;
            color: #6b7280;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin: 0 auto;
            transition: all 0.3s ease;
        }
        
        .step-line {
            height: 4px;
            background: #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .step-line.completed {
            background: #10b981;
        }
        
        .select2-container--default .select2-selection--single {
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            padding: 0.5rem;
            height: auto;
        }
        
        .select2-container--default .select2-selection--single:focus {
            border-color: var(--primary);
        }
        
        .error-text {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }
        
        .salary-box {
            background: linear-gradient(135deg, #eff6ff, #fefce8);
            border: 2px solid var(--primary);
            border-radius: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }
        
        .skill-tag, .degree-tag, .language-tag {
            background: #dbeafe;
            color: #1e40af;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .remove-tag {
            cursor: pointer;
            font-weight: bold;
            color: #ef4444;
        }
        
        .remove-tag:hover {
            color: #dc2626;
        }
        
        input.error, select.error, textarea.error {
            border-color: #ef4444 !important;
        }
        
        .location-city-select {
            width: 100%;
        }
        
        .selected-city-tag {
            background: #e0e7ff;
            color: #1e3a8a;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-yellow-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="{{ url('/') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-yellow-500 bg-clip-text text-transparent">
                    JobFindLink
                </a>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700">Welcome, {{ Auth::user()->name }}</span>
                        <a href="{{ route('employer.dashboard') }}" class="text-gray-600 hover:text-blue-500">Dashboard</a>
                        <form action="{{ route('employer.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-700">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Post a New Job</h1>
            <p class="text-gray-600">Find the perfect candidate for your organization</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-10">
            <div class="flex justify-between items-center">
                <div class="step-indicator text-center flex-1" data-step="1">
                    <div class="step-circle">1</div>
                    <p class="text-sm mt-2 font-medium">Job Details</p>
                </div>
                <div class="step-line flex-1 h-1 mx-2"></div>
                <div class="step-indicator text-center flex-1" data-step="2">
                    <div class="step-circle">2</div>
                    <p class="text-sm mt-2 font-medium">Requirements</p>
                </div>
                <div class="step-line flex-1 h-1 mx-2"></div>
                <div class="step-indicator text-center flex-1" data-step="3">
                    <div class="step-circle">3</div>
                    <p class="text-sm mt-2 font-medium">Communication</p>
                </div>
                <div class="step-line flex-1 h-1 mx-2"></div>
                <div class="step-indicator text-center flex-1" data-step="4">
                    <div class="step-circle">4</div>
                    <p class="text-sm mt-2 font-medium">Preview</p>
                </div>
            </div>
        </div>

        <!-- Alert Message -->
        <div id="alertMessage" class="hidden mb-4 p-4 rounded-lg"></div>

        <!-- Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <form id="jobPostForm" method="POST">
                @csrf

                <!-- STEP 1: Job Details -->
                <div class="step active" data-step="1">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Job Details</h2>
                        <p class="text-blue-100 mt-1">We use this information to find the best candidates for the job.</p>
                        <p class="text-yellow-200 mt-2 text-sm">*Marked fields are mandatory</p>
                    </div>
                    <div class="p-8 space-y-6">
                        <!-- Company Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Company you're hiring for <span class="text-red-500">*</span></label>
                            <div class="flex gap-4">
                                <input type="text" name="company_name" id="company_name" 
                                       class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('company_name', $employerProfile->company_name ?? Auth::user()->name ?? '') }}">
                                <button type="button" id="changeCompanyBtn" class="px-6 py-3 bg-gray-200 rounded-xl hover:bg-gray-300 transition">
                                    Change
                                </button>
                            </div>
                            <div id="company_name_error" class="error-text hidden"></div>
                        </div>

                        <!-- Job Title / Designation (Single field with search dropdown) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Job title / Designation <span class="text-red-500">*</span></label>
                            <select id="job_title_select" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl searchable-select">
                                <option value="">Search and select job title...</option>
                                @foreach($jobTitles ?? [] as $title)
                                    <option value="{{ $title->id }}" data-name="{{ $title->name }}">{{ $title->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="job_title_id" id="job_title_id">
                            <input type="text" name="job_title" id="job_title" class="mt-2 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Or enter custom job title">
                            <p class="text-xs text-gray-500 mt-1">Only similar job title edits are allowed after publishing</p>
                            <div id="job_title_error" class="error-text hidden"></div>
                        </div>

                        <!-- REMOVED: Job Role / Category - completely removed as requested -->

                        <!-- Type of Job -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type of Job <span class="text-red-500">*</span></label>
                            <div class="flex gap-4">
                                <label class="flex items-center px-4 py-2 border-2 rounded-lg cursor-pointer hover:border-blue-500">
                                    <input type="radio" name="job_type" value="full_time" class="mr-2" checked> Full-Time
                                </label>
                                <label class="flex items-center px-4 py-2 border-2 rounded-lg cursor-pointer hover:border-blue-500">
                                    <input type="radio" name="job_type" value="part_time" class="mr-2"> Part-Time
                                </label>
                                <label class="flex items-center px-4 py-2 border-2 rounded-lg cursor-pointer hover:border-blue-500">
                                    <input type="radio" name="job_type" value="both" class="mr-2"> Both
                                </label>
                            </div>
                        </div>

                        <!-- Night Shift -->
                        <div>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="is_night_shift" value="1" class="mr-2 w-5 h-5 text-blue-500">
                                <span class="text-sm font-medium text-gray-700">This is a night shift job</span>
                            </label>
                        </div>

                        <!-- Location with City Search Dropdown -->
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Location</h3>
                            <p class="text-sm text-gray-600 mb-4">Let candidates know where they will be working from.</p>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Work location type <span class="text-red-500">*</span></label>
                                <div class="flex gap-4">
                                    <label class="flex items-center px-4 py-2 border-2 rounded-lg cursor-pointer hover:border-blue-500">
                                        <input type="radio" name="work_location_type" value="work_from_office" class="mr-2 work-location-type" checked> Work from Office
                                    </label>
                                    <label class="flex items-center px-4 py-2 border-2 rounded-lg cursor-pointer hover:border-blue-500">
                                        <input type="radio" name="work_location_type" value="work_from_home" class="mr-2 work-location-type"> Work from Home
                                    </label>
                                    <label class="flex items-center px-4 py-2 border-2 rounded-lg cursor-pointer hover:border-blue-500">
                                        <input type="radio" name="work_location_type" value="field_job" class="mr-2 work-location-type"> Field Job
                                    </label>
                                </div>
                            </div>

                            <div id="office_address_div">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Office address / landmark <span class="text-red-500">*</span></label>
                                <input type="text" name="office_address" id="office_address" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Enter office address">
                                <div id="office_address_error" class="error-text hidden"></div>
                            </div>

                            <div id="location_div" style="display: none;">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Job City <span class="text-red-500">*</span></label>
                                <select id="job_city_select" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl searchable-select">
                                    <option value="">Search for a city...</option>
                                    @foreach($indianCities ?? [] as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                                <div id="selected_cities" class="flex flex-wrap gap-2 mt-3"></div>
                                <input type="hidden" name="job_city" id="job_city">
                                <div id="job_city_error" class="error-text hidden"></div>
                            </div>

                            <div id="field_work_div" style="display: none;">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Field work area <span class="text-red-500">*</span></label>
                                <input type="text" name="field_work_area" id="field_work_area" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Enter field work area">
                                <div id="field_work_area_error" class="error-text hidden"></div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Floor / Plot no. / Shop no. (optional)</label>
                                <input type="text" name="floor_plot_no" id="floor_plot_no" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Enter details">
                            </div>
                        </div>

                        <!-- Compensation -->
                        <div class="salary-box p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Compensation</h3>
                            <p class="text-sm text-gray-600 mb-4">Job postings with right salary & incentives will help you find the right candidates.</p>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pay type <span class="text-red-500">*</span></label>
                                <div class="flex gap-4">
                                    <label class="flex items-center px-4 py-2 bg-white rounded-lg cursor-pointer border">
                                        <input type="radio" name="pay_type" value="fixed" class="mr-2 pay-type" checked> Fixed only
                                    </label>
                                    <label class="flex items-center px-4 py-2 bg-white rounded-lg cursor-pointer border">
                                        <input type="radio" name="pay_type" value="fixed_incentive" class="mr-2 pay-type"> Fixed + Incentive
                                    </label>
                                    <label class="flex items-center px-4 py-2 bg-white rounded-lg cursor-pointer border">
                                        <input type="radio" name="pay_type" value="incentive_only" class="mr-2 pay-type"> Incentive only
                                    </label>
                                </div>
                            </div>

                            <div id="fixed_salary_div">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fixed salary / month <span class="text-red-500">*</span></label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <input type="number" name="min_fixed_salary" id="min_fixed_salary" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Minimum">
                                        <div id="min_fixed_salary_error" class="error-text hidden"></div>
                                    </div>
                                    <div>
                                        <input type="number" name="max_fixed_salary" id="max_fixed_salary" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Maximum">
                                        <div id="max_fixed_salary_error" class="error-text hidden"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="incentive_div" style="display: none;" class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Average Incentive / month <span class="text-red-500">*</span></label>
                                <input type="number" name="avg_incentive" id="avg_incentive" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Eg. 2000">
                                <div id="avg_incentive_error" class="error-text hidden"></div>
                            </div>
                        </div>

                        <!-- Perks -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Additional perks</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                                @php
                                    $perksList = ['flexible working hours', 'weekly payout', 'overtime pay', 'joining bonus', 'annual bonus', 'pf', 'travel allowance', 'mobile allowance', 'petrol allowance', 'internet allowance', 'laptop', 'health insurance', 'accommodation', '5 working days', 'one-way cab', '2 way cab'];
                                @endphp
                                @foreach($perksList as $perk)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="perks[]" value="{{ $perk }}" class="mr-2 perk-checkbox text-blue-500">
                                        <span class="text-sm">{{ ucfirst($perk) }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <input type="text" name="other_perks" id="other_perks" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Add other perks separated by comma">
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="button" class="next-step px-8 py-3 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-xl hover:shadow-lg transition font-semibold">
                                Next: Requirements <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Candidate Requirements -->
                <div class="step" data-step="2" style="display: none;">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Candidate Requirements</h2>
                        <p class="text-blue-100 mt-1">We'll use these requirement details to make your job visible to the right candidates.</p>
                    </div>
                    <div class="p-8 space-y-6">
                        <!-- Basic Requirements -->
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Requirements</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Minimum Education <span class="text-red-500">*</span></label>
                                    <select name="minimum_education" id="minimum_education" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500">
                                        <option value="">Select Education</option>
                                        <option value="10th">10th Pass</option>
                                        <option value="12th">12th Pass</option>
                                        <option value="iti">ITI</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="graduate">Graduate</option>
                                        <option value="post_graduate">Post Graduate</option>
                                    </select>
                                    <div id="minimum_education_error" class="error-text hidden"></div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Known Languages</label>
                                    <select id="language_select" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl searchable-select">
                                        <option value="">Select language...</option>
                                        @foreach($languages ?? [] as $lang)
                                            <option value="{{ $lang->id }}" data-name="{{ $lang->name }}">{{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="selected_languages" class="flex flex-wrap gap-2 mt-3"></div>
                                    <input type="hidden" name="known_languages" id="known_languages">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Experience Required <span class="text-red-500">*</span></label>
                                    <div class="flex gap-4">
                                        <label class="flex items-center">
                                            <input type="radio" name="experience_requirement" value="any" class="mr-2 exp-req" checked> Any
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="experience_requirement" value="experienced_only" class="mr-2 exp-req"> Experienced Only
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="experience_requirement" value="fresher_only" class="mr-2 exp-req"> Fresher Only
                                        </label>
                                    </div>
                                </div>

                                <div id="experience_years_div" style="display: none;">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Experience Years <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <select name="min_experience_years" id="min_experience_years" class="px-4 py-3 border-2 border-gray-300 rounded-xl">
                                            <option value="">Min Years</option>
                                            @for($i=0; $i<=30; $i++)
                                                <option value="{{ $i }}">{{ $i }} year{{ $i != 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                        <select name="max_experience_years" id="max_experience_years" class="px-4 py-3 border-2 border-gray-300 rounded-xl">
                                            <option value="">Max Years</option>
                                            @for($i=0; $i<=30; $i++)
                                                <option value="{{ $i }}">{{ $i }} year{{ $i != 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div id="exp_error" class="error-text hidden"></div>
                                </div>

                                <div id="fresher_msg" class="hidden p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm text-blue-700">Only candidates with upto 1 year of experience will be eligible to apply</p>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Requirements -->
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Additional Requirements</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Degree / Specialization</label>
                                    <select id="degree_select" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl searchable-select">
                                        <option value="">Select degree...</option>
                                        <option value="B.Tech / B.E">B.Tech / B.E</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                        <option value="B.Com">B.Com</option>
                                        <option value="B.A">B.A</option>
                                        <option value="M.Sc">M.Sc</option>
                                        <option value="MCA">MCA</option>
                                        <option value="MBA">MBA</option>
                                        <option value="Diploma in CS">Diploma in CS</option>
                                        <option value="ITI Electrician">ITI Electrician</option>
                                    </select>
                                    <div id="selected_degrees" class="flex flex-wrap gap-2 mt-3"></div>
                                    <input type="hidden" name="degrees" id="degrees_input">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Skills (Max 15)</label>
                                    <div class="flex gap-2">
                                        <input type="text" id="skill_input" class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl" placeholder="Type skill and press Enter">
                                        <button type="button" id="addSkillBtn" class="px-6 py-3 bg-green-500 text-white rounded-xl hover:bg-green-600 transition font-semibold">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                    <div id="selected_skills" class="flex flex-wrap gap-2 mt-3"></div>
                                    <input type="hidden" name="skills" id="skills_input">
                                </div>
                            </div>
                        </div>

                        <!-- Distance & Demographics -->
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Distance - Prefer applications from</label>
                                <select name="prefer_applications_from" id="prefer_applications_from" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                    <option value="">Select distance</option>
                                    <option value="within_5km">Within 5 km</option>
                                    <option value="within_10km">Within 10 km</option>
                                    <option value="within_20km">Within 20 km</option>
                                    <option value="entire_city">Entire City</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Min Age</label>
                                    <select name="min_age" id="min_age" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                        @for($i=18; $i<=60; $i++)
                                            <option value="{{ $i }}" {{ $i==18 ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Age</label>
                                    <select name="max_age" id="max_age" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl">
                                        @for($i=18; $i<=60; $i++)
                                            <option value="{{ $i }}" {{ $i==60 ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender Preference</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center"><input type="radio" name="gender_preference" value="male" class="mr-2"> Male</label>
                                    <label class="flex items-center"><input type="radio" name="gender_preference" value="female" class="mr-2"> Female</label>
                                    <label class="flex items-center"><input type="radio" name="gender_preference" value="both" class="mr-2" checked> Both</label>
                                </div>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Job Description</label>
                            <textarea name="job_description" id="job_description" rows="5" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500" placeholder="Describe the responsibilities of this job and other specific requirements..."></textarea>
                        </div>

                        <div class="flex justify-between pt-4">
                            <button type="button" class="prev-step px-6 py-3 bg-gray-200 rounded-xl hover:bg-gray-300 transition font-semibold">
                                <i class="fas fa-arrow-left mr-2"></i> Previous
                            </button>
                            <button type="button" class="next-step px-8 py-3 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-xl hover:shadow-lg transition font-semibold">
                                Next: Communication <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Communication Preferences -->
                <div class="step" data-step="3" style="display: none;">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Communication Preferences</h2>
                        <p class="text-blue-100 mt-1">Set your communication and notification preferences</p>
                    </div>
                    <div class="p-8 space-y-6">
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Do you want candidates to contact you via Call / Whatsapp after they apply? <span class="text-red-500">*</span></label>
                                <div class="flex gap-4">
                                    <label class="flex items-center">
                                        <input type="radio" name="contact_preference" value="myself" class="mr-2 contact-pref" checked> Yes, to myself
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="contact_preference" value="other_recruiter" class="mr-2 contact-pref"> Yes, to other recruiter
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="contact_preference" value="no" class="mr-2 contact-pref"> No, I will contact candidates first
                                    </label>
                                </div>
                            </div>

                            <div id="other_recruiter_div" style="display: none;" class="mb-6 p-4 bg-white rounded-lg">
                                <h4 class="font-semibold mb-3">Other Recruiter Details</h4>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Recruiter's Name <span class="text-red-500">*</span></label>
                                        <input type="text" name="other_recruiter_name" id="other_recruiter_name" class="w-full px-4 py-2 border-2 border-gray-300 rounded-xl">
                                        <div id="other_recruiter_name_error" class="error-text hidden"></div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Recruiter's Whatsapp No. <span class="text-red-500">*</span></label>
                                        <input type="text" name="other_recruiter_whatsapp" id="other_recruiter_whatsapp" class="w-full px-4 py-2 border-2 border-gray-300 rounded-xl">
                                        <div id="other_recruiter_whatsapp_error" class="error-text hidden"></div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Recruiter's Email ID <span class="text-red-500">*</span></label>
                                        <input type="email" name="other_recruiter_email" id="other_recruiter_email" class="w-full px-4 py-2 border-2 border-gray-300 rounded-xl">
                                        <div id="other_recruiter_email_error" class="error-text hidden"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Which candidates should be able to contact you? <span class="text-red-500">*</span></label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="candidate_contact_filter" value="all" class="mr-2" checked> All candidates
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="candidate_contact_filter" value="high_medium" class="mr-2"> High & Medium matched candidates only (~60% of all candidates)
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="candidate_contact_filter" value="high_only" class="mr-2"> High Matches only
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Whatsapp Alerts Preference <span class="text-red-500">*</span></label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="whatsapp_alert_preference" value="myself" class="mr-2 alert-pref"> Yes, to myself
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="whatsapp_alert_preference" value="other_recruiter" class="mr-2 alert-pref"> Yes, to other recruiter
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="whatsapp_alert_preference" value="daily_summary" class="mr-2 alert-pref" checked> No, send me summary once a day
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between pt-4">
                            <button type="button" class="prev-step px-6 py-3 bg-gray-200 rounded-xl hover:bg-gray-300 transition font-semibold">
                                <i class="fas fa-arrow-left mr-2"></i> Previous
                            </button>
                            <button type="button" class="next-step px-8 py-3 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-xl hover:shadow-lg transition font-semibold">
                                Next: Preview <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Preview -->
                <div class="step" data-step="4" style="display: none;">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Preview Job Post</h2>
                        <p class="text-blue-100 mt-1">Review all details before publishing</p>
                    </div>
                    <div class="p-8">
                        <div id="previewContent" class="space-y-4"></div>
                        
                        <div class="flex justify-between pt-6">
                            <button type="button" class="prev-step px-6 py-3 bg-gray-200 rounded-xl hover:bg-gray-300 transition font-semibold">
                                <i class="fas fa-arrow-left mr-2"></i> Previous
                            </button>
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:shadow-lg transition font-semibold">
                                <i class="fas fa-check-circle mr-2"></i> Publish Job
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
    let currentStep = 1;
    let selectedDegrees = [];
    let selectedSkills = [];
    let selectedLanguages = [];
    let selectedCities = [];
    let totalSteps = 4;
    let jobPostId = null;

    // Indian cities for dropdown
    const indianCities = [
        'Mumbai', 'Delhi', 'Bangalore', 'Hyderabad', 'Ahmedabad', 'Chennai', 'Kolkata', 'Surat', 'Pune', 'Jaipur',
        'Lucknow', 'Kanpur', 'Nagpur', 'Indore', 'Thane', 'Bhopal', 'Visakhapatnam', 'Pimpri-Chinchwad', 'Patna', 'Vadodara',
        'Ghaziabad', 'Ludhiana', 'Agra', 'Nashik', 'Faridabad', 'Meerut', 'Rajkot', 'Kalyan-Dombivli', 'Vasai-Virar', 'Varanasi',
        'Srinagar', 'Aurangabad', 'Dhanbad', 'Amritsar', 'Navi Mumbai', 'Allahabad', 'Ranchi', 'Howrah', 'Coimbatore', 'Jabalpur',
        'Gwalior', 'Vijayawada', 'Jodhpur', 'Madurai', 'Raipur', 'Kota', 'Chandigarh', 'Guwahati', 'Solapur', 'Hubli-Dharwad'
    ];

    $(document).ready(function() {
        console.log('Document ready - currentStep = ' + currentStep);
        
        // Initialize Select2 for searchable dropdowns
        $('.searchable-select').select2({
            width: '100%',
            placeholder: 'Search and select...',
            allowClear: true
        });
        
        // Initialize job title select2
        $('#job_title_select').select2({
            width: '100%',
            placeholder: 'Search for a job title...',
            allowClear: true
        });
        
        // Initialize language select2
        $('#language_select').select2({
            width: '100%',
            placeholder: 'Search for a language...',
            allowClear: true
        });
        
        // Initialize degree select2
        $('#degree_select').select2({
            width: '100%',
            placeholder: 'Search for a degree...',
            allowClear: true
        });
        
        // Initialize city select2
        $('#job_city_select').select2({
            width: '100%',
            placeholder: 'Search for a city...',
            allowClear: true
        });
        
        // Initialize event listeners
        initializeEventListeners();
        
        // Make sure step 1 is visible
        $('.step').hide();
        $('.step[data-step="1"]').show().addClass('active');
        
        // Set active step indicator
        $('.step-indicator').removeClass('active');
        $('.step-indicator[data-step="1"]').addClass('active');
        
        console.log('Step 1 should be visible now');
    });

    function initializeEventListeners() {
        // Job title selection
        $('#job_title_select').on('change', function() {
            let selected = $(this).find('option:selected');
            let name = selected.data('name');
            let id = $(this).val();
            if (name) {
                $('#job_title').val(name);
                $('#job_title_id').val(id);
            } else {
                $('#job_title_id').val('');
            }
        });

        // City selection
        $('#job_city_select').on('change', function() {
            let city = $(this).val();
            if (city && !selectedCities.includes(city)) {
                selectedCities.push(city);
                updateCitiesDisplay();
            }
            $(this).val(null).trigger('change');
        });

        // Work location type change
        $('.work-location-type').change(function() {
            let value = $(this).val();
            $('#office_address_div').hide();
            $('#location_div').hide();
            $('#field_work_div').hide();
            
            if (value === 'work_from_office') {
                $('#office_address_div').show();
            } else if (value === 'work_from_home') {
                $('#location_div').show();
            } else if (value === 'field_job') {
                $('#field_work_div').show();
            }
        });

        // Pay type change
        $('.pay-type').change(function() {
            let value = $(this).val();
            if (value === 'fixed') {
                $('#fixed_salary_div').show();
                $('#incentive_div').hide();
            } else if (value === 'fixed_incentive') {
                $('#fixed_salary_div').show();
                $('#incentive_div').show();
            } else if (value === 'incentive_only') {
                $('#fixed_salary_div').hide();
                $('#incentive_div').show();
            }
        });

        // Experience requirement change
        $('.exp-req').change(function() {
            let value = $(this).val();
            $('#experience_years_div').hide();
            $('#fresher_msg').addClass('hidden');
            
            if (value === 'experienced_only') {
                $('#experience_years_div').show();
            } else if (value === 'fresher_only') {
                $('#fresher_msg').removeClass('hidden');
            }
        });

        // Contact preference change
        $('.contact-pref').change(function() {
            if ($(this).val() === 'other_recruiter') {
                $('#other_recruiter_div').show();
            } else {
                $('#other_recruiter_div').hide();
            }
        });

        // Language selection - hides after selection
        $('#language_select').on('change', function() {
            let id = $(this).val();
            let name = $(this).find('option:selected').text();
            if (id && !selectedLanguages.some(l => l.id == id)) {
                selectedLanguages.push({id: id, name: name});
                updateLanguagesDisplay();
                // Reset select2
                $('#language_select').val(null).trigger('change');
            }
        });

        // Degree selection
        $('#degree_select').on('change', function() {
            let name = $(this).val();
            if (name && !selectedDegrees.includes(name)) {
                selectedDegrees.push(name);
                updateDegreesDisplay();
                $(this).val(null).trigger('change');
            }
        });

        // Add Skill button
        $('#addSkillBtn').on('click', function() {
            let skill = $('#skill_input').val().trim();
            if (skill && !selectedSkills.includes(skill) && selectedSkills.length < 15) {
                selectedSkills.push(skill);
                updateSkillsDisplay();
                $('#skill_input').val('');
            } else if (selectedSkills.length >= 15) {
                showAlert('Maximum 15 skills allowed', 'error');
            } else if (selectedSkills.includes(skill)) {
                showAlert('Skill already added', 'error');
            }
        });

        // Skill input enter key
        $('#skill_input').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                $('#addSkillBtn').click();
            }
        });

        // Next buttons
        $('.next-step').click(function() {
            let stepToValidate = currentStep;
            console.log('Next button clicked - Validating step: ' + stepToValidate);
            
            let isValid = false;
            
            if (stepToValidate === 1) {
                isValid = validateStep1();
                console.log('Step 1 validation result: ' + isValid);
            } else if (stepToValidate === 2) {
                isValid = validateStep2();
                console.log('Step 2 validation result: ' + isValid);
            } else if (stepToValidate === 3) {
                isValid = validateStep3();
                console.log('Step 3 validation result: ' + isValid);
            } else if (stepToValidate === 4) {
                isValid = true;
            }
            
            if (isValid) {
                saveStepData(stepToValidate, function() {
                    if (stepToValidate < totalSteps) {
                        currentStep++;
                        showStep(currentStep);
                        updateProgressBar();
                    }
                });
            } else {
                showAlert('Please fill all required fields in this step', 'error');
            }
        });

        // Previous buttons
        $('.prev-step').click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                updateProgressBar();
            }
        });

        // Form submit (publish)
        $('#jobPostForm').on('submit', function(e) {
            e.preventDefault();
            publishJob();
        });
    }

    function validateStep1() {
        clearErrors();
        let isValid = true;
        let missingFields = [];
        
        console.log('=== VALIDATING STEP 1 ONLY ===');
        
        // 1. Company Name
        if (!$('#company_name').val().trim()) {
            showFieldError('company_name', 'Company name is required');
            missingFields.push('Company name');
            isValid = false;
        }
        
        // 2. Job Title
        if (!$('#job_title').val().trim()) {
            showFieldError('job_title', 'Job title is required');
            missingFields.push('Job title');
            isValid = false;
        }
        
        // 3. Work Location
        let workLocation = $('input[name="work_location_type"]:checked').val();
        console.log('Work location type:', workLocation);
        
        if (workLocation === 'work_from_office') {
            if (!$('#office_address').val().trim()) {
                showFieldError('office_address', 'Office address is required');
                missingFields.push('Office address');
                isValid = false;
            }
        } else if (workLocation === 'work_from_home') {
            if (selectedCities.length === 0) {
                $('#job_city_error').removeClass('hidden').text('Please select at least one city');
                missingFields.push('Job city');
                isValid = false;
            }
        } else if (workLocation === 'field_job') {
            if (!$('#field_work_area').val().trim()) {
                showFieldError('field_work_area', 'Field work area is required');
                missingFields.push('Field work area');
                isValid = false;
            }
        }
        
        // 4. Salary
        let payType = $('input[name="pay_type"]:checked').val();
        console.log('Pay type:', payType);
        
        if (payType === 'fixed' || payType === 'fixed_incentive') {
            if (!$('#min_fixed_salary').val()) {
                showFieldError('min_fixed_salary', 'Minimum salary is required');
                missingFields.push('Minimum salary');
                isValid = false;
            }
            if (!$('#max_fixed_salary').val()) {
                showFieldError('max_fixed_salary', 'Maximum salary is required');
                missingFields.push('Maximum salary');
                isValid = false;
            }
        }
        
        if ((payType === 'fixed_incentive' || payType === 'incentive_only') && !$('#avg_incentive').val()) {
            showFieldError('avg_incentive', 'Average incentive is required');
            missingFields.push('Average incentive');
            isValid = false;
        }
        
        if (!isValid) {
            console.log('STEP 1 Validation FAILED. Missing: ' + missingFields.join(', '));
            showAlert('❌ Please fill: ' + missingFields.join(', '), 'error');
        } else {
            console.log('STEP 1 Validation PASSED ✓');
        }
        
        return isValid;
    }

    function validateStep2() {
        clearErrors();
        let isValid = true;
        let missingFields = [];
        
        console.log('=== VALIDATING STEP 2 ONLY ===');
        
        if (!$('#minimum_education').val()) {
            showFieldError('minimum_education', 'Minimum education is required');
            missingFields.push('Minimum education');
            isValid = false;
        }
        
        let expReq = $('input[name="experience_requirement"]:checked').val();
        if (expReq === 'experienced_only') {
            if (!$('#min_experience_years').val()) {
                $('#exp_error').removeClass('hidden').text('Minimum experience years is required');
                missingFields.push('Minimum experience years');
                isValid = false;
            }
            if (!$('#max_experience_years').val()) {
                $('#exp_error').removeClass('hidden').text('Maximum experience years is required');
                missingFields.push('Maximum experience years');
                isValid = false;
            }
        }
        
        let minAge = parseInt($('#min_age').val());
        let maxAge = parseInt($('#max_age').val());
        if (minAge < 18) {
            showAlert('Minimum age must be at least 18 years', 'error');
            isValid = false;
        }
        if (maxAge < minAge) {
            showAlert('Maximum age must be greater than minimum age', 'error');
            isValid = false;
        }
        
        if (!isValid) {
            console.log('STEP 2 Validation FAILED. Missing: ' + missingFields.join(', '));
            showAlert('❌ Please fill: ' + missingFields.join(', '), 'error');
        } else {
            console.log('STEP 2 Validation PASSED ✓');
        }
        
        return isValid;
    }

    function validateStep3() {
        clearErrors();
        let isValid = true;
        let missingFields = [];
        
        console.log('=== VALIDATING STEP 3 ONLY ===');
        
        let contactPref = $('input[name="contact_preference"]:checked').val();
        if (contactPref === 'other_recruiter') {
            if (!$('#other_recruiter_name').val().trim()) {
                showFieldError('other_recruiter_name', 'Recruiter name is required');
                missingFields.push('Recruiter name');
                isValid = false;
            }
            if (!$('#other_recruiter_whatsapp').val().trim()) {
                showFieldError('other_recruiter_whatsapp', 'Whatsapp number is required');
                missingFields.push('Whatsapp number');
                isValid = false;
            }
            if (!$('#other_recruiter_email').val().trim()) {
                showFieldError('other_recruiter_email', 'Email is required');
                missingFields.push('Email');
                isValid = false;
            }
        }
        
        if (!isValid) {
            console.log('STEP 3 Validation FAILED. Missing: ' + missingFields.join(', '));
            showAlert('❌ Please fill: ' + missingFields.join(', '), 'error');
        } else {
            console.log('STEP 3 Validation PASSED ✓');
        }
        
        return isValid;
    }

    function showStep(step) {
        console.log('Showing step: ' + step);
        $('.step').removeClass('active').hide();
        $(`.step[data-step="${step}"]`).addClass('active').show();
        
        $('.step-indicator').removeClass('active');
        $(`.step-indicator[data-step="${step}"]`).addClass('active');
        
        if (step === 4) {
            generatePreview();
        }
        
        $('html, body').animate({ scrollTop: 0 }, 300);
    }

    function updateProgressBar() {
        for(let i = 1; i < currentStep; i++) {
            $(`.step-indicator[data-step="${i}"]`).addClass('completed');
            $('.step-line').eq(i-1).addClass('completed');
        }
    }

    function saveStepData(step, callback) {
        // Update hidden fields before saving
        $('#job_city').val(JSON.stringify(selectedCities));
        
        let formData = new FormData($('#jobPostForm')[0]);
        formData.append('step', step);
        formData.append('next_step', step + 1);
        formData.append('degrees', JSON.stringify(selectedDegrees));
        formData.append('skills', JSON.stringify(selectedSkills));
        formData.append('known_languages', JSON.stringify(selectedLanguages.map(l => l.id)));
        formData.append('job_city', JSON.stringify(selectedCities));
        
        if (jobPostId) {
            formData.append('job_post_id', jobPostId);
        }
        
        let nextBtn = $('.next-step');
        let originalText = nextBtn.html();
        nextBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i> Saving...').prop('disabled', true);
        
        $.ajax({
            url: '{{ route("employer.jobs.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: function(response) {
                nextBtn.html(originalText).prop('disabled', false);
                if (response.success) {
                    if (response.job_post_id) {
                        jobPostId = response.job_post_id;
                    }
                    showAlert(response.message, 'success');
                    if (callback) callback();
                } else {
                    showAlert(response.message || 'Error saving data', 'error');
                }
            },
            error: function(xhr) {
                nextBtn.html(originalText).prop('disabled', false);
                console.log('AJAX Error:', xhr);
                
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, function(key, messages) {
                        showFieldError(key, messages[0]);
                    });
                    showAlert('Please fix: ' + Object.keys(errors).join(', '), 'error');
                } else {
                    let errorMsg = xhr.responseJSON?.message || 'Server error occurred';
                    showAlert(errorMsg, 'error');
                }
            }
        });
    }

    function publishJob() {
        $('#job_city').val(JSON.stringify(selectedCities));
        
        let formData = new FormData($('#jobPostForm')[0]);
        formData.append('step', 'final');
        formData.append('degrees', JSON.stringify(selectedDegrees));
        formData.append('skills', JSON.stringify(selectedSkills));
        formData.append('known_languages', JSON.stringify(selectedLanguages.map(l => l.id)));
        formData.append('job_city', JSON.stringify(selectedCities));
        
        if (jobPostId) {
            formData.append('job_post_id', jobPostId);
        }
        
        let publishBtn = $('button[type="submit"]');
        let originalText = publishBtn.html();
        publishBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i> Publishing...').prop('disabled', true);
        
        $.ajax({
            url: '{{ route("employer.jobs.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: function(response) {
                if (response.success) {
                    showAlert(response.message, 'success');
                    if (response.redirect) {
                        setTimeout(() => {
                            window.location.href = response.redirect;
                        }, 2000);
                    }
                } else {
                    publishBtn.html(originalText).prop('disabled', false);
                    showAlert(response.message || 'Error publishing job', 'error');
                }
            },
            error: function(xhr) {
                publishBtn.html(originalText).prop('disabled', false);
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    $.each(errors, function(key, messages) {
                        showFieldError(key, messages[0]);
                    });
                    showAlert('Please fix: ' + Object.keys(errors).join(', '), 'error');
                } else {
                    showAlert(xhr.responseJSON?.message || 'Error publishing job', 'error');
                }
            }
        });
    }

    function generatePreview() {
        let perks = [];
        $('.perk-checkbox:checked').each(function() {
            perks.push($(this).val());
        });
        let otherPerks = $('#other_perks').val();
        if (otherPerks) {
            perks = perks.concat(otherPerks.split(',').map(p => p.trim()));
        }
        
        let workLocationText = $('input[name="work_location_type"]:checked').val();
        let locationText = '';
        if (workLocationText === 'work_from_office') {
            locationText = $('#office_address').val();
        } else if (workLocationText === 'work_from_home') {
            locationText = selectedCities.join(', ');
        } else {
            locationText = $('#field_work_area').val();
        }
        
        let html = `
            <div class="bg-gray-50 p-6 rounded-xl">
                <h3 class="text-xl font-bold text-gray-800 mb-4">${escapeHtml($('#company_name').val())}</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div><strong>Job Title:</strong> ${escapeHtml($('#job_title').val())}</div>
                    <div><strong>Job Type:</strong> ${escapeHtml($('input[name="job_type"]:checked').val())}</div>
                    <div><strong>Night Shift:</strong> ${$('#is_night_shift').is(':checked') ? 'Yes' : 'No'}</div>
                    <div><strong>Work Location:</strong> ${escapeHtml(workLocationText)}</div>
                    <div><strong>Location Details:</strong> ${escapeHtml(locationText)}</div>
                    <div><strong>Pay Type:</strong> ${escapeHtml($('input[name="pay_type"]:checked').val())}</div>
                    <div><strong>Salary:</strong> ${escapeHtml($('#min_fixed_salary').val())} - ${escapeHtml($('#max_fixed_salary').val())}</div>
                    <div><strong>Minimum Education:</strong> ${escapeHtml($('#minimum_education').val())}</div>
                    <div><strong>Experience:</strong> ${escapeHtml($('input[name="experience_requirement"]:checked').val())}</div>
                    <div><strong>Age Range:</strong> ${escapeHtml($('#min_age').val())} - ${escapeHtml($('#max_age').val())}</div>
                    <div><strong>Gender:</strong> ${escapeHtml($('input[name="gender_preference"]:checked').val())}</div>
                </div>
                ${perks.length > 0 ? `<div class="mt-4"><strong>Perks:</strong> ${escapeHtml(perks.join(', '))}</div>` : ''}
                ${selectedSkills.length > 0 ? `<div class="mt-4"><strong>Skills:</strong> ${escapeHtml(selectedSkills.join(', '))}</div>` : ''}
                ${selectedDegrees.length > 0 ? `<div class="mt-4"><strong>Degrees:</strong> ${escapeHtml(selectedDegrees.join(', '))}</div>` : ''}
                ${selectedLanguages.length > 0 ? `<div class="mt-4"><strong>Languages:</strong> ${escapeHtml(selectedLanguages.map(l => l.name).join(', '))}</div>` : ''}
                ${$('#job_description').val() ? `<div class="mt-4"><strong>Job Description:</strong><p class="mt-2">${escapeHtml($('#job_description').val())}</p></div>` : ''}
            </div>
        `;
        $('#previewContent').html(html);
    }
    
    function escapeHtml(text) {
        if (!text) return '';
        return String(text).replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    function updateCitiesDisplay() {
        if (selectedCities.length === 0) {
            $('#selected_cities').html('<p class="text-gray-400 text-sm">No cities selected. Search and select cities above.</p>');
        } else {
            $('#selected_cities').html(selectedCities.map(city => 
                `<span class="selected-city-tag">${escapeHtml(city)} <span class="remove-tag" data-city="${city}">&times;</span></span>`
            ).join(''));
        }
        $('#job_city').val(JSON.stringify(selectedCities));
    }

    function updateLanguagesDisplay() {
        if (selectedLanguages.length === 0) {
            $('#selected_languages').html('<p class="text-gray-400 text-sm">No languages selected. Search and select languages above.</p>');
        } else {
            $('#selected_languages').html(selectedLanguages.map(lang => 
                `<span class="skill-tag">${escapeHtml(lang.name)} <span class="remove-tag" data-id="${lang.id}">&times;</span></span>`
            ).join(''));
        }
        $('#known_languages').val(JSON.stringify(selectedLanguages.map(l => l.id)));
    }

    function updateDegreesDisplay() {
        if (selectedDegrees.length === 0) {
            $('#selected_degrees').html('<p class="text-gray-400 text-sm">No degrees selected</p>');
        } else {
            $('#selected_degrees').html(selectedDegrees.map(degree => 
                `<span class="skill-tag">${escapeHtml(degree)} <span class="remove-tag" data-degree="${degree}">&times;</span></span>`
            ).join(''));
        }
        $('#degrees_input').val(JSON.stringify(selectedDegrees));
    }

    function updateSkillsDisplay() {
        if (selectedSkills.length === 0) {
            $('#selected_skills').html('<p class="text-gray-400 text-sm">No skills added. Type a skill and click Add.</p>');
        } else {
            $('#selected_skills').html(selectedSkills.map(skill => 
                `<span class="skill-tag">${escapeHtml(skill)} <span class="remove-tag" data-skill="${skill}">&times;</span></span>`
            ).join(''));
        }
        $('#skills_input').val(JSON.stringify(selectedSkills));
    }

    function clearErrors() {
        $('.error-text').addClass('hidden').text('');
        $('input, select, textarea').removeClass('border-red-500');
    }

    function showFieldError(field, message) {
        $(`#${field}_error`).removeClass('hidden').text(message);
        $(`#${field}`).addClass('border-red-500');
    }

    function showAlert(message, type) {
        let alertDiv = $('#alertMessage');
        alertDiv.removeClass('hidden bg-green-100 text-green-700 bg-red-100 text-red-700');
        alertDiv.addClass(type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700');
        alertDiv.html(`<i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>${message}`);
        setTimeout(() => {
            alertDiv.addClass('hidden');
        }, 5000);
    }

    $(document).on('click', '.remove-tag', function() {
        let id = $(this).data('id');
        let degree = $(this).data('degree');
        let skill = $(this).data('skill');
        let city = $(this).data('city');
        
        if (id) {
            selectedLanguages = selectedLanguages.filter(l => l.id != id);
            updateLanguagesDisplay();
        }
        if (degree) {
            selectedDegrees = selectedDegrees.filter(d => d !== degree);
            updateDegreesDisplay();
        }
        if (skill) {
            selectedSkills = selectedSkills.filter(s => s !== skill);
            updateSkillsDisplay();
        }
        if (city) {
            selectedCities = selectedCities.filter(c => c !== city);
            updateCitiesDisplay();
        }
    });
    </script>
</body>
</html>
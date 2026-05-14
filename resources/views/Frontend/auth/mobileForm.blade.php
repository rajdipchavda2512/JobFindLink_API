{{-- resources/views/Frontend/auth/mobileForm.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JobFindLink - {{ ucfirst($type) }} Login | India's #1 Job Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* Yellow & Blue Theme Colors */
        :root {
            --primary-blue: #1e3a8a;
            --primary-blue-light: #2563eb;
            --primary-blue-dark: #172554;
            --secondary-yellow: #f59e0b;
            --secondary-yellow-light: #fbbf24;
            --secondary-yellow-dark: #d97706;
            --accent: #10b981;
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        /* Animated Background */
        .animated-bg {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .animated-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle cx="50" cy="50" r="40" fill="rgba(255,255,255,0.05)"/><circle cx="150" cy="120" r="60" fill="rgba(255,255,255,0.03)"/><circle cx="80" cy="180" r="30" fill="rgba(255,255,255,0.04)"/></svg>');
            background-repeat: repeat;
            animation: moveBackground 20s linear infinite;
        }
        
        @keyframes moveBackground {
            0% { transform: translate(0, 0); }
            100% { transform: translate(100px, 100px); }
        }
        
        /* Floating Shapes */
        .floating-shape {
            position: absolute;
            background: rgba(245, 158, 11, 0.08);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        /* Yellow accent shapes */
        .yellow-shape {
            background: rgba(245, 158, 11, 0.15);
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
        }
        
        .company-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        
        .animate-float {
            animation: floatLogo 3s ease-in-out infinite;
        }
        
        @keyframes floatLogo {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            left: 20px;
            z-index: 9999;
            animation: slideInRight 0.5s ease-out;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.6s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Button Styles */
        .btn-yellow {
            background: linear-gradient(135deg, var(--secondary-yellow) 0%, var(--secondary-yellow-dark) 100%);
        }
        
        .btn-yellow:hover:not(:disabled) {
            background: linear-gradient(135deg, var(--secondary-yellow-light) 0%, var(--secondary-yellow) 100%);
            transform: scale(1.02);
        }
        
        .btn-gray {
            background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
            cursor: not-allowed;
        }
        
        .input-focus-effect:focus {
            border-color: var(--secondary-yellow);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
            outline: none;
        }
        
        @media (max-width: 1024px) {
            .animated-bg::before {
                display: none;
            }
        }
        
        button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        /* Redirect Overlay */
        .redirect-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.8);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .redirect-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            max-width: 400px;
            animation: slideUp 0.4s ease-out;
        }
        
        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- Left Section - Logo & Branding -->
        <div class="lg:w-1/2 animated-bg text-white p-8 lg:p-16 flex flex-col justify-center relative overflow-hidden">
            <!-- Floating Design Elements -->
            <div class="floating-shape w-64 h-64 top-10 -left-20" style="animation-delay: 0s;"></div>
            <div class="floating-shape w-48 h-48 bottom-10 -right-20" style="animation-delay: 2s;"></div>
            <div class="floating-shape w-32 h-32 top-1/2 left-1/2" style="animation-delay: 4s;"></div>
            
            <!-- Yellow Glowing Effects -->
            <div class="yellow-shape w-96 h-96 top-20 -right-48"></div>
            <div class="yellow-shape w-80 h-80 bottom-20 -left-40"></div>
            
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -mt-48 -ml-48"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full -mb-48 -mr-48"></div>
            </div>
            
            <div class="relative z-10 max-w-md mx-auto text-center lg:text-left">
                <!-- Logo Section -->
                <div class="flex justify-center lg:justify-start mb-8">
                    <div class="relative">
                        <div class="w-28 h-28 bg-white rounded-2xl flex items-center justify-center shadow-2xl animate-float">
                            <img src="{{ asset('images/jobfindlink_logo.png') }}" 
                                 alt="JobFindLink" 
                                 class="w-20 h-20 object-contain"
                                 onerror="this.src='https://via.placeholder.com/80x80?text=JFL'">
                        </div>
                        <div class="absolute -top-3 -right-3 w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-star text-white text-sm"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Company Name -->
                <div class="mb-6">
                    <h1 class="text-5xl lg:text-6xl font-bold mb-2 tracking-tight">
                        Job<span class="text-yellow-400">Find</span>Link
                    </h1>
                    <div class="flex justify-center lg:justify-start items-center gap-2 mt-2">
                        <div class="w-12 h-0.5 bg-yellow-400"></div>
                        <p class="text-sm font-semibold tracking-wide">INDIA'S #1 JOB PLATFORM</p>
                    </div>
                </div>
                
                <!-- Tagline -->
                <div class="mb-8">
                    <p class="text-xl leading-relaxed opacity-95">
                        @if($type === 'employee')
                            Your career journey begins here.
                        @else
                            Find the best talent for your company.
                        @endif
                        <span class="block text-yellow-400 font-semibold mt-2">
                            @if($type === 'employee')
                                50 Lakh+ Opportunities Await!
                            @else
                                Connect with 5Cr+ Job Seekers!
                            @endif
                        </span>
                    </p>
                </div>
                
                <!-- Stats Cards -->
                @if($type === 'employee')
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-map-marker-alt text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Cover in Gujarat</p>
                        <p class="text-xs opacity-75">2,500+ Jobs</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-laptop-code text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Freelancing</p>
                        <p class="text-xs opacity-75">1,200+ Projects</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-file-signature text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Contract</p>
                        <p class="text-xs opacity-75">3-12 Months</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-briefcase text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Permanent</p>
                        <p class="text-xs opacity-75">Full Time</p>
                    </div>
                </div>
                @else
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-chart-line text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Active Jobs</p>
                        <p class="text-xs opacity-75">2L+ Live Jobs</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-users text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Job Seekers</p>
                        <p class="text-xs opacity-75">5Cr+ Candidates</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-building text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Companies</p>
                        <p class="text-xs opacity-75">50k+ Trust Us</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center border border-yellow-400/30 hover:bg-yellow-400/20 transition cursor-pointer">
                        <i class="fas fa-clock text-yellow-400 text-lg mb-1"></i>
                        <p class="text-xs font-semibold">Quick Hiring</p>
                        <p class="text-xs opacity-75">24hr Response</p>
                    </div>
                </div>
                @endif
                
                <!-- Trust Indicators -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-400">50k+</div>
                        <p class="text-xs opacity-80">Companies</p>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-400">5cr+</div>
                        <p class="text-xs opacity-80">Job Seekers</p>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-400">2L+</div>
                        <p class="text-xs opacity-80">Live Jobs</p>
                    </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-1">
                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                            <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                        </div>
                        <p class="text-xs font-bold mt-1">4.7 ★ Rating</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Section - Mobile Number Entry Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 sm:p-8 lg:p-16 bg-gradient-to-br from-gray-50 to-white">
            <div class="w-full max-w-md">
                <!-- Welcome Card -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        @if($type === 'employee')
                            <i class="fas fa-user-circle text-white text-3xl"></i>
                        @else
                            <i class="fas fa-building text-white text-3xl"></i>
                        @endif
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ ucfirst($type) }} Login</h2>
                    <p class="text-gray-500 text-sm mt-2">
                        @if($type === 'employee')
                            Enter your mobile number to continue
                        @else
                            Enter your mobile number to post jobs
                        @endif
                    </p>
                </div>
                
                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8 border-t-4 border-yellow-500">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-mobile-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Mobile Verification</h3>
                        <p class="text-xs text-gray-500 mt-1">Enter your 10-digit mobile number</p>
                    </div>
                    
                    <!-- Mobile Number Form -->
                    <form id="mobileForm" action="{{ route('auth.send.otp', ['type' => $type]) }}" method="POST" class="space-y-5">
                        @csrf
                        
                        <!-- Mobile Number Input -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Mobile Number
                            </label>
                            <div class="relative">
                                <div class="absolute left-0 top-0 bottom-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500 font-semibold text-sm">+91</span>
                                </div>
                                <input type="tel" 
                                       id="mobile" 
                                       name="mobile" 
                                       maxlength="10"
                                       pattern="[0-9]{10}"
                                       placeholder="9876543210"
                                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition-all text-base tracking-wider"
                                       autocomplete="off"
                                       required>
                            </div>
                            <div id="mobileStatus" class="mt-2 text-xs"></div>
                            <div class="flex items-center justify-between mt-2">
                                <p class="text-xs text-gray-500">
                                    <i class="fas fa-lock mr-1 text-green-600"></i> Secure & Private
                                </p>
                                <p class="text-xs text-yellow-600">
                                    <i class="fas fa-clock mr-1"></i> OTP valid for 5 mins
                                </p>
                            </div>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        <div class="flex items-start space-x-2 bg-gray-50 p-3 rounded-lg">
                            <input type="checkbox" id="terms" class="mt-0.5 rounded border-gray-300 text-yellow-500 focus:ring-yellow-500" required>
                            <label for="terms" class="text-xs text-gray-600 leading-relaxed">
                                I agree to the <a href="#" class="text-yellow-600 hover:underline font-semibold">Terms of Service</a> 
                                and <a href="#" class="text-yellow-600 hover:underline font-semibold">Privacy Policy</a>
                            </label>
                        </div>
                        
                        <!-- Send OTP Button - Initially Disabled -->
                        <button type="submit" 
                                id="sendOtpBtn"
                                disabled
                                class="w-full bg-gradient-to-r from-gray-400 to-gray-500 text-white py-3.5 rounded-xl font-semibold transition-all text-base flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            <span>Send OTP</span>
                        </button>
                    </form>
                    
                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-xs">
                            <span class="px-3 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>
                    
                    <!-- Social Login Options -->
                    <div class="grid grid-cols-2 gap-3">
                        <button class="flex items-center justify-center gap-2 bg-white border border-gray-200 rounded-lg py-2.5 px-3 hover:shadow-md hover:border-yellow-500 transition group">
                            <i class="fab fa-google text-red-500"></i>
                            <span class="text-sm font-medium text-gray-700">Google</span>
                        </button>
                        <button class="flex items-center justify-center gap-2 bg-white border border-gray-200 rounded-lg py-2.5 px-3 hover:shadow-md hover:border-yellow-500 transition group">
                            <i class="fab fa-linkedin text-blue-700"></i>
                            <span class="text-sm font-medium text-gray-700">LinkedIn</span>
                        </button>
                    </div>
                </div>
                
                <!-- Support Section -->
                <div class="mt-6 text-center">
                    <div class="flex justify-center gap-4 text-xs text-gray-500">
                        <a href="#" class="hover:text-yellow-600 transition">
                            <i class="fas fa-headset mr-1"></i> Help Center
                        </a>
                        <a href="#" class="hover:text-yellow-600 transition">
                            <i class="fas fa-question-circle mr-1"></i> FAQ
                        </a>
                        <a href="#" class="hover:text-yellow-600 transition">
                            <i class="fas fa-envelope mr-1"></i> Support
                        </a>
                    </div>
                </div>
                
                <!-- Dynamic Switch Link -->
                <div class="mt-4 text-center">
                    @if($type === 'employee')
                        <p class="text-sm text-gray-600">
                            Are you an employer?
                            <a href="{{ route('auth.mobile.form', ['type' => 'employer']) }}"
                               class="text-yellow-600 hover:underline font-semibold">
                                Post a Job for Free →
                            </a>
                        </p>
                    @else
                        <p class="text-sm text-gray-600">
                            Are you a job seeker?
                            <a href="{{ route('auth.mobile.form', ['type' => 'employee']) }}"
                               class="text-yellow-600 hover:underline font-semibold">
                                Find Jobs →
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Session Messages -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('{{ session('success') }}', 'success');
        });
    </script>
    @endif
    
    @if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($errors->all() as $error)
                showNotification('{{ $error }}', 'error');
            @endforeach
        });
    </script>
    @endif

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let checkTimeout;
    let canSendOtp = false;
    let currentMobileNumber = '';
    
    $(document).ready(function() {
        // Initially disable send button
        $('#sendOtpBtn').prop('disabled', true);
        
        // Format mobile number input
        $('#mobile').on('input', function() {
            let value = $(this).val().replace(/[^0-9]/g, '');
            if (value.length > 10) {
                value = value.slice(0, 10);
            }
            $(this).val(value);
            currentMobileNumber = value;
            
            // Clear previous timeout
            if (checkTimeout) {
                clearTimeout(checkTimeout);
            }
            
            // Check mobile status after user types 10 digits
            if (value.length === 10) {
                checkTimeout = setTimeout(function() {
                    checkMobileStatus(value);
                }, 500);
            } else {
                // Reset UI when number is incomplete
                $('#mobileStatus').html('');
                $('#mobileStatus').removeClass('text-green-600 text-red-600 text-yellow-600');
                $('#sendOtpBtn').prop('disabled', true);
                $('#sendOtpBtn').removeClass('from-yellow-500 to-yellow-600').addClass('from-gray-400 to-gray-500');
                canSendOtp = false;
            }
        });
        
        // Function to check mobile status via AJAX
        function checkMobileStatus(mobile) {
            // Show loading indicator
            $('#mobileStatus').html(`
                <div class="text-blue-600 bg-blue-50 p-2 rounded-lg">
                    <i class="fas fa-spinner fa-spin mr-1"></i> 
                    Checking number...
                </div>
            `);
            
            $.ajax({
                url: '{{ route("auth.check.mobile", ["type" => $type]) }}',
                method: 'POST',
                data: {
                    mobile: mobile,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Case 1: Already logged in with profile complete - Redirect to DASHBOARD
                    if (response.already_logged_in && response.redirect_to_dashboard) {
                        $('#mobileStatus').html(`
                            <div class="text-green-600 bg-green-50 p-2 rounded-lg">
                                <i class="fas fa-check-circle mr-1"></i> 
                                ${response.message}
                            </div>
                        `);
                        $('#sendOtpBtn').prop('disabled', true);
                        $('#sendOtpBtn').removeClass('from-yellow-500 to-yellow-600').addClass('from-gray-400 to-gray-500');
                        
                        if (response.redirect_url) {
                            showDashboardRedirectOverlay(response.redirect_url);
                        }
                        return; // Stop further processing
                    }
                    
                    // Case 2: Already logged in but profile incomplete - Redirect to PROFILE COMPLETION
                    if (response.already_logged_in && response.redirect_to_profile) {
                        $('#mobileStatus').html(`
                            <div class="text-yellow-600 bg-yellow-50 p-2 rounded-lg">
                                <i class="fas fa-info-circle mr-1"></i> 
                                ${response.message}
                            </div>
                        `);
                        $('#sendOtpBtn').prop('disabled', true);
                        $('#sendOtpBtn').removeClass('from-yellow-500 to-yellow-600').addClass('from-gray-400 to-gray-500');
                        
                        if (response.redirect_url) {
                            showProfileRedirectOverlay(response.redirect_url);
                        }
                        return; // Stop further processing
                    }
                    
                    // Case 3: Role mismatch - Show error and redirect to correct role
                    if (response.role_mismatch) {
                        $('#mobileStatus').html(`
                            <div class="text-red-600 bg-red-50 p-2 rounded-lg">
                                <i class="fas fa-exclamation-circle mr-1"></i> 
                                ${response.message}
                            </div>
                        `);
                        $('#sendOtpBtn').prop('disabled', true);
                        $('#sendOtpBtn').removeClass('from-yellow-500 to-yellow-600').addClass('from-gray-400 to-gray-500');
                        
                        if (response.correct_type_url) {
                            setTimeout(function() {
                                showRoleMismatchOverlay(response.correct_type_url, response.correct_type);
                            }, 1500);
                        }
                        return; // Stop further processing
                    }
                    
                    // Case 4: Can proceed with OTP (new number or existing user not logged in)
                    if (response.can_proceed && response.action === 'send_otp') {
                        canSendOtp = true;
                        
                        let statusColor = 'text-green-600 bg-green-50';
                        let icon = 'fa-check-circle';
                        let message = response.message;
                        
                        if (response.exists && response.profile_complete === true) {
                            // Profile complete but not logged in - After logout scenario
                            statusColor = 'text-blue-600 bg-blue-50';
                            icon = 'fa-shield-alt';
                            message = 'Profile complete! Please verify OTP to login.';
                        } else if (response.exists && response.profile_complete === false) {
                            // Profile incomplete - Need to complete profile
                            statusColor = 'text-yellow-600 bg-yellow-50';
                            icon = 'fa-info-circle';
                            message = 'Please verify OTP to complete your profile.';
                        } else if (!response.exists) {
                            // New user
                            statusColor = 'text-green-600 bg-green-50';
                            icon = 'fa-check-circle';
                            message = 'New number! Please verify OTP to continue.';
                        }
                        
                        $('#mobileStatus').html(`
                            <div class="${statusColor} p-2 rounded-lg">
                                <i class="fas ${icon} mr-1"></i> 
                                ${message}
                            </div>
                        `);
                        
                        // Enable send OTP button
                        $('#sendOtpBtn').prop('disabled', false);
                        $('#sendOtpBtn').removeClass('from-gray-400 to-gray-500').addClass('from-yellow-500 to-yellow-600');
                    } else {
                        // Default case - disable send button
                        $('#sendOtpBtn').prop('disabled', true);
                        $('#sendOtpBtn').removeClass('from-yellow-500 to-yellow-600').addClass('from-gray-400 to-gray-500');
                        canSendOtp = false;
                    }
                },
                error: function(xhr) {
                    console.error('Error checking mobile status');
                    $('#mobileStatus').html(`
                        <div class="text-red-600 bg-red-50 p-2 rounded-lg">
                            <i class="fas fa-exclamation-circle mr-1"></i> 
                            Error checking number. Please try again.
                        </div>
                    `);
                    $('#sendOtpBtn').prop('disabled', true);
                    $('#sendOtpBtn').removeClass('from-yellow-500 to-yellow-600').addClass('from-gray-400 to-gray-500');
                    canSendOtp = false;
                }
            });
        }
        
        // Show dashboard redirect overlay (for complete profile, already logged in)
        function showDashboardRedirectOverlay(redirectUrl) {
            const overlay = $(`
                <div class="redirect-overlay">
                    <div class="redirect-card">
                        <div class="mb-4">
                            <i class="fas fa-user-check text-green-500 text-5xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Welcome Back!</h3>
                        <p class="text-gray-600 mb-4">
                            Your profile is complete. Redirecting to your dashboard...
                        </p>
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden mb-4">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 0%; animation: progress 2s linear forwards;"></div>
                        </div>
                        <div class="flex items-center justify-center gap-2 text-sm text-gray-500">
                            <i class="fas fa-spinner fa-spin"></i>
                            <span>Redirecting to dashboard...</span>
                        </div>
                    </div>
                </div>
            `);
            
            $('body').append(overlay);
            
            $('head').append(`
                <style>
                    @keyframes progress {
                        from { width: 0%; }
                        to { width: 100%; }
                    }
                </style>
            `);
            
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 2000);
        }
        
        // Show profile completion redirect overlay (for incomplete profile)
        function showProfileRedirectOverlay(redirectUrl) {
            const overlay = $(`
                <div class="redirect-overlay">
                    <div class="redirect-card">
                        <div class="mb-4">
                            <i class="fas fa-edit text-yellow-500 text-5xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Your Profile</h3>
                        <p class="text-gray-600 mb-4">
                            Please complete your profile to continue.
                        </p>
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden mb-4">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 0%; animation: progress 2s linear forwards;"></div>
                        </div>
                        <div class="flex items-center justify-center gap-2 text-sm text-gray-500">
                            <i class="fas fa-spinner fa-spin"></i>
                            <span>Redirecting to profile completion...</span>
                        </div>
                    </div>
                </div>
            `);
            
            $('body').append(overlay);
            
            $('head').append(`
                <style>
                    @keyframes progress {
                        from { width: 0%; }
                        to { width: 100%; }
                    }
                </style>
            `);
            
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 2000);
        }
        
        // Show role mismatch overlay
        function showRoleMismatchOverlay(redirectUrl, correctType) {
            const typeText = correctType === 'employee' ? 'Job Seeker' : 'Employer';
            
            const overlay = $(`
                <div class="redirect-overlay">
                    <div class="redirect-card">
                        <div class="mb-4">
                            <i class="fas fa-exclamation-triangle text-red-500 text-5xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Account Type Mismatch!</h3>
                        <p class="text-gray-600 mb-4">
                            This number is registered as a ${typeText}.<br>
                            Redirecting you to the correct login page.
                        </p>
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden mb-4">
                            <div class="bg-red-500 h-2 rounded-full" style="width: 0%; animation: progress 2s linear forwards;"></div>
                        </div>
                        <div class="flex items-center justify-center gap-2 text-sm text-gray-500">
                            <i class="fas fa-spinner fa-spin"></i>
                            <span>Redirecting...</span>
                        </div>
                    </div>
                </div>
            `);
            
            $('body').append(overlay);
            
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 2000);
        }
        
        // Show notification function
        function showNotification(message, type = 'success') {
            let bgColor, icon;
            
            switch(type) {
                case 'success':
                    bgColor = 'bg-green-500';
                    icon = 'fa-check-circle';
                    break;
                case 'error':
                    bgColor = 'bg-red-500';
                    icon = 'fa-exclamation-circle';
                    break;
                default:
                    bgColor = 'bg-yellow-500';
                    icon = 'fa-info-circle';
            }
            
            const notification = $(`
                <div class="notification">
                    <div class="${bgColor} text-white px-4 sm:px-6 py-3 rounded-xl shadow-lg flex items-center space-x-3">
                        <i class="fas ${icon} text-lg"></i>
                        <span class="text-sm">${message}</span>
                    </div>
                </div>
            `);
            
            $('body').append(notification);
            
            setTimeout(function() {
                notification.fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }
        
        // Handle mobile form submission
        $('#mobileForm').on('submit', function(e) {
            const isTermsChecked = $('#terms').is(':checked');
            
            if (!isTermsChecked) {
                e.preventDefault();
                showNotification('Please accept the Terms of Service and Privacy Policy', 'error');
                return false;
            }
            
            // Prevent submission if cannot send OTP
            if (!canSendOtp) {
                e.preventDefault();
                showNotification('Please wait for number verification', 'error');
                return false;
            }
            
            let mobile = $('#mobile').val().replace(/\s/g, '');
            
            if (!mobile || mobile.length !== 10) {
                e.preventDefault();
                showNotification('Please enter a valid 10-digit mobile number', 'error');
                return false;
            }
            
            // Disable button and show loading
            const sendBtn = $('#sendOtpBtn');
            sendBtn.html('<div class="loading-spinner"></div><span>Sending OTP...</span>');
            sendBtn.prop('disabled', true);
            
            return true;
        });
        
        // Category click handlers
        $('.grid > div').on('click', function() {
            const category = $(this).find('p:first').text();
            showNotification(`Exploring ${category}...`, 'info');
        });
    });
</script>

</body>
</html>
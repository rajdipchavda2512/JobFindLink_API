{{-- resources/views/auth/verify-otp.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ucfirst($type) }} Verification - JobFindLink | India's #1 Job Platform</title>
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
        
        /* OTP Input Styles */
        .otp-input {
            letter-spacing: 0.5rem;
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
        }
        
        .otp-input:focus {
            border-color: var(--secondary-yellow);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
            outline: none;
        }
        
        /* Yellow Button Style */
        .btn-yellow {
            background: linear-gradient(135deg, var(--secondary-yellow) 0%, var(--secondary-yellow-dark) 100%);
        }
        
        .btn-yellow:hover {
            background: linear-gradient(135deg, var(--secondary-yellow-light) 0%, var(--secondary-yellow) 100%);
            transform: scale(1.02);
        }
        
        @media (max-width: 1024px) {
            .animated-bg::before {
                display: none;
            }
            
            .otp-input {
                letter-spacing: 0.3rem;
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- Left Section - Logo & Branding with Blue Theme (Dynamic based on type) -->
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
                
                <!-- Tagline - Dynamic based on type -->
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
                
                <!-- Job/Employer Categories - Dynamic based on type -->
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
        
        <!-- Right Section - OTP Verification Form (Dynamic based on type) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 sm:p-8 lg:p-16 bg-gradient-to-br from-gray-50 to-white">
            <div class="w-full max-w-md">
                <!-- Welcome Card -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-key text-yellow-400 text-3xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ ucfirst($type) }} Verification</h2>
                    <p class="text-gray-500 text-sm mt-2">Enter the verification code sent to your mobile</p>
                </div>
                
                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8 border-t-4 border-yellow-500">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-mobile-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">OTP Verification</h3>
                        <p class="text-xs text-gray-500 mt-1">
                            We've sent a 6-digit code to 
                            <span class="font-semibold text-yellow-600">+91 {{ session('auth_mobile') }}</span>
                        </p>
                    </div>
                    
                    <!-- OTP Form - Dynamic route -->
<form id="otpForm" action="{{ route('auth.verify.otp', ['type' => $type]) }}" method="POST" class="space-y-5">
                            @csrf
                        
                        <!-- OTP Input -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2 text-center">
                                Enter OTP Code
                            </label>
                            <input type="text" 
                                   name="otp_code" 
                                   id="otp_code"
                                   maxlength="6"
                                   pattern="[0-9]{6}"
                                   placeholder="000000"
                                   class="otp-input w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition-all text-center text-2xl sm:text-3xl font-bold tracking-widest"
                                   autocomplete="off"
                                   required>
                            <div class="flex items-center justify-between mt-2">
                                <p class="text-xs text-gray-500">
                                    <i class="fas fa-lock mr-1 text-green-600"></i> Secure Verification
                                </p>
                                <p class="text-xs text-yellow-600 font-semibold">
                                    <i class="fas fa-clock mr-1"></i> OTP expires in 5 mins
                                </p>
                            </div>
                        </div>
                        
                        <!-- Error Display -->
                        @if($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                            @foreach($errors->all() as $error)
                                <p class="text-red-600 text-sm text-center">{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
                        
                        @if(session('success'))
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                            <p class="text-green-600 text-sm text-center">{{ session('success') }}</p>
                        </div>
                        @endif
                        
                        <!-- Verify Button - Yellow Theme -->
                        <button type="submit" 
                                id="verifyBtn"
                                class="btn-yellow w-full text-white py-3.5 rounded-xl font-semibold transition-all transform hover:scale-[1.02] shadow-lg disabled:opacity-50 disabled:cursor-not-allowed text-base flex items-center justify-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            <span>Verify & {{ $type === 'employee' ? 'Login' : 'Register' }}</span>
                        </button>
                    </form>
                    
                    <!-- Resend Section -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600 mb-2">Didn't receive the code?</p>
<form action="{{ route('auth.resend.otp', ['type' => $type]) }}" method="POST" id="resendForm" class="inline">                                  @csrf
                            <button type="submit" 
                                    id="resendOtpBtn"
                                    class="text-yellow-600 font-semibold text-sm hover:underline disabled:opacity-50 disabled:cursor-not-allowed">
                                Resend OTP
                            </button>
                        </form>
                        <div id="timer" class="text-xs text-gray-500 mt-2"></div>
                    </div>
                    
                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-xs">
                            <span class="px-3 bg-white text-gray-500">Need help?</span>
                        </div>
                    </div>
                    
                    <!-- Change Number Link - Dynamic route -->
                    <div class="text-center">
<a href="{{ route('auth.mobile.form', ['type' => $type]) }}" class="text-gray-500 text-sm hover:text-yellow-600 transition inline-flex items-center gap-1">                            <i class="fas fa-arrow-left"></i>
                            <span>Use different mobile number</span>
                        </a>
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
                
                <!-- Security Badge -->
                <div class="mt-4 text-center">
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-shield-alt mr-1 text-green-600"></i> 
                        100% Secure & Verified Platform
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Auto-focus on OTP input
            $('#otp_code').focus();
            
            // Format OTP input - only numbers
            $('#otp_code').on('input', function() {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
                
                // Auto-submit when 6 digits are entered
                if ($(this).val().length === 6) {
                    $('#otpForm').submit();
                }
            });
            
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
            
            // Handle form submission loading state
            $('#otpForm').on('submit', function() {
                const verifyBtn = $('#verifyBtn');
                verifyBtn.html('<div class="loading-spinner mr-2"></div><span>Verifying...</span>');
                verifyBtn.prop('disabled', true);
            });
            
            // Handle resend OTP
            $('#resendForm').on('submit', function(e) {
                e.preventDefault();
                
                const resendBtn = $('#resendOtpBtn');
                resendBtn.html('<div class="loading-spinner mr-1"></div><span>Sending...</span>');
                resendBtn.prop('disabled', true);
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            showNotification('OTP resent successfully!', 'success');
                            startTimer(60);
                            $('#otp_code').val('').focus();
                        } else {
                            showNotification(response.message || 'Error resending OTP', 'error');
                            resendBtn.html('Resend OTP');
                            resendBtn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        const message = xhr.responseJSON?.message || 'Error resending OTP. Please try again.';
                        showNotification(message, 'error');
                        resendBtn.html('Resend OTP');
                        resendBtn.prop('disabled', false);
                    }
                });
            });
            
            // Timer function for resend OTP
            function startTimer(seconds) {
                let remaining = seconds;
                $('#resendOtpBtn').prop('disabled', true);
                $('#timer').text(`Resend OTP in ${remaining}s`);
                
                const interval = setInterval(function() {
                    remaining--;
                    $('#timer').text(`Resend OTP in ${remaining}s`);
                    
                    if (remaining <= 0) {
                        clearInterval(interval);
                        $('#resendOtpBtn').prop('disabled', false);
                        $('#timer').text('');
                    }
                }, 1000);
            }
            
            // Start timer if coming from send OTP
            @if(session('success'))
                startTimer(60);
            @endif
            
            // Category click handlers
            $('.grid > div').on('click', function() {
                const category = $(this).find('p:first').text();
                showNotification(`Exploring ${category}...`, 'info');
            });
        });
    </script>
</body>
</html>
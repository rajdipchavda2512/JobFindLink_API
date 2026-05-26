<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JobFindLink - Connecting Talent. Building Futures. | India's #1 Manpower Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* JobFindLink Color Scheme */
        :root {
            --primary-deepblue: #0a2540;
            --primary-blue: #1e3a8a;
            --primary-blue-light: #2563eb;
            --primary-blue-dark: #172554;
            --secondary-gold: #f5a623;
            --secondary-gold-light: #f7b84d;
            --secondary-gold-dark: #e09110;
            --accent-yellow: #ffc107;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-deepblue) 0%, var(--primary-blue-dark) 100%);
        }
        
        .gradient-gold {
            background: linear-gradient(135deg, var(--secondary-gold) 0%, var(--secondary-gold-dark) 100%);
        }
        
        .service-card, .step-card {
            transition: all 0.3s ease;
        }
        
        .service-card:hover, .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        @keyframes live-pulse {
            0% { opacity: 1; transform: scale(1); background-color: #dc2626; }
            50% { opacity: 0.85; transform: scale(1.05); background-color: #ef4444; box-shadow: 0 0 8px rgba(220,38,38,0.6); }
            100% { opacity: 1; transform: scale(1); background-color: #dc2626; }
        }
        
        .live-badge-header {
            animation: live-pulse 1.2s ease-in-out infinite;
        }
        
        .hero-light-bg {
            background: linear-gradient(135deg, #fef9e7 0%, #fcf3cf 50%, #fff5e6 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg-image {
            background-image: url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1974&auto=format');
            background-size: cover;
            background-position: center;
            opacity: 0.05;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
        }
        
        .animate-float-slow {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.03); }
        }
        
        .glow-effect {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f3f5; }
        ::-webkit-scrollbar-thumb { background: var(--primary-deepblue); border-radius: 4px; }
        
        /* APP DOWNLOAD SECTION BACKGROUND */
        .app-download-section {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f8fafc 0%, #fff7e6 100%);
        }

        .app-download-section::before {
            content: '';
            position: absolute;
            width: 700px;
            height: 700px;
            background: rgba(245, 166, 35, 0.10);
            border-radius: 50%;
            top: -300px;
            left: -200px;
        }

        .app-download-section::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(10, 37, 64, 0.06);
            border-radius: 50%;
            bottom: -220px;
            right: -150px;
        }

        .app-card-bg {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.4);
        }

        .qr-card {
            background: linear-gradient(135deg, var(--primary-deepblue) 0%, var(--primary-blue) 100%);
            box-shadow: 0 20px 40px rgba(10,37,64,0.25);
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            animation: floatCircle 6s ease-in-out infinite;
        }

        .circle-gold {
            width: 70px;
            height: 70px;
            background: rgba(245,166,35,0.15);
            top: 20%;
            right: 15%;
        }

        .circle-blue {
            width: 50px;
            height: 50px;
            background: rgba(30,58,138,0.12);
            bottom: 15%;
            left: 10%;
        }

        @keyframes floatCircle {
            0%,100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        .jobfindlink-logo-text {
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        
        .btn-gold-custom {
            background: linear-gradient(135deg, #f5a623 0%, #e09110 100%);
            transition: all 0.2s ease;
        }
        
        .btn-gold-custom:hover {
            background: linear-gradient(135deg, #e09110 0%, #c97d0a 100%);
            transform: translateY(-1px);
        }

        /* Logo container styles */
        .logo-img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }
    </style>
</head>
<body class="bg-white antialiased">

    <!-- ==================== HEADER - DYNAMIC LOGO & LINKS ==================== -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 md:h-24">
                <!-- DYNAMIC LOGO SECTION -->
                <div class="flex items-center space-x-3">
                    <!-- Logo Image - Dynamic Path (Replace with your actual logo path) -->
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl flex items-center justify-center overflow-hidden bg-[#0a2540]">
                        <img 
                            src="{{ asset('storage/images/logo2.png') }}" 
                            alt="JobFindLink Logo" 
                            class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<i data-lucide=\'briefcase\' class=\'w-6 h-6 md:w-7 md:h-7 text-[#f5a623]\'></i>'; lucide.createIcons();"
                        >
                    </div>
                    <!-- Text Logo Fallback -->
                    <span class="text-xl md:text-2xl font-extrabold tracking-tight jobfindlink-logo-text">
                        <span class="text-[#0a2540]">Job</span><span class="text-[#f5a623]">Find</span><span class="text-[#0a2540]">Link</span>
                    </span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-[#f5a623] font-semibold transition">Home</a>
                    <a href="{{ url('/about') }}" class="text-gray-700 hover:text-[#f5a623] font-semibold transition">About</a>
                    <a href="{{ url('/services') }}" class="text-gray-700 hover:text-[#f5a623] font-semibold transition">Services</a>
                    <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-[#f5a623] font-semibold transition">Contact</a>
                </div>

                <!-- DYNAMIC LOGIN BUTTONS - Routes configurable -->
                <div class="hidden md:flex space-x-3">
                    <!-- Employee Login - Dynamic Route -->
                    <a href="{{ route('auth.mobile.form', ['type' => 'employee']) }}" 
                       class="px-5 py-2 border-2 border-[#0a2540] text-[#0a2540] font-semibold rounded-lg hover:bg-[#0a2540] hover:text-white transition">
                        Employee Login
                    </a>
                    <!-- Employer Login - Dynamic Route -->
                    <a href="{{ route('auth.mobile.form', ['type' => 'employer']) }}" 
                       class="px-5 py-2 bg-[#f5a623] text-[#0a2540] font-semibold rounded-lg hover:bg-[#e09110] transition shadow-md">
                        Employer Login
                    </a>
                </div>
                
                <button class="md:hidden text-gray-600 focus:outline-none" id="mobileMenuBtn">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu Panel - Dynamic Links -->
        <div id="mobileMenuPanel" class="md:hidden bg-white border-t border-gray-100 py-4 px-4 hidden">
            <div class="flex flex-col space-y-3">
                <a href="{{ url('/') }}" class="text-gray-700 font-semibold py-2">Home</a>
                <a href="{{ url('/about') }}" class="text-gray-700 font-semibold py-2">About</a>
                <a href="{{ url('/services') }}" class="text-gray-700 font-semibold py-2">Services</a>
                <a href="{{ url('/contact') }}" class="text-gray-700 font-semibold py-2">Contact</a>
                <hr>
                <a href="{{ route('auth.mobile.form', ['type' => 'employee']) }}" class="px-4 py-2 border-2 border-[#0a2540] text-[#0a2540] font-semibold rounded-lg text-center">Employee Login</a>
                <a href="{{ route('auth.mobile.form', ['type' => 'employer']) }}" class="px-4 py-2 bg-[#f5a623] text-[#0a2540] font-semibold rounded-lg text-center">Employer Login</a>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-light-bg relative overflow-hidden">
        <div class="hero-bg-image"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-[#f5a623]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#0a2540]/5 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14">
            
            <div class="text-center mb-6">
                <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-medium text-gray-700">📍 10,000+ Jobs Added This Week</span>
                </div>
                <div class="flex flex-wrap justify-center gap-3 mt-3">
                    <span class="inline-flex items-center gap-1 text-xs bg-white/60 backdrop-blur-sm px-3 py-1.5 rounded-full text-gray-600"><i class="fas fa-check-circle text-green-500 text-xs"></i> 500+ Top Companies</span>
                    <span class="inline-flex items-center gap-1 text-xs bg-white/60 backdrop-blur-sm px-3 py-1.5 rounded-full text-gray-600"><i class="fas fa-check-circle text-green-500 text-xs"></i> 98% Satisfaction Rate</span>
                    <span class="inline-flex items-center gap-1 text-xs bg-white/60 backdrop-blur-sm px-3 py-1.5 rounded-full text-gray-600"><i class="fas fa-check-circle text-green-500 text-xs"></i> Free Job Alerts</span>
                </div>
            </div>
            
            <!-- Search Bar -->
            <div class="max-w-4xl mx-auto mb-6">
                <div class="bg-white rounded-2xl shadow-2xl p-4 md:p-5 border border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                        <div class="md:col-span-5 relative">
                            <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                            <input type="text" id="keywordInput" placeholder="Job title, skills, or company" class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#f5a623] outline-none">
                        </div>
                        <div class="md:col-span-3 relative">
                            <i data-lucide="briefcase" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                            <select id="expSelect" class="w-full pl-12 pr-10 py-3.5 bg-gray-50 border border-gray-200 rounded-xl appearance-none focus:ring-2 focus:ring-[#f5a623] outline-none">
                                <option value="">Experience</option>
                                <option>Fresher</option>
                                <option>1-3 years</option>
                                <option>3-5 years</option>
                                <option>5-10 years</option>
                                <option>10+ years</option>
                            </select>
                            <i data-lucide="chevron-down" class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                        </div>
                        <div class="md:col-span-3 relative">
                            <i data-lucide="map-pin" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                            <input type="text" id="locationInput" placeholder="Location" class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#f5a623] outline-none">
                        </div>
                        <div class="md:col-span-1">
                            <button id="searchBtn" class="w-full h-full min-h-[52px] btn-gold-custom text-[#0a2540] font-bold rounded-xl flex items-center justify-center gap-2 shadow-md transition">
                                <i data-lucide="search" class="w-5 h-5"></i>
                                <span class="hidden sm:inline">Search</span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-700 font-medium">Walkin drives near you - register now</span>
                            <span class="live-badge-header inline-flex items-center gap-1.5 bg-red-600 text-white text-xs px-2.5 py-1 rounded-full font-bold shadow-sm">
                                <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span></span>
                                Live
                            </span>
                        </div>
                        <a href="{{ url('/walkin-drives') }}" class="text-[#0a2540] text-sm font-semibold hover:underline flex items-center gap-1">Know More <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image -->
            <div class="flex justify-center items-center mt-4">
                <div class="relative max-w-3xl mx-auto">
                    <div class="absolute -top-16 -left-16 w-48 h-48 bg-[#f5a623]/20 rounded-full blur-2xl glow-effect"></div>
                    <div class="absolute -bottom-16 -right-16 w-48 h-48 bg-[#0a2540]/10 rounded-full blur-2xl glow-effect" style="animation-delay: 1s;"></div>
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/img_heroSection-I5mcGOdsIlm2n65dn1ZcaUdMrHQuIf.webp" 
                         alt="JobFindLink Hero" 
                         class="relative z-10 w-full h-auto max-h-[280px] object-contain drop-shadow-xl animate-float-slow"
                         style="filter: drop-shadow(0 20px 25px rgba(0,0,0,0.15));">
                </div>
            </div>
            
            <div class="flex flex-wrap justify-center gap-6 mt-6">
                <div class="text-center"><div class="text-xl font-bold text-[#0a2540]">500+</div><div class="text-xs text-gray-500">Active Employers</div></div>
                <div class="w-px h-8 bg-gray-300"></div>
                <div class="text-center"><div class="text-xl font-bold text-[#0a2540]">10K+</div><div class="text-xs text-gray-500">Happy Candidates</div></div>
                <div class="w-px h-8 bg-gray-300"></div>
                <div class="text-center"><div class="text-xl font-bold text-[#0a2540]">15K+</div><div class="text-xs text-gray-500">Jobs Placed</div></div>
                <div class="w-px h-8 bg-gray-300"></div>
                <div class="text-center"><div class="text-xl font-bold text-[#0a2540]">98%</div><div class="text-xs text-gray-500">Satisfaction</div></div>
            </div>
        </div>
    </section>

    <!-- ==================== JOBFINDLINK BRAND CARD ==================== -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div class="order-2 md:order-1">
                    <div class="bg-gradient-to-br from-blue-50 to-amber-50 rounded-2xl p-8 shadow-xl border border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-[#0a2540] rounded-xl flex items-center justify-center">
                                <i data-lucide="users" class="w-6 h-6 text-[#f5a623]"></i>
                            </div>
                            <span class="text-2xl font-bold text-[#0a2540]">JobFindLink</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-6">
                            <div class="bg-white rounded-xl p-4 text-center shadow-sm"><i data-lucide="briefcase" class="w-8 h-8 mx-auto text-[#f5a623] mb-2"></i><p class="font-bold text-gray-800">RECRUITMENT</p></div>
                            <div class="bg-white rounded-xl p-4 text-center shadow-sm"><i data-lucide="clock" class="w-8 h-8 mx-auto text-[#f5a623] mb-2"></i><p class="font-bold text-gray-800">STAFFING</p></div>
                            <div class="bg-white rounded-xl p-4 text-center shadow-sm"><i data-lucide="graduation-cap" class="w-8 h-8 mx-auto text-[#f5a623] mb-2"></i><p class="font-bold text-gray-800">TRAINING</p></div>
                            <div class="bg-white rounded-xl p-4 text-center shadow-sm"><i data-lucide="trending-up" class="w-8 h-8 mx-auto text-[#f5a623] mb-2"></i><p class="font-bold text-gray-800">DEVELOPMENT</p></div>
                        </div>
                        <div class="mt-6 text-center"><p class="text-gray-600 font-medium">RECRUITMENT | HR STRATEGY | WORKFORCE PLANNING</p></div>
                        <div class="mt-4 text-center"><p class="text-2xl font-bold text-[#f5a623]">JobFindLink</p><p class="text-sm text-gray-500">Connecting Talent. Building Futures.</p></div>
                    </div>
                </div>
                <div class="order-1 md:order-2 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#0a2540] mb-4">Connecting Talent. Building Futures.</h2>
                    <p class="text-gray-600 mb-6">We provide end-to-end manpower solutions tailored to your business needs.</p>
                    <div class="flex flex-wrap gap-3 justify-center">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Skilled Talent</span>
                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm">Flexible Staffing</span>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Timely Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== OUR SERVICES SECTION ==================== -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12"><h2 class="text-3xl md:text-4xl font-bold text-[#0a2540] mb-2">OUR SERVICES</h2><p class="text-gray-600">Comprehensive solutions for all your manpower needs</p></div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center service-card border border-gray-100">
                    <div class="w-16 h-16 bg-[#0a2540]/10 rounded-full flex items-center justify-center mx-auto mb-4"><i data-lucide="target" class="w-8 h-8 text-[#0a2540]"></i></div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">RECRUITMENT</h3>
                    <p class="text-gray-600">End-to-end recruitment solutions for permanent and contract positions.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center service-card border border-gray-100">
                    <div class="w-16 h-16 bg-[#f5a623]/10 rounded-full flex items-center justify-center mx-auto mb-4"><i data-lucide="users" class="w-8 h-8 text-[#f5a623]"></i></div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">STAFFING</h3>
                    <p class="text-gray-600">Temporary, permanent, and contract staffing for all industries.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center service-card border border-gray-100">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"><i data-lucide="graduation-cap" class="w-8 h-8 text-green-600"></i></div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">TRAINING</h3>
                    <p class="text-gray-600">Skill development and corporate training programs.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center service-card border border-gray-100">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4"><i data-lucide="bar-chart-2" class="w-8 h-8 text-purple-600"></i></div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">DEVELOPMENT</h3>
                    <p class="text-gray-600">Career development and leadership programs.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center service-card border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><i data-lucide="credit-card" class="w-8 h-8 text-orange-600"></i></div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">PAYROLL SUPPORT</h3>
                    <p class="text-gray-600">Comprehensive payroll management solutions.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center service-card border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4"><i data-lucide="layout" class="w-8 h-8 text-red-600"></i></div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">WORKFORCE PLANNING</h3>
                    <p class="text-gray-600">Strategic workforce planning and analytics.</p>
                </div>
            </div>
            <div class="mt-10 text-center"><div class="inline-flex items-center gap-2 bg-amber-50 px-6 py-3 rounded-full"><span class="text-amber-600 text-sm font-semibold">★★★★★</span><span class="text-gray-700">Trusted by 500+ companies across India</span></div></div>
        </div>
    </section>

    <!-- ==================== APP DOWNLOAD SECTION ==================== -->
    <section class="py-16 app-download-section">
        <div class="floating-circle circle-gold"></div>
        <div class="floating-circle circle-blue"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="app-card-bg rounded-[32px] shadow-2xl p-8 md:p-12 relative z-10">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-[#0a2540] text-white px-5 py-2 rounded-full text-sm font-semibold mb-6">
                            <i data-lucide="smartphone"></i>
                            DOWNLOAD APP
                        </div>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-[#0a2540] leading-tight mb-4">
                            Get the JobFindLink App
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Find jobs, hire manpower and connect with top companies instantly.
                        </p>
                        <div class="flex flex-wrap items-center gap-8 mb-8">
                            <div><h3 class="text-3xl font-bold text-[#0a2540]">4.8★</h3><p class="text-sm text-gray-500">App Rating</p></div>
                            <div class="w-px h-12 bg-gray-300"></div>
                            <div><h3 class="text-3xl font-bold text-[#0a2540]">100K+</h3><p class="text-sm text-gray-500">Downloads</p></div>
                        </div>
                        <a href="{{ url('/download-app') }}" class="inline-flex items-center gap-2 btn-gold-custom text-[#0a2540] px-7 py-4 rounded-xl font-bold shadow-lg transition">
                            Download Now
                            <i data-lucide="arrow-right"></i>
                        </a>
                    </div>
                    <div class="flex justify-center">
                        <div class="qr-card rounded-[32px] p-6 relative">
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#e09110] text-white text-xs px-5 py-2 rounded-full font-bold shadow-md">
                                SCAN & DOWNLOAD
                            </div>
                            <div class="bg-white rounded-2xl p-5 shadow-inner">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=https://jobfindlink.com"
                                     class="w-56 h-56 object-contain"
                                     alt="QR Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== WALKIN DRIVES SECTION ==================== -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#0a2540] mb-4">Building Stronger Teams for a Better Tomorrow</h2>
                    <p class="text-gray-600 mb-6">We believe in creating lasting partnerships that drive growth and success for both employers and job seekers.</p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3"><div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center"><i data-lucide="check-circle" class="w-5 h-5 text-blue-600"></i></div><div><p class="font-semibold">Quality You Trust</p><p class="text-sm text-gray-500">Rigorous screening and verification process</p></div></div>
                        <div class="flex items-center gap-3"><div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center"><i data-lucide="check-circle" class="w-5 h-5 text-green-600"></i></div><div><p class="font-semibold">Results You Deserve</p><p class="text-sm text-gray-500">Proven track record of successful placements</p></div></div>
                        <div class="flex items-center gap-3"><div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center"><i data-lucide="check-circle" class="w-5 h-5 text-amber-600"></i></div><div><p class="font-semibold">People, Process, Progress</p><p class="text-sm text-gray-500">Holistic approach to workforce management</p></div></div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-blue-50 to-amber-50 rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-4"><div class="inline-flex items-center gap-2 bg-red-100 px-4 py-2 rounded-full"><span class="live-badge-header inline-flex items-center gap-1.5 bg-red-600 text-white text-xs px-2 py-0.5 rounded-full font-bold">LIVE</span><span class="text-sm font-semibold text-gray-700">YES BANK & HCLTech are Hiring</span></div></div>
                    <h3 class="text-2xl font-bold text-center text-[#0a2540] mb-2">WALK IN. GET HIRED.</h3>
                    <p class="text-center text-gray-600 mb-4">Opportunities for Freshers & Graduates</p>
                    <div class="flex justify-center mb-4">
                        <a href="{{ url('/walkin-drives') }}" class="bg-[#0a2540] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#1a3a5c] transition">Explore Walk-In Drives <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="bg-white rounded-xl p-3 text-center"><div class="text-2xl font-bold text-[#f5a623]">Walk-In Drives</div><div class="text-sm text-gray-600">12 Cities</div></div>
                        <div class="bg-white rounded-xl p-3 text-center"><div class="text-2xl font-bold text-[#f5a623]">500+</div><div class="text-sm text-gray-600">Openings</div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== WHY CHOOSE US ==================== -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12"><h2 class="text-3xl md:text-4xl font-bold text-[#0a2540] mb-2">Why Choose Us</h2><p class="text-gray-600">Committed to excellence in manpower solutions</p></div>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-white rounded-xl shadow-md"><div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3"><i data-lucide="users" class="w-7 h-7 text-[#0a2540]"></i></div><h3 class="font-bold text-gray-800">People First</h3><p class="text-sm text-gray-500">Candidate-centric approach</p></div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md"><div class="w-14 h-14 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3"><i data-lucide="target" class="w-7 h-7 text-[#f5a623]"></i></div><h3 class="font-bold text-gray-800">Process Driven</h3><p class="text-sm text-gray-500">Streamlined recruitment</p></div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md"><div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3"><i data-lucide="trending-up" class="w-7 h-7 text-green-600"></i></div><h3 class="font-bold text-gray-800">Progress Focused</h3><p class="text-sm text-gray-500">Continuous improvement</p></div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md"><div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3"><i data-lucide="handshake" class="w-7 h-7 text-purple-600"></i></div><h3 class="font-bold text-gray-800">Partnership</h3><p class="text-sm text-gray-500">Long-term relationships</p></div>
            </div>
        </div>
    </section>

    <!-- ==================== TRUSTED COMPANIES ==================== -->
    <div class="bg-white border-b border-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-xs sm:text-sm uppercase tracking-[0.2em] font-bold mb-6">TRUSTED BY LEADING ENTERPRISES</p>
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12 lg:gap-16">
                <span class="text-gray-700 font-bold text-base md:text-xl cursor-pointer hover:text-[#f5a623] transition">Capgemini</span>
                <span class="text-gray-700 font-bold text-base md:text-xl cursor-pointer hover:text-[#f5a623] transition">genpact</span>
                <span class="text-gray-700 font-bold text-base md:text-xl cursor-pointer hover:text-[#f5a623] transition">Kotak</span>
                <span class="text-gray-700 font-bold text-base md:text-xl cursor-pointer hover:text-[#f5a623] transition">ICICI Bank</span>
                <span class="text-gray-700 font-bold text-base md:text-xl cursor-pointer hover:text-[#f5a623] transition">HCLTech</span>
                <span class="text-gray-700 font-bold text-base md:text-xl cursor-pointer hover:text-[#f5a623] transition">Tech Mahindra</span>
            </div>
        </div>
    </div>

    <!-- ==================== FOOTER - DYNAMIC ==================== -->
    <footer class="bg-[#0a1a2f] text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-[#f5a623] rounded-lg flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('storage/images/logo2.png') }}" alt="JobFindLink Logo" class="w-full h-full object-cover" onerror="this.onerror=null; this.parentElement.innerHTML='<i data-lucide=\'briefcase\' class=\'w-5 h-5 text-[#0a2540]\'></i>'; lucide.createIcons();">
                        </div>
                        <span class="text-xl font-bold">
                            <span class="text-white">Job</span><span class="text-[#f5a623]">Find</span><span class="text-white">Link</span>
                        </span>
                    </div>
                    <p class="text-gray-400 text-sm">Connecting Talent. Building Futures. Right People. Right Place.</p>
                </div>
                <div><h4 class="font-semibold mb-4">Quick Links</h4><ul class="space-y-2 text-sm text-gray-400"><li><a href="{{ url('/about') }}" class="hover:text-[#f5a623] transition">About Us</a></li><li><a href="{{ url('/contact') }}" class="hover:text-[#f5a623] transition">Contact Us</a></li><li><a href="{{ url('/privacy') }}" class="hover:text-[#f5a623] transition">Privacy Policy</a></li></ul></div>
                <div><h4 class="font-semibold mb-4">For Candidates</h4><ul class="space-y-2 text-sm text-gray-400"><li><a href="{{ url('/jobs') }}" class="hover:text-[#f5a623] transition">Browse Jobs</a></li><li><a href="{{ url('/create-resume') }}" class="hover:text-[#f5a623] transition">Create Resume</a></li><li><a href="{{ url('/job-alerts') }}" class="hover:text-[#f5a623] transition">Job Alerts</a></li></ul></div>
                <div><h4 class="font-semibold mb-4">For Employers</h4><ul class="space-y-2 text-sm text-gray-400"><li><a href="{{ url('/post-job') }}" class="hover:text-[#f5a623] transition">Post a Job</a></li><li><a href="{{ url('/search-resume') }}" class="hover:text-[#f5a623] transition">Search Resume</a></li><li><a href="{{ url('/recruitment-solutions') }}" class="hover:text-[#f5a623] transition">Recruitment Solutions</a></li></ul></div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-400">
                <p>&copy; 2025 JobFindLink. All rights reserved. Connecting Talent. Building Futures.</p>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        const menuBtn = document.getElementById('mobileMenuBtn');
        const mobilePanel = document.getElementById('mobileMenuPanel');
        if(menuBtn && mobilePanel) menuBtn.addEventListener('click',()=>{ mobilePanel.classList.toggle('hidden'); setTimeout(()=>lucide.createIcons(),50); });
        document.getElementById('searchBtn')?.addEventListener('click',()=>{ const kw = document.getElementById('keywordInput')?.value || 'Any'; alert(`JobFindLink: Searching for "${kw}" jobs... Let's find your perfect match!`); });
    </script>
</body>
</html>
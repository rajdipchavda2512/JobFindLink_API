{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JobFindLink - Connecting Talent. Building Futures. | India's #1 Manpower Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* Theme Colors */
        :root {
            --primary-blue: #1e3a8a;
            --primary-blue-light: #2563eb;
            --primary-blue-dark: #172554;
            --secondary-yellow: #f59e0b;
            --secondary-yellow-light: #fbbf24;
            --secondary-yellow-dark: #d97706;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%);
        }
        
        .gradient-yellow {
            background: linear-gradient(135deg, var(--secondary-yellow) 0%, var(--secondary-yellow-dark) 100%);
        }
        
        .service-card {
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .step-card {
            transition: all 0.3s ease;
        }
        
        .step-card:hover {
            transform: translateY(-5px);
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .counter {
            animation: countUp 2s ease-out;
        }
        
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .service-card, .step-card {
                margin-bottom: 1rem;
            }
        }
        
        /* Prevent image from causing infinite reload */
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="bg-white">
    
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <!-- Logo Section -->
                <div class="flex items-center space-x-3">
                    <div class="w-24 h-20 flex items-center justify-center overflow-hidden">
                        <img 
                            src="{{ asset('storage/images/logo2.png') }}"
                            alt="JobFindLink Logo"
                            class="w-24 h-24 object-contain scale-125 transition duration-300"
                            onerror="this.onerror=null; this.src='https://placehold.co/100x100/1e3a8a/ffffff?text=JFL'"
                        >
                    </div>
                    <span class="text-2xl font-bold text-gray-800">
                        Job<span class="text-yellow-500">Find</span>Link
                    </span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-yellow-500 transition">Home</a>
                    <a href="#" class="text-gray-700 hover:text-yellow-500 transition">About</a>
                    <a href="#" class="text-gray-700 hover:text-yellow-500 transition">Services</a>
                    <a href="#" class="text-gray-700 hover:text-yellow-500 transition">Contact</a>
                </div>

                <!-- Buttons -->
                <div class="hidden md:flex space-x-3">
                    <a href="{{ route('auth.mobile.form', ['type' => 'employee']) }}"
                       class="px-4 py-2 border border-yellow-500 text-yellow-600 rounded-lg hover:bg-yellow-500 hover:text-white transition">
                        Employee Login
                    </a>
                    <a href="{{ route('auth.mobile.form', ['type' => 'employer']) }}"
                       class="px-4 py-2 gradient-bg text-white rounded-lg hover:shadow-lg transition">
                        Employer Login
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-600 focus:outline-none" id="mobileMenuBtn">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-50 to-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 leading-tight">
                        Connecting Talent.
                        <span class="text-yellow-500">Building Futures.</span>
                    </h1>
                    <p class="text-lg text-gray-600 mt-4 leading-relaxed">
                        We provide the right manpower solutions to help businesses grow and candidates build successful careers.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-8 justify-center lg:justify-start">
                        <a href="#" class="gradient-yellow text-gray-900 px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition text-center">
                            Find a Job <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="border-2 border-blue-600 text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition text-center">
                            Hire Talent <i class="fas fa-users ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-yellow-400 rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
                        <!-- FIXED: Removed onerror that causes infinite loop -->
                       
                        <div class="fallback-message text-center text-gray-400" style="display: none;">
                            <i class="fas fa-briefcase text-6xl mb-4"></i>
                            <p>JobFindLink - Your Career Partner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="gradient-bg text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold counter">10K+</div>
                    <p class="text-sm opacity-90 mt-2">Happy Candidates</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold counter">500+</div>
                    <p class="text-sm opacity-90 mt-2">Active Employers</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold counter">15K+</div>
                    <p class="text-sm opacity-90 mt-2">Jobs Placed</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold counter">25+</div>
                    <p class="text-sm opacity-90 mt-2">Industries Served</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-yellow-600 font-semibold uppercase tracking-wide">— OUR SERVICES —</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Comprehensive Manpower Solutions</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">We offer a wide range of staffing solutions tailored to meet your business needs.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Service 1 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl">
                    <div class="w-14 h-14 gradient-bg rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Temporary Staffing</h3>
                    <p class="text-gray-600">Flexible staffing solutions to meet short-term business demands.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl">
                    <div class="w-14 h-14 gradient-bg rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-user-check text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Permanent Placement</h3>
                    <p class="text-gray-600">Find the perfect permanent employees for your organization.</p>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl">
                    <div class="w-14 h-14 gradient-bg rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-signature text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Contract Staffing</h3>
                    <p class="text-gray-600">Skilled professionals on contract to drive your projects forward.</p>
                </div>
                
                <!-- Service 4 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl">
                    <div class="w-14 h-14 gradient-bg rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-industry text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Industry Solutions</h3>
                    <p class="text-gray-600">Specialized staffing solutions for diverse industries and sectors.</p>
                </div>
                
                <!-- Service 5 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl md:col-span-2 lg:col-span-1">
                    <div class="w-14 h-14 gradient-bg rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-globe text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Overseas Recruitment</h3>
                    <p class="text-gray-600">Global talent acquisition to meet your international workforce needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg text-white py-16">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Looking for the right opportunity?</h2>
            <p class="text-lg opacity-95 mb-8">Thousands of jobs are waiting for you. Apply now and take the next step in your career.</p>
            <a href="#" class="inline-flex items-center gap-2 bg-yellow-500 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition shadow-lg">
                Browse Jobs <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-yellow-600 font-semibold uppercase tracking-wide">— HOW IT WORKS —</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Simple Steps to Get Started</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">A seamless process to connect the right talent with the right opportunities.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="step-card text-center">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <span class="text-yellow-400 text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Register</h3>
                    <p class="text-gray-600 text-sm">Create your profile as a candidate or employer.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="step-card text-center">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <span class="text-yellow-400 text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Search</h3>
                    <p class="text-gray-600 text-sm">Find the right job or candidates that match your needs.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="step-card text-center">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <span class="text-yellow-400 text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Connect</h3>
                    <p class="text-gray-600 text-sm">Get connected and communicate easily.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="step-card text-center">
                    <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <span class="text-yellow-400 text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Get Hired</h3>
                    <p class="text-gray-600 text-sm">Make the perfect hire or land your dream job.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-24 h-20 flex items-center justify-center overflow-hidden">
                            <img 
                                src="{{ asset('storage/images/logo2.png') }}"
                                alt="JobFindLink Logo"
                                class="w-24 h-24 object-contain scale-125 transition duration-300"
                                onerror="this.onerror=null; this.src='https://placehold.co/100x100/1e3a8a/ffffff?text=JFL'"
                            >
                        </div>
                        <span class="text-xl font-bold">Job<span class="text-yellow-500">Find</span>Link</span>
                    </div>
                    <p class="text-gray-400 text-sm">Connecting talent with opportunities across India.</p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-yellow-500 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Contact Us</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">For Candidates</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-yellow-500 transition">Browse Jobs</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Create Resume</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Job Alerts</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Career Advice</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">For Employers</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-yellow-500 transition">Post a Job</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Search Resume</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Pricing Plans</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition">Recruitment Solutions</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-400">
                <p>&copy; 2024 JobFindLink. All rights reserved. Connecting Talent. Building Futures.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                // Create mobile menu if it doesn't exist
                let mobileMenu = document.getElementById('mobileMenu');
                if (!mobileMenu) {
                    mobileMenu = document.createElement('div');
                    mobileMenu.id = 'mobileMenu';
                    mobileMenu.className = 'md:hidden bg-white shadow-lg py-4 px-4';
                    mobileMenu.innerHTML = `
                        <div class="flex flex-col space-y-3">
                            <a href="#" class="text-gray-700 hover:text-yellow-500 transition py-2">Home</a>
                            <a href="#" class="text-gray-700 hover:text-yellow-500 transition py-2">About</a>
                            <a href="#" class="text-gray-700 hover:text-yellow-500 transition py-2">Services</a>
                            <a href="#" class="text-gray-700 hover:text-yellow-500 transition py-2">Contact</a>
                            <hr class="my-2">
                            <a href="{{ route('auth.mobile.form', ['type' => 'employee']) }}" class="px-4 py-2 border border-yellow-500 text-yellow-600 rounded-lg text-center">Employee Login</a>
                            <a href="{{ route('auth.mobile.form', ['type' => 'employer']) }}" class="px-4 py-2 gradient-bg text-white rounded-lg text-center">Employer Login</a>
                        </div>
                    `;
                    mobileMenuBtn.parentElement.parentElement.parentElement.appendChild(mobileMenu);
                }
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Animate counters when they come into view
        const observerOptions = {
            threshold: 0.5,
            rootMargin: "0px"
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'countUp 2s ease-out';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.counter').forEach(counter => {
            observer.observe(counter);
        });
        
        // Fix for any potential infinite loop issues
        window.addEventListener('error', function(e) {
            if (e.target.tagName === 'IMG') {
                console.warn('Image failed to load:', e.target.src);
                e.target.onerror = null;
            }
        }, true);
    </script>
</body>
</html>
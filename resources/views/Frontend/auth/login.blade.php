{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Find Link - India's #1 Job Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
        }
        
        .job-card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        .trending-card {
            transition: all 0.3s ease;
        }
        
        .trending-card:hover {
            transform: translateX(5px);
            background-color: #F3F4F6;
        }
        
        .company-logo {
            transition: all 0.3s ease;
        }
        
        .company-logo:hover {
            transform: scale(1.05);
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            border-color: #2563EB;
        }
        
        .animate-slide-in {
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .role-badge:hover {
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
            color: white;
            transform: scale(1.05);
        }

        /* Header Styles */
        .site-header {
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid #eef2f6;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0.8rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .logo-icon {
            background: linear-gradient(145deg, #0f2b3d, #1a4b6e);
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 5px 10px rgba(0,0,0,0.05);
        }
        .logo-text {
            font-weight: 800;
            font-size: 1.3rem;
            letter-spacing: -0.3px;
            background: linear-gradient(135deg, #1e2f47, #0f2c3f);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .logo-badge {
            font-size: 0.7rem;
            background: #eef2ff;
            padding: 0.2rem 0.5rem;
            border-radius: 30px;
            font-weight: 600;
            color: #2563eb;
            margin-left: 0.2rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            flex-wrap: wrap;
        }
        .nav-btn {
            padding: 0.5rem 1rem;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 40px;
            background: transparent;
            color: #2c3e50;
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            font-family: 'Inter', sans-serif;
        }
        .nav-btn i {
            font-size: 0.9rem;
            color: #5f7f9e;
        }
        .nav-btn:hover {
            background: #f1f5f9;
            color: #0f172a;
        }
        .nav-btn:active {
            transform: scale(0.96);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .login-btn {
            padding: 0.55rem 1.3rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            border: 1px solid #e2e8f0;
            color: #1e293b;
            font-family: 'Inter', sans-serif;
        }
        .login-btn i {
            font-size: 0.85rem;
            color: #4b6a8b;
        }
        .login-employee {
            background: #ffffff;
        }
        .login-employee:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-1px);
        }
        .login-candidate {
            background: #0f172a;
            border-color: #0f172a;
            color: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
        }
        .login-candidate i {
            color: #e2e8f0;
        }
        .login-candidate:hover {
            background: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.08);
        }

        /* User Menu Styles */
        .user-menu {
            position: relative;
            display: inline-block;
        }
        .user-menu-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.5rem 1rem;
            background: #f1f5f9;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .user-menu-btn:hover {
            background: #e2e8f0;
        }
        .user-dropdown {
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 0.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            min-width: 200px;
            display: none;
            z-index: 50;
        }
        .user-menu:hover .user-dropdown {
            display: block;
        }
        .dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #334155;
            transition: background 0.2s;
            text-decoration: none;
        }
        .dropdown-item:hover {
            background: #f1f5f9;
        }
        .dropdown-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 0.25rem 0;
        }

        @media (max-width: 880px) {
            .header-container {
                flex-direction: column;
                align-items: stretch;
                padding: 0.8rem 1.2rem;
            }
            .header-left {
                justify-content: space-between;
                width: 100%;
            }
            .nav-links {
                justify-content: center;
                margin-top: 0.2rem;
                margin-bottom: 0.2rem;
            }
            .header-right {
                justify-content: flex-end;
                width: 100%;
            }
        }
        @media (max-width: 650px) {
            .nav-links {
                gap: 0.2rem;
            }
            .nav-btn {
                padding: 0.4rem 0.7rem;
                font-size: 0.85rem;
            }
            .login-btn {
                padding: 0.45rem 1rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Navigation Header - Dynamic based on auth status -->
    <header class="site-header">
        <div class="header-container">
            <div class="header-left">
                <div class="logo-area">
                    <div class="logo-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <span class="logo-text">Job Find Link</span>
                    <span class="logo-badge">India</span>
                </div>
                
                <div class="nav-links">
                    <button class="nav-btn" id="jobNavBtn">
                        <i class="fas fa-search"></i> Job
                    </button>
                    <button class="nav-btn" id="jobPrepNavBtn">
                        <i class="fas fa-chalkboard-user"></i> Job Prep
                    </button>
                    <button class="nav-btn" id="contactsNavBtn">
                        <i class="fas fa-address-book"></i> Contacts
                    </button>
                    <button class="nav-btn" id="degreeNavBtn">
                        <i class="fas fa-graduation-cap"></i> Degree
                    </button>
                </div>
            </div>

            <div class="header-right">
                @if(Auth::guard('web')->check())
                    <!-- Employer Logged In -->
                    <div class="user-menu">
                        <div class="user-menu-btn">
                            <i class="fas fa-building text-blue-600"></i>
                            <span class="text-sm font-semibold">{{ Auth::guard('web')->user()->full_name ?? 'Employer' }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <div class="user-dropdown">
                            <a href="{{ route('employer.dashboard') }}" class="dropdown-item">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            <a href="{{ route('employer.post.job') }}" class="dropdown-item">
                                <i class="fas fa-plus-circle"></i> Post a Job
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-building"></i> Company Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('employer.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="dropdown-item w-full text-left">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    
                @elseif(Auth::check() && Auth::user()->role === 'employee')
                    <!-- Employee Logged In -->
                    <div class="user-menu">
                        <div class="user-menu-btn">
                            <i class="fas fa-user-circle text-blue-600"></i>
                            <span class="text-sm font-semibold">{{ Auth::user()->full_name ?? 'Employee' }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <div class="user-dropdown">
                            <a href="{{ route('employee.index') }}" class="dropdown-item">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file-alt"></i> My Applications
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-save"></i> Saved Jobs
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-edit"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('employee.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="dropdown-item w-full text-left">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    
                @else
                    <!-- Not Logged In - Show Login Buttons -->
                    <a href="{{ route('auth.mobile.form', 'employee') }}" class="login-btn login-employee">
                        <i class="fas fa-user-circle"></i> Candidate Login
                    </a>
                    <a href="{{ route('auth.mobile.form', 'employer') }}" class="login-btn login-candidate">
                        <i class="fas fa-building"></i> Company Login
                    </a>
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="gradient-bg text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4">INDIA'S #1 JOB PLATFORM</h1>
            <p class="text-2xl mb-2">
                @if(Auth::guard('web')->check())
                    Find the best talent for your company
                @elseif(Auth::check() && Auth::user()->role === 'employee')
                    Continue your job search journey
                @else
                    Your job search ends here
                @endif
            </p>
            <p class="text-lg opacity-90 mb-8">
                @if(Auth::guard('web')->check())
                    Post jobs and connect with 5Cr+ job seekers
                @else
                    Discover 50 lakh+ career opportunities
                @endif
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl p-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" placeholder="Q. Search jobs by 'title'" 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="relative">
                        <i class="fas fa-briefcase absolute left-3 top-3 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            <option>Your Experience</option>
                            <option>Fresher</option>
                            <option>1-3 Years</option>
                            <option>3-5 Years</option>
                            <option>5+ Years</option>
                        </select>
                    </div>
                    <div class="relative">
                        <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" placeholder="Search for an area or..." 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <button class="gradient-bg text-white py-2 rounded-lg font-semibold hover:shadow-lg transition">
                        Search jobs <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
            
            <!-- Proud to Support -->
            <div class="mt-8">
                <p class="text-sm opacity-80 mb-2">Proud to Support</p>
                <div class="flex items-center justify-center space-x-2">
                    <i class="fas fa-award text-yellow-400"></i>
                    <span class="font-semibold">DPIIT</span>
                    <span class="text-xs opacity-75">#startupindia</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Trusted Companies -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <p class="text-center text-gray-600 mb-6">Trusted by 1000+ enterprises and 7 lakh+ MSMEs for hiring</p>
        <div class="flex flex-wrap justify-center gap-8 items-center">
            <div class="company-logo cursor-pointer bg-white px-6 py-3 rounded-lg shadow-sm">
                <img src="https://via.placeholder.com/100x40?text=swiggy" alt="swiggy" class="h-8">
            </div>
            <div class="company-logo cursor-pointer bg-white px-6 py-3 rounded-lg shadow-sm">
                <img src="https://via.placeholder.com/100x40?text=Uber" alt="Uber" class="h-8">
            </div>
            <div class="company-logo cursor-pointer bg-white px-6 py-3 rounded-lg shadow-sm">
                <img src="https://via.placeholder.com/100x40?text=Urban+Company" alt="Urban Company" class="h-8">
            </div>
            <div class="company-logo cursor-pointer bg-white px-6 py-3 rounded-lg shadow-sm">
                <img src="https://via.placeholder.com/100x40?text=zomato" alt="zomato" class="h-8">
            </div>
        </div>
    </div>

    <!-- AI Job Prep Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-8">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-robot text-2xl text-purple-600"></i>
                    <h2 class="text-2xl font-bold text-gray-800">Job Prep</h2>
                    <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm">Free AI Interview Coach</span>
                </div>
                <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">View all Preps ></a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="font-bold text-lg">Software Engineer</h3>
                            <p class="text-gray-600 text-sm">Tesla</p>
                        </div>
                        <div class="bg-orange-100 text-orange-600 px-2 py-1 rounded text-xs font-bold">TRENDING AT #1</div>
                    </div>
                    <button class="w-full gradient-bg text-white py-2 rounded-lg font-semibold">
                        Practice Interview <i class="fas fa-microphone ml-2"></i>
                    </button>
                    <p class="text-xs text-gray-500 mt-2">5 min AI Interview</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="font-bold text-lg">Data Scientist</h3>
                            <p class="text-gray-600 text-sm">Google</p>
                        </div>
                        <div class="bg-purple-100 text-purple-600 px-2 py-1 rounded text-xs font-bold">TRENDING AT #2</div>
                    </div>
                    <button class="w-full gradient-bg text-white py-2 rounded-lg font-semibold">
                        Practice Interview <i class="fas fa-microphone ml-2"></i>
                    </button>
                    <p class="text-xs text-gray-500 mt-2">5 min AI Interview</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of the content remains the same -->
    <!-- Popular Searches -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Popular Searches on Job Find Link</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="trending-card bg-white rounded-xl p-6 shadow-sm cursor-pointer">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-bold">TRENDING AT #1</div>
                    <i class="fas fa-arrow-right text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Jobs for Freshers</h3>
                <p class="text-gray-600 text-sm">10,000+ openings</p>
                <a href="#" class="text-blue-600 text-sm mt-3 inline-block">View all ></a>
            </div>
            
            <div class="trending-card bg-white rounded-xl p-6 shadow-sm cursor-pointer">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm font-bold">TRENDING AT #2</div>
                    <i class="fas fa-arrow-right text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Work from home Jobs</h3>
                <p class="text-gray-600 text-sm">5,000+ openings</p>
                <a href="#" class="text-blue-600 text-sm mt-3 inline-block">View all ></a>
            </div>
            
            <div class="trending-card bg-white rounded-xl p-6 shadow-sm cursor-pointer">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-bold">TRENDING AT #3</div>
                    <i class="fas fa-arrow-right text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Part time Jobs</h3>
                <p class="text-gray-600 text-sm">3,000+ openings</p>
                <a href="#" class="text-blue-600 text-sm mt-3 inline-block">View all ></a>
            </div>
            
            <div class="trending-card bg-white rounded-xl p-6 shadow-sm cursor-pointer">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-bold">TRENDING AT #4</div>
                    <i class="fas fa-arrow-right text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Jobs for Women</h3>
                <p class="text-gray-600 text-sm">2,000+ openings</p>
                <a href="#" class="text-blue-600 text-sm mt-3 inline-block">View all ></a>
            </div>
            
            <div class="trending-card bg-white rounded-xl p-6 shadow-sm cursor-pointer">
                <div class="flex justify-between items-start mb-3">
                    <div class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-bold">TRENDING AT #5</div>
                    <i class="fas fa-arrow-right text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Full time Jobs</h3>
                <p class="text-gray-600 text-sm">15,000+ openings</p>
                <a href="#" class="text-blue-600 text-sm mt-3 inline-block">View all ></a>
            </div>
        </div>
    </div>

    <!-- Trending Job Roles -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Trending job roles on Job Find Link</h2>
            <a href="#" class="text-blue-600 font-semibold">View all ></a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="role-badge flex justify-between items-center p-4 bg-white rounded-lg shadow-sm cursor-pointer transition">
                <div>
                    <p class="font-semibold text-gray-800">Graphic Designer</p>
                    <p class="text-sm text-gray-500">279 openings</p>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="role-badge flex justify-between items-center p-4 bg-white rounded-lg shadow-sm cursor-pointer transition">
                <div>
                    <p class="font-semibold text-gray-800">Labour / Factory Worker</p>
                    <p class="text-sm text-gray-500">253 openings</p>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="role-badge flex justify-between items-center p-4 bg-white rounded-lg shadow-sm cursor-pointer transition">
                <div>
                    <p class="font-semibold text-gray-800">Interior Designer</p>
                    <p class="text-sm text-gray-500">204 openings</p>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="role-badge flex justify-between items-center p-4 bg-white rounded-lg shadow-sm cursor-pointer transition">
                <div>
                    <p class="font-semibold text-gray-800">Security Guard</p>
                    <p class="text-sm text-gray-500">198 openings</p>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="role-badge flex justify-between items-center p-4 bg-white rounded-lg shadow-sm cursor-pointer transition">
                <div>
                    <p class="font-semibold text-gray-800">Photography/Video Editor</p>
                    <p class="text-sm text-gray-500">196 openings</p>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
            <div class="role-badge flex justify-between items-center p-4 bg-white rounded-lg shadow-sm cursor-pointer transition">
                <div>
                    <p class="font-semibold text-gray-800">Maid / Baby Care</p>
                    <p class="text-sm text-gray-500">193 openings</p>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>

    <!-- Job Openings in Top Companies -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Job Openings in Top companies</h2>
            <a href="#" class="text-blue-600 font-semibold">View all ></a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl p-6 shadow-sm job-card cursor-pointer">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Paytm</h3>
                        <p class="text-gray-600 text-sm mb-3">Digital payment and e-commerce facilitator.</p>
                        <button class="text-blue-600 font-semibold text-sm">View jobs →</button>
                    </div>
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-rupee-sign text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm job-card cursor-pointer">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Bajaj Allianz Life Insurance</h3>
                        <p class="text-gray-600 text-sm mb-3">Provider of life insurance and financial services.</p>
                        <button class="text-blue-600 font-semibold text-sm">View jobs →</button>
                    </div>
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm job-card cursor-pointer">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Paytm Service Pvt. Ltd.</h3>
                        <p class="text-gray-600 text-sm mb-3">Digital payment and e-commerce facilitator.</p>
                        <button class="text-blue-600 font-semibold text-sm">View jobs →</button>
                    </div>
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm job-card cursor-pointer">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Zomato</h3>
                        <p class="text-gray-600 text-sm mb-3">Online food delivery marketplace.</p>
                        <button class="text-blue-600 font-semibold text-sm">View jobs →</button>
                    </div>
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-utensils text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm job-card cursor-pointer">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Swiggy</h3>
                        <p class="text-gray-600 text-sm mb-3">Food delivery and online ordering platform.</p>
                        <button class="text-blue-600 font-semibold text-sm">View jobs →</button>
                    </div>
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-motorcycle text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-sm job-card cursor-pointer">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Kotak Life Insurance Company Limited</h3>
                        <p class="text-gray-600 text-sm mb-3">Life insurance company.</p>
                        <button class="text-blue-600 font-semibold text-sm">View jobs →</button>
                    </div>
                    <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                            <i class="fas fa-briefcase text-white text-sm"></i>
                        </div>
                        <span class="ml-2 text-xl font-bold">Job Find Link</span>
                    </div>
                    <p class="text-gray-400 text-sm">India's #1 job platform connecting millions with opportunities.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">For Job Seekers</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Browse Jobs</a></li>
                        <li><a href="#" class="hover:text-white">Create Resume</a></li>
                        <li><a href="#" class="hover:text-white">Interview Tips</a></li>
                        <li><a href="#" class="hover:text-white">Career Advice</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">For Employers</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Post a Job</a></li>
                        <li><a href="#" class="hover:text-white">Hiring Solutions</a></li>
                        <li><a href="#" class="hover:text-white">Pricing</a></li>
                        <li><a href="#" class="hover:text-white">Contact Sales</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Download App</h3>
                    <div class="space-y-2">
                        <div class="bg-gray-800 rounded-lg p-2 flex items-center space-x-2 cursor-pointer">
                            <i class="fab fa-apple text-2xl"></i>
                            <div>
                                <p class="text-xs">Download on the</p>
                                <p class="text-sm font-semibold">App Store</p>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-2 flex items-center space-x-2 cursor-pointer">
                            <i class="fab fa-google-play text-2xl"></i>
                            <div>
                                <p class="text-xs">GET IT ON</p>
                                <p class="text-sm font-semibold">Google Play</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2024 Job Find Link. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Search Button -->
    <div class="fixed bottom-8 right-8">
        <button class="gradient-bg text-white w-14 h-14 rounded-full shadow-lg hover:shadow-xl transition flex items-center justify-center">
            <i class="fas fa-search text-xl"></i>
        </button>
    </div>

    <script>
        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.trending-card, .job-card, .role-badge').forEach(el => {
            observer.observe(el);
        });

        // Show message function
        function showMessage(msg) {
            const toast = document.createElement('div');
            toast.innerText = msg;
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.left = '50%';
            toast.style.transform = 'translateX(-50%)';
            toast.style.backgroundColor = '#0f172a';
            toast.style.color = 'white';
            toast.style.padding = '10px 24px';
            toast.style.borderRadius = '40px';
            toast.style.fontSize = '0.85rem';
            toast.style.fontWeight = '500';
            toast.style.zIndex = '9999';
            toast.style.boxShadow = '0 8px 18px rgba(0,0,0,0.1)';
            toast.style.fontFamily = "'Inter', sans-serif";
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 400);
            }, 2000);
        }

        // Header navigation buttons
        document.getElementById('jobNavBtn')?.addEventListener('click', () => showMessage('🔍 Explore thousands of Job openings · Software, Marketing, Finance & more'));
        document.getElementById('jobPrepNavBtn')?.addEventListener('click', () => showMessage('📚 Job Prep: Resume builder, mock interviews, skill assessments & career guidance'));
        document.getElementById('contactsNavBtn')?.addEventListener('click', () => showMessage('📞 Contacts: Reach recruiters, network with mentors, get referral connects'));
        document.getElementById('degreeNavBtn')?.addEventListener('click', () => showMessage('🎓 Degree programs & certifications: Upskill with top universities & online degrees'));
        
        // Logo click
        document.querySelector('.logo-area')?.addEventListener('click', () => showMessage('🏠 Job Find Link — India\'s #1 destination for careers'));
    </script>
</body>
</html>
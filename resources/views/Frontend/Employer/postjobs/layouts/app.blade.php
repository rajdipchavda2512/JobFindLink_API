{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'JobFindLink')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @stack('styles')
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f3f4f6;
            overflow-x: hidden;
        }
        
        /* Sidebar styles */
        .sidebar-item {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .sidebar-item:hover {
            background-color: #f3f4f6;
            border-left-color: #3b82f6;
        }
        
        .sidebar-item.active {
            background-color: #eff6ff;
            border-left-color: #3b82f6;
            color: #2563eb;
        }
        
        .sidebar-item i {
            width: 1.5rem;
        }
        
        /* Fixed Sidebar - No scrolling issues */
        .sidebar {
            position: fixed;
            top: 64px;
            left: 0;
            width: 260px;
            height: calc(100vh - 64px);
            background-color: white;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05);
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            z-index: 40;
        }
        
        /* Custom scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 5px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Main content area - accounts for fixed sidebar */
        .main-content {
            margin-left: 260px;
            margin-top: 64px;
            min-height: calc(100vh - 64px);
            width: calc(100% - 260px);
        }
        
        /* Top Navigation - Fixed */
        .top-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        /* Mobile styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
                top: 0;
                height: 100vh;
                width: 280px;
                z-index: 1000;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                margin-top: 64px;
                width: 100%;
            }
            
            .top-nav {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
            }
        }
        
        /* Smooth transitions */
        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }
        
        /* Hide scrollbar when not needed */
        .sidebar {
            scrollbar-width: thin;
        }
        
        /* Ensure content doesn't overflow */
        .content-wrapper {
            max-width: 100%;
            overflow-x: hidden;
        }
        
        /* Fix for any unwanted spacing */
        .no-extra-space {
            padding: 0;
            margin: 0;
        }
        
        html, body {
            width: 100%;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <!-- Top Navigation - Fixed -->
    <nav class="top-nav bg-white shadow-lg">
        <div class="px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <!-- Mobile menu button -->
                    <button id="mobileMenuBtn" class="md:hidden mr-4 text-gray-600 hover:text-gray-900 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-yellow-500 bg-clip-text text-transparent">
                            JobFindLink
                        </a>
                    </div>
                    
                    <!-- Desktop Navigation Links -->
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="" class="inline-flex items-center px-1 pt-1 text-gray-500 hover:text-blue-600 transition">
                            Find Jobs
                        </a>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    @auth
                        <div class="relative">
                            <button id="userMenuBtn" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-yellow-500 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            
                            <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('employer.complete.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> My Profile
                                </a>
                                <a href="{{ route('employer.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                </a>
                                <hr class="my-1">
                                <form method="POST" action="{{ route('employer.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar - Fixed -->
    <aside id="sidebar" class="sidebar">
        <div class="p-4">
            <div class="mb-8 mt-2">
                <div class="bg-gradient-to-r from-blue-600 to-yellow-500 rounded-lg p-4 text-white">
                    <h3 class="font-semibold text-sm">Employer Portal</h3>
                    <p class="text-xs mt-1">Manage your recruitment</p>
                </div>
            </div>
            
            <nav class="space-y-1">
                <!-- Post a New Job -->
                <a href="{{ route('employer.jobs.create') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-plus-circle text-blue-500"></i>
                    <span class="ml-3">Post a New Job</span>
                </a>
                
                <!-- Profile -->
                <a href="{{ route('employer.complete.profile') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-building text-blue-500"></i>
                    <span class="ml-3">Company Profile</span>
                </a>
                
                <!-- View All Jobs -->
                <a href="" class="sidebar-item flex items-center px-4 py-3 text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-briefcase text-blue-500"></i>
                    <span class="ml-3">View All Jobs</span>
                </a>
                
                <!-- View Shortlisted -->
                <a href="" class="sidebar-item flex items-center px-4 py-3 text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-star text-yellow-500"></i>
                    <span class="ml-3">View Shortlisted</span>
                </a>
                
                <!-- Search Candidates -->
                <a href="" class="sidebar-item flex items-center px-4 py-3 text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-search text-green-500"></i>
                    <span class="ml-3">Search Candidates</span>
                </a>
                
                <!-- View Reports -->
                <a href="" class="sidebar-item flex items-center px-4 py-3 text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-chart-line text-purple-500"></i>
                    <span class="ml-3">View Reports</span>
                </a>
            </nav>
            
            <hr class="my-6">
            
            <!-- Quick Stats -->
            <div class="space-y-3">
                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Quick Stats</h4>
                <div class="bg-gray-50 rounded-lg p-3">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-600">Total Jobs</span>
                        <span class="font-bold text-blue-600" id="totalJobs">0</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-600">Applications</span>
                        <span class="font-bold text-green-600" id="totalApplications">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Shortlisted</span>
                        <span class="font-bold text-yellow-600" id="totalShortlisted">0</span>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="p-4 md:p-8">
            @yield('content')
        </div>
    </main>

    <!-- Mobile sidebar overlay -->
    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-45 md:hidden"></div>

    <script>
        // User menu toggle
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');
        
        if (userMenuBtn) {
            userMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userMenu.classList.toggle('hidden');
            });
        }
        
        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            if (userMenu && !userMenu.classList.contains('hidden')) {
                if (!userMenuBtn?.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            }
        });
        
        // Mobile sidebar toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('hidden');
                document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            });
        }
        
        // Set active sidebar item based on current URL
        function setActiveSidebarItem() {
            const currentUrl = window.location.pathname;
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            
            sidebarItems.forEach(item => {
                const href = item.getAttribute('href');
                if (href && currentUrl === href) {
                    item.classList.add('active');
                } else if (href && currentUrl.includes(href) && href !== '/') {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }
        
        // Fetch quick stats for employer
        function fetchQuickStats() {
            @auth
                @if(isset(Auth::user()->role) && Auth::user()->role === 'employer')
                    $.ajax({
                        url: '',
                        type: 'GET',
                        success: function(response) {
                            if (response.success) {
                                $('#totalJobs').text(response.data.total_jobs || 0);
                                $('#totalApplications').text(response.data.total_applications || 0);
                                $('#totalShortlisted').text(response.data.total_shortlisted || 0);
                            }
                        },
                        error: function(xhr) {
                            console.log('Error fetching stats:', xhr);
                        }
                    });
                @endif
            @endauth
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            setActiveSidebarItem();
            fetchQuickStats();
            
            // Close mobile sidebar when window is resized to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('open');
                    if (overlay) overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
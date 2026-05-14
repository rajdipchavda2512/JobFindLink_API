{{-- resources/views/frontend/employer/layouts.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'JobFindLink - Employer Portal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #eab308 100%);
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
        }
        
        .sidebar-item:hover {
            background: rgba(59, 130, 246, 0.1);
            transform: translateX(5px);
        }
        
        .sidebar-item.active {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-yellow-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-building text-white text-lg"></i>
                    </div>
                    <span class="ml-3 text-xl font-bold text-gray-800">Job<span class="text-yellow-500">Find</span>Link</span>
                    <span class="ml-2 text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">Employer</span>
                </div>
                
                <!-- Right Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <i class="fas fa-bell text-gray-600 text-xl cursor-pointer hover:text-yellow-500 transition"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="relative group">
                        <div class="flex items-center space-x-3 cursor-pointer">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-yellow-500 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ substr(Auth::guard('web')->user()->full_name ?? 'E', 0, 1) }}
                            </div>
                            <span class="text-gray-700 text-sm hidden md:block">{{ Auth::guard('web')->user()->full_name ?? 'Employer' }}</span>
                            <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
                        </div>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl hidden group-hover:block z-50">
                            <a href="{{ route('employer.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                            </a>
                            <a href="{{ route('employer.complete.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-building mr-2"></i> Company Profile
                            </a>
                            <div class="border-t my-1"></div>
                            <form action="{{ route('employer.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg min-h-screen hidden md:block">
            <div class="p-4">
                <div class="space-y-2">

                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>
</html>     
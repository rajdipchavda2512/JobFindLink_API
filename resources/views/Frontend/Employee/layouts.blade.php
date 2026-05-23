<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'employee Profile') - JobFindLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        :root {
            --primary-blue: #1e3a8a;
            --primary-blue-light: #2563eb;
            --secondary-yellow: #f59e0b;
            --secondary-yellow-light: #fbbf24;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #172554 100%);
        }
        
        .btn-yellow {
            background: linear-gradient(135deg, var(--secondary-yellow) 0%, #d97706 100%);
        }
        
        .btn-yellow:hover {
            background: linear-gradient(135deg, var(--secondary-yellow-light) 0%, var(--secondary-yellow) 100%);
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
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
        
        .sidebar-nav a.active {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
        }
        
        @media (max-width: 768px) {
            .notification {
                left: 20px;
                right: 20px;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    
    <!-- Top Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-briefcase text-yellow-400 text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">Job<span class="text-yellow-500">Find</span>Link</span>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button id="notificationBtn" class="text-gray-600 hover:text-yellow-500">
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                    </div>
                    <div class="relative">
                        <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center text-white">
                                {{ substr(Auth::user()->employee->full_name ?? Auth::user()->name, 0, 1) }}
                            </div>
                            <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
                        </button>
                        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                            <a href="{{ route('employee.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-yellow-50">
                                <i class="fas fa-user mr-2"></i> My Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-yellow-50">
                                <i class="fas fa-cog mr-2"></i> Settings
                            </a>
                            <hr class="my-1">
                          <form action="{{ route('auth.logout') }}" method="POST">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </div>

    <!-- Session Messages -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('{{ session('success') }}', 'success');
        });
    </script>
    @endif
    
    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('{{ session('error') }}', 'error');
        });
    </script>
    @endif

    <script>
        // User menu toggle
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');
        
        if (userMenuBtn) {
            userMenuBtn.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });
        }
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (userMenuBtn && !userMenuBtn.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
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
                    bgColor = 'bg-blue-500';
                    icon = 'fa-info-circle';
            }
            
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.innerHTML = `
                <div class="${bgColor} text-white px-6 py-3 rounded-xl shadow-lg flex items-center space-x-3">
                    <i class="fas ${icon} text-xl"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.5s ease-out';
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }
        
        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.getElementById(modalId).classList.add('flex');
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }
        
        // Close modal on outside click
        window.onclick = function(event) {
            if (event.target.classList.contains('modal-overlay')) {
                event.target.classList.add('hidden');
                event.target.classList.remove('flex');
            }
        }
    </script>
    
    @stack('scripts')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Admin Dashboard - Info Konser')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Remix Icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

        <!-- Quill Editor -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @stack('styles')
    </head>
    <body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased">
        <div class="min-h-screen flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 fixed h-screen overflow-y-auto">
                <div class="p-6">
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-8">
                        Admin Panel
                    </h1>
                    
                    <nav class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                        
                        <a href="{{ route('admin.page-content.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.page-content.*') ? 'bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            <i class="ri-file-edit-line"></i>
                            <span>Kelola Konten</span>
                        </a>
                        
                        <a href="{{ route('admin.events.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.events.*') ? 'bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            <i class="ri-music-line"></i>
                            <span>Event Konser</span>
                        </a>
                        
                        <a href="{{ route('admin.news.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            <i class="ri-newspaper-line"></i>
                            <span>Kelola News</span>
                        </a>
                        
                        <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="ri-home-line"></i>
                            <span>Kembali ke Website</span>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 ml-64">
                <!-- Top Bar -->
                <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-10">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <h2 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h2>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-3">
                                <div class="text-right">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ ucfirst(auth()->user()->roles->pluck('name')->first() ?? 'User') }}
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <i class="ri-logout-box-line"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <div class="p-6 max-w-full">
                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Toast Container -->
        <div id="toast-container" class="fixed top-4 right-4 z-50 flex flex-col gap-2"></div>

        <script>
            // Toast Notification System
            function showToast(message, type = 'success') {
                const container = document.getElementById('toast-container');
                if (!container) return;

                const toast = document.createElement('div');
                const isDark = document.documentElement.classList.contains('dark');
                
                const typeConfig = {
                    success: {
                        bg: 'bg-green-50 dark:bg-green-900/20',
                        border: 'border-green-200 dark:border-green-800',
                        text: 'text-green-800 dark:text-green-200',
                        icon: 'ri-checkbox-circle-line'
                    },
                    error: {
                        bg: 'bg-red-50 dark:bg-red-900/20',
                        border: 'border-red-200 dark:border-red-800',
                        text: 'text-red-800 dark:text-red-200',
                        icon: 'ri-error-warning-line'
                    },
                    info: {
                        bg: 'bg-blue-50 dark:bg-blue-900/20',
                        border: 'border-blue-200 dark:border-blue-800',
                        text: 'text-blue-800 dark:text-blue-200',
                        icon: 'ri-information-line'
                    }
                };

                const config = typeConfig[type] || typeConfig.success;

                toast.className = `${config.bg} ${config.border} ${config.text} px-4 py-3 rounded-lg flex items-center gap-2 shadow-lg min-w-[300px] max-w-md transform translate-x-full transition-all duration-300 ease-in-out`;
                toast.innerHTML = `
                    <i class="${config.icon} text-xl"></i>
                    <span class="flex-1">${message}</span>
                    <button onclick="this.parentElement.remove()" class="ml-2 hover:opacity-70 transition-opacity">
                        <i class="ri-close-line"></i>
                    </button>
                `;

                container.appendChild(toast);

                // Trigger animation
                setTimeout(() => {
                    toast.classList.remove('translate-x-full');
                }, 10);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        if (toast.parentElement) {
                            toast.remove();
                        }
                    }, 300);
                }, 5000);
            }

            // Show session messages as toasts
            @if(session('success'))
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('{{ session('success') }}', 'success');
                });
            @endif

            @if(session('error'))
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('{{ session('error') }}', 'error');
                });
            @endif
        </script>

        @stack('scripts')
    </body>
</html>


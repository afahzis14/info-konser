<!-- Navigation -->
<nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 bg-black/70 backdrop-blur-md border-b border-orange-500/30 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent hover:opacity-80 transition-opacity flex items-center gap-2">
                    <i class="ri-music-line"></i>
                    <span>Info Konser</span>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ url('/') }}#konser" class="text-white hover:text-orange-400 transition-colors">
                    Konser
                </a>
                <a href="{{ url('/') }}#artis" class="text-white hover:text-orange-400 transition-colors">
                    Artis
                </a>
                <a href="{{ route('pembelian-tiket') }}" class="text-white hover:text-orange-400 transition-colors">
                    Pembelian Tiket
                </a>
                <a href="{{ route('news') }}" class="text-white hover:text-orange-400 transition-colors">
                    News
                </a>
                <a href="{{ url('/') }}#tentang" class="text-white hover:text-orange-400 transition-colors">
                    Tentang
                </a>
                @if (Route::has('login'))
                    @auth
                        @if(auth()->user()->hasAnyRole(['superadmin', 'admin']))
                            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                Admin Dashboard
                            </a>
                        @endif
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('admin.login') }}" class="text-white hover:text-orange-400 transition-colors">
                            Masuk Admin
                        </a>
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg text-white hover:bg-orange-500/20 transition-colors" aria-label="Toggle menu">
                <i class="ri-menu-line text-2xl" id="menu-icon"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar" class="fixed top-0 right-0 bottom-0 z-50 w-80 sm:w-96 bg-black/95 backdrop-blur-md translate-x-full transition-transform duration-300 ease-in-out lg:hidden border-l border-orange-500/30 shadow-2xl" style="transform: translateX(100%); will-change: transform; height: 100vh; max-height: 100vh;">
        <div class="flex flex-col h-full max-h-full">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between px-5 py-4 sm:px-6 sm:py-5 border-b border-gray-200 dark:border-gray-800 flex-shrink-0">
                <span class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                    Menu
                </span>
                <button id="close-sidebar" class="p-2 rounded-lg text-white hover:bg-orange-500/20 transition-colors" aria-label="Close menu">
                    <i class="ri-close-line text-2xl sm:text-3xl"></i>
                </button>
            </div>

            <!-- Sidebar Menu Items -->
            <div class="flex-1 overflow-y-auto overflow-x-hidden px-4 py-4 sm:px-5 sm:py-5 space-y-2 min-h-0">
                <a href="{{ url('/') }}#konser" class="flex items-center px-4 py-4 sm:py-5 rounded-xl text-base sm:text-lg font-semibold text-white bg-black/40 border border-orange-500/20 hover:bg-orange-500/20 hover:border-orange-500/40 transition-all duration-200 min-h-[56px] shadow-sm">
                    <i class="ri-music-2-line text-xl sm:text-2xl mr-3 text-purple-600 dark:text-purple-400"></i>
                    <span>Konser</span>
                </a>
                <a href="{{ url('/') }}#artis" class="flex items-center px-4 py-4 sm:py-5 rounded-xl text-base sm:text-lg font-semibold text-white bg-black/40 border border-orange-500/20 hover:bg-orange-500/20 hover:border-orange-500/40 transition-all duration-200 min-h-[56px] shadow-sm">
                    <i class="ri-user-star-line text-xl sm:text-2xl mr-3 text-purple-600 dark:text-purple-400"></i>
                    <span>Artis</span>
                </a>
                <a href="{{ route('pembelian-tiket') }}" class="flex items-center px-4 py-4 sm:py-5 rounded-xl text-base sm:text-lg font-semibold text-white bg-black/40 border border-orange-500/20 hover:bg-orange-500/20 hover:border-orange-500/40 transition-all duration-200 min-h-[56px] shadow-sm">
                    <i class="ri-ticket-line text-xl sm:text-2xl mr-3 text-purple-600 dark:text-purple-400"></i>
                    <span>Pembelian Tiket</span>
                </a>
                <a href="{{ route('news') }}" class="flex items-center px-4 py-4 sm:py-5 rounded-xl text-base sm:text-lg font-semibold text-white bg-black/40 border border-orange-500/20 hover:bg-orange-500/20 hover:border-orange-500/40 transition-all duration-200 min-h-[56px] shadow-sm">
                    <i class="ri-newspaper-line text-xl sm:text-2xl mr-3 text-purple-600 dark:text-purple-400"></i>
                    <span>News</span>
                </a>
                <a href="{{ url('/') }}#tentang" class="flex items-center px-4 py-4 sm:py-5 rounded-xl text-base sm:text-lg font-semibold text-white bg-black/40 border border-orange-500/20 hover:bg-orange-500/20 hover:border-orange-500/40 transition-all duration-200 min-h-[56px] shadow-sm">
                    <i class="ri-information-line text-xl sm:text-2xl mr-3 text-purple-600 dark:text-purple-400"></i>
                    <span>Tentang</span>
                </a>
                
                <div class="border-t border-gray-300 dark:border-gray-700 my-3"></div>
                
                @if (Route::has('login'))
                    @auth
                        @if(auth()->user()->hasAnyRole(['superadmin', 'admin']))
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center px-4 py-4 sm:py-5 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white hover:from-purple-700 hover:to-pink-700 transition-all duration-200 font-bold text-base sm:text-lg min-h-[56px] shadow-lg">
                                <i class="ri-dashboard-line text-lg sm:text-xl mr-2"></i>
                                <span>Admin Dashboard</span>
                            </a>
                        @endif
                        <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center px-4 py-4 sm:py-5 rounded-xl bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700 transition-all duration-200 font-semibold text-base sm:text-lg min-h-[56px] shadow-sm">
                                <i class="ri-logout-box-line text-lg sm:text-xl mr-2"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('admin.login') }}" class="flex items-center px-4 py-4 sm:py-5 rounded-xl text-base sm:text-lg font-semibold text-white bg-black/40 border border-orange-500/20 hover:bg-orange-500/20 hover:border-orange-500/40 transition-all duration-200 min-h-[56px] shadow-sm">
                            <i class="ri-login-box-line text-xl sm:text-2xl mr-3 text-purple-600 dark:text-purple-400"></i>
                            <span>Masuk Admin</span>
                            </a>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"></div>
</nav>

@push('scripts')
<script>
    (function() {
        'use strict';
        
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                initSidebar();
                initNavbarScroll();
            });
        } else {
            initSidebar();
            initNavbarScroll();
        }

        // Navbar scroll effect
        function initNavbarScroll() {
            const navbar = document.getElementById('main-navbar');
            let lastScroll = 0;

            function handleScroll() {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                if (navbar) {
                    if (currentScroll > 10) {
                        navbar.classList.add('shadow-lg', 'bg-black/80');
                        navbar.classList.remove('bg-black/70');
                    } else {
                        navbar.classList.remove('shadow-lg', 'bg-black/80');
                        navbar.classList.add('bg-black/70');
                    }
                }

                lastScroll = currentScroll;
            }

            // Throttle scroll event for better performance
            let ticking = false;
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        handleScroll();
                        ticking = false;
                    });
                    ticking = true;
                }
            });

            // Initial check
            handleScroll();
        }

        function initSidebar() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeSidebarButton = document.getElementById('close-sidebar');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            // Ensure sidebar is hidden on load
            if (mobileSidebar) {
                mobileSidebar.classList.add('translate-x-full');
                mobileSidebar.style.transform = 'translateX(100%)';
                mobileSidebar.style.visibility = 'hidden';
            }
            if (sidebarOverlay) {
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                sidebarOverlay.classList.remove('opacity-100', 'pointer-events-auto');
            }

            function openSidebar(e) {
                if (e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                if (mobileSidebar) {
                    mobileSidebar.style.visibility = 'visible';
                    mobileSidebar.classList.remove('translate-x-full');
                    mobileSidebar.style.transform = 'translateX(0)';
                }
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    sidebarOverlay.classList.add('opacity-100', 'pointer-events-auto');
                }
                document.body.style.overflow = 'hidden';
                document.documentElement.style.overflowX = 'hidden';
            }

            function closeSidebar(e) {
                if (e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                if (mobileSidebar) {
                    mobileSidebar.classList.add('translate-x-full');
                    mobileSidebar.style.transform = 'translateX(100%)';
                    // Hide after transition
                    setTimeout(function() {
                        if (mobileSidebar.classList.contains('translate-x-full')) {
                            mobileSidebar.style.visibility = 'hidden';
                        }
                    }, 300);
                }
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('opacity-100', 'pointer-events-auto');
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                }
                document.body.style.overflow = '';
                document.documentElement.style.overflowX = '';
            }

            // Event listeners
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openSidebar);
            }
            if (closeSidebarButton) {
                closeSidebarButton.addEventListener('click', closeSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }

            // Close sidebar when clicking on menu links
            if (mobileSidebar) {
                const sidebarLinks = mobileSidebar.querySelectorAll('a');
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        setTimeout(closeSidebar, 200);
                    });
                });
            }

            // Close sidebar on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileSidebar && !mobileSidebar.classList.contains('translate-x-full')) {
                    closeSidebar(e);
                }
            });
        }
    })();
</script>
@endpush


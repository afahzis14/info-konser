@extends('layouts.app')

@section('title', 'Info Konser - Platform Informasi Konser & Musik Terlengkap')

@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
@endphp

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-indigo-600 bg-clip-text text-transparent">
                        Temukan Konser
                    </span>
                    <br>
                    <span class="text-gray-800 dark:text-gray-200">Favoritmu</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto">
                    Platform terpercaya untuk informasi konser, event musik, dan pertunjukan live terbaru di Indonesia
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#konser" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg">
                        Jelajahi Konser
                    </a>
                    <a href="#tentang" class="px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg font-semibold border-2 border-gray-300 dark:border-gray-700 hover:border-purple-600 dark:hover:border-purple-400 transition-all">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Concerts Section -->
    <section id="konser" class="py-20 relative">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold mb-4 text-white">
                    Konser Terbaru
                </h3>
                <p class="text-lg text-gray-300">
                    Jangan lewatkan event musik spektakuler ini
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($events ?? [] as $event)
                    @php
                        // Gradient colors based on status
                        $gradients = [
                            'coming_soon' => 'from-purple-500 to-pink-500',
                            'hot' => 'from-indigo-500 to-purple-500',
                            'new' => 'from-pink-500 to-red-500',
                        ];
                        $gradient = $gradients[$event->status] ?? 'from-purple-500 to-pink-500';
                        
                        // Status label
                        $statusLabels = [
                            'coming_soon' => 'Coming Soon',
                            'hot' => 'Hot',
                            'new' => 'New',
                        ];
                        $statusLabel = $statusLabels[$event->status] ?? 'Coming Soon';
                        
                        // Status text color
                        $statusColors = [
                            'coming_soon' => 'text-purple-600 dark:text-purple-400',
                            'hot' => 'text-indigo-600 dark:text-indigo-400',
                            'new' => 'text-pink-600 dark:text-pink-400',
                        ];
                        $statusColor = $statusColors[$event->status] ?? 'text-purple-600 dark:text-purple-400';
                    @endphp
                    <div class="group bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                        <div class="h-48 bg-gradient-to-br {{ $gradient }} relative overflow-hidden">
                            @if($event->image)
                                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 {{ $statusColor }} rounded-full text-sm font-semibold">
                                    {{ $statusLabel }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-2 text-white">
                                {{ $event->title }}
                            </h4>
                            <p class="text-gray-300 mb-4">
                                {{ Str::limit($event->description ?? '', 80) }}
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-400">
                                <span><i class="ri-map-pin-line"></i> {{ $event->location }}</span>
                                <span><i class="ri-calendar-line"></i> {{ $event->formatted_date }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="ri-calendar-event-line text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-400">Belum ada event yang tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Artists Section -->
    <section id="artis" class="py-20 relative">
        <div class="absolute inset-0 bg-black/25 backdrop-blur-sm"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold mb-4 text-white">
                    Artis Populer
                </h3>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    Ikuti artis favoritmu dan dapatkan notifikasi konser mereka
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @for($i = 1; $i <= 6; $i++)
                <div class="text-center group cursor-pointer">
                    <div class="w-24 h-24 mx-auto mb-3 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-3xl font-bold text-white shadow-lg group-hover:scale-110 transition-transform">
                        {{ chr(64 + $i) }}
                    </div>
                    <h5 class="font-semibold text-gray-900 dark:text-gray-100">Artis {{ $i }}</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Musisi</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 relative">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-6 text-gray-900 dark:text-gray-100">
                        Mengapa Pilih Info Konser?
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                                <i class="ri-focus-3-line text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2 text-white">
                                    Informasi Terlengkap
                                </h4>
                                <p class="text-gray-300">
                                    Dapatkan informasi lengkap tentang konser, venue, harga tiket, dan jadwal
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-pink-100 dark:bg-pink-900/30 rounded-lg flex items-center justify-center">
                                <i class="ri-notification-line text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2 text-white">
                                    Notifikasi Real-time
                                </h4>
                                <p class="text-gray-300">
                                    Dapatkan notifikasi langsung untuk konser favorit dan artis yang kamu ikuti
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                                <i class="ri-smartphone-line text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2 text-white">
                                    Mudah Diakses
                                </h4>
                                <p class="text-gray-300">
                                    Platform yang responsif dan mudah digunakan di berbagai perangkat
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="bg-gradient-to-br from-orange-600/80 to-orange-500/80 backdrop-blur-md border border-orange-400/50 rounded-2xl p-8 shadow-2xl">
                        <div class="bg-black/60 backdrop-blur-md rounded-xl p-6 space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                                    <i class="ri-music-line text-xl"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-white">1000+ Konser</h5>
                                    <p class="text-sm text-gray-300">Event tersedia</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-pink-100 dark:bg-pink-900/30 rounded-full flex items-center justify-center">
                                    <i class="ri-group-line text-xl"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-white">50K+ Pengguna</h5>
                                    <p class="text-sm text-gray-300">Aktif setiap bulan</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-full flex items-center justify-center">
                                    <i class="ri-star-line text-xl"></i>
                                </div>
                                <div>
                                    <h5 class="font-semibold text-white">4.8/5 Rating</h5>
                                    <p class="text-sm text-gray-300">Dari pengguna</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-orange-600/80 to-orange-500/80 backdrop-blur-sm"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-4xl font-bold text-white mb-6">
                Siap Menemukan Konser Impianmu?
            </h3>
            <p class="text-xl text-purple-100 mb-8">
                Bergabunglah dengan ribuan pecinta musik lainnya dan jangan lewatkan event favoritmu
            </p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-white text-purple-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors shadow-lg">
                    Daftar Sekarang - Gratis
                </a>
            @endif
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'News - Info Konser')

@section('content')
<div class="min-h-screen py-12 relative">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12" style="font-family: 'Calibri', sans-serif;">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">
                News & Updates
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Berita terbaru seputar dunia musik, konser, dan event
            </p>
        </div>

        <!-- Featured News -->
        <div class="mb-12">
            <div class="bg-black/60 backdrop-blur-md rounded-xl shadow-lg overflow-hidden border border-orange-500/30">
                <div class="md:flex">
                    <div class="md:w-1/2 h-64 md:h-auto bg-gradient-to-br from-orange-500 to-orange-600 relative">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                Featured
                            </span>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-8">
                        <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <i class="ri-calendar-line"></i>
                            <span>15 Desember 2024</span>
                            <span class="mx-2">•</span>
                            <i class="ri-user-line"></i>
                            <span>Admin</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-4 text-gray-900 dark:text-gray-100">
                            Festival Musik Nusantara 2024: Lineup Lengkap Diumumkan
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                            Festival Musik Nusantara 2024 akan menghadirkan lebih dari 50 artis ternama dari berbagai genre. Event yang akan digelar di Jakarta Convention Center ini menjanjikan pengalaman musik yang tak terlupakan dengan teknologi sound system terdepan.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-orange-600 dark:text-orange-400 font-semibold hover:text-orange-700 dark:hover:text-orange-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
                Berita Terbaru
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- News Card 1 -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                Hot
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                            <i class="ri-calendar-line"></i>
                            <span>12 Desember 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-gray-100">
                            Konser Rock Night: Sukses Besar di Bandung
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                            Konser Rock Night yang digelar di Gedung Sate Bandung berhasil menarik lebih dari 10.000 penonton. Event ini menampilkan berbagai band rock terbaik Indonesia.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-orange-500 to-red-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                New
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                            <i class="ri-calendar-line"></i>
                            <span>10 Desember 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-gray-100">
                            Jazz & Blues Festival Kembali Digelar
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                            Setelah sukses tahun lalu, Jazz & Blues Festival akan kembali digelar di Yogyakarta dengan lineup yang lebih spektakuler dan venue yang lebih besar.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- News Card 3 -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                Update
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                            <i class="ri-calendar-line"></i>
                            <span>8 Desember 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-gray-100">
                            Tips Membeli Tiket Konser Online dengan Aman
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                            Panduan lengkap untuk membeli tiket konser online dengan aman dan terhindar dari penipuan. Pelajari cara memilih platform terpercaya.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- News Card 4 -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-orange-500 to-orange-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                Event
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                            <i class="ri-calendar-line"></i>
                            <span>5 Desember 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-gray-100">
                            Electronic Music Festival: Lineup Internasional
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                            Electronic Music Festival akan menghadirkan DJ internasional ternama dari berbagai negara. Event ini akan digelar di Jakarta dengan teknologi lighting canggih.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- News Card 5 -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-orange-600 to-red-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                Info
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                            <i class="ri-calendar-line"></i>
                            <span>3 Desember 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-gray-100">
                            Venue Baru untuk Konser di Surabaya
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                            Venue baru dengan kapasitas 15.000 penonton akan segera dibuka di Surabaya. Venue ini dilengkapi dengan teknologi audio dan visual terdepan.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- News Card 6 -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-orange-500 to-yellow-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                Trending
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mb-3">
                            <i class="ri-calendar-line"></i>
                            <span>1 Desember 2024</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-gray-100">
                            Artis Lokal Mendunia: Prestasi di Kancah Internasional
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                            Beberapa artis Indonesia berhasil menorehkan prestasi di kancah internasional dengan meraih penghargaan dan menggelar konser di berbagai negara.
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center gap-2 mt-8">
            <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <i class="ri-arrow-left-line"></i>
            </button>
            <button class="px-4 py-2 bg-orange-600 text-white rounded-lg font-semibold">1</button>
            <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">2</button>
            <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">3</button>
            <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <i class="ri-arrow-right-line"></i>
            </button>
        </div>
    </div>
</div>
@endsection


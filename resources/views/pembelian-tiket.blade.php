@extends('layouts.app')

@section('title', 'Pembelian Tiket - Info Konser')

@section('content')
<div class="min-h-screen py-12 relative">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                Pembelian Tiket Konser
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Pilih konser favoritmu dan dapatkan tiketnya sekarang
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Concert List -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Search and Filter -->
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg p-6">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <input 
                                type="text" 
                                placeholder="Cari konser, artis, atau venue..." 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                        </div>
                        <select class="px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <option>Semua Kategori</option>
                            <option>Rock</option>
                            <option>Pop</option>
                            <option>Jazz</option>
                            <option>Electronic</option>
                            <option>Hip Hop</option>
                        </select>
                        <select class="px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <option>Semua Lokasi</option>
                            <option>Jakarta</option>
                            <option>Bandung</option>
                            <option>Yogyakarta</option>
                            <option>Surabaya</option>
                        </select>
                    </div>
                </div>

                <!-- Concert Cards -->
                <div class="space-y-6">
                    <!-- Concert 1 -->
                    <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:border-orange-500/50 transition-all">
                        <div class="md:flex">
                            <div class="md:w-1/3 h-48 md:h-auto bg-gradient-to-br from-purple-500 to-pink-500 relative">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-purple-600 dark:text-purple-400 rounded-full text-sm font-semibold">
                                        Hot
                                    </span>
                                </div>
                            </div>
                            <div class="md:w-2/3 p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                            Festival Musik Nusantara
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                                            Konser akbar menampilkan artis-artis terbaik Indonesia dengan lineup yang spektakuler
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-4 mb-4 text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-calendar-line"></i>
                                        <span>15 Desember 2024</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="ri-time-line"></i>
                                        <span>19:00 WIB</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="ri-map-pin-line"></i>
                                        <span>Jakarta Convention Center</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Mulai dari</p>
                                        <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">Rp 250.000</p>
                                    </div>
                                    <a href="#form-pembelian" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105">
                                        Beli Tiket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Concert 2 -->
                    <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:border-orange-500/50 transition-all">
                        <div class="md:flex">
                            <div class="md:w-1/3 h-48 md:h-auto bg-gradient-to-br from-indigo-500 to-purple-500 relative">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-indigo-600 dark:text-indigo-400 rounded-full text-sm font-semibold">
                                        Coming Soon
                                    </span>
                                </div>
                            </div>
                            <div class="md:w-2/3 p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                            Rock Concert Night
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                                            Malam penuh energi dengan band rock terbaik dari dalam dan luar negeri
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-4 mb-4 text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-calendar-line"></i>
                                        <span>20 Desember 2024</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="ri-time-line"></i>
                                        <span>20:00 WIB</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="ri-map-pin-line"></i>
                                        <span>Gedung Sate, Bandung</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Mulai dari</p>
                                        <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">Rp 300.000</p>
                                    </div>
                                    <a href="#form-pembelian" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105">
                                        Beli Tiket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Concert 3 -->
                    <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg overflow-hidden hover:shadow-xl hover:border-orange-500/50 transition-all">
                        <div class="md:flex">
                            <div class="md:w-1/3 h-48 md:h-auto bg-gradient-to-br from-pink-500 to-red-500 relative">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-pink-600 dark:text-pink-400 rounded-full text-sm font-semibold">
                                        New
                                    </span>
                                </div>
                            </div>
                            <div class="md:w-2/3 p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                            Jazz & Blues Festival
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                                            Nikmati malam indah dengan alunan jazz dan blues yang memukau
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-4 mb-4 text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-calendar-line"></i>
                                        <span>25 Desember 2024</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="ri-time-line"></i>
                                        <span>18:30 WIB</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="ri-map-pin-line"></i>
                                        <span>Taman Budaya Yogyakarta</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Mulai dari</p>
                                        <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">Rp 200.000</p>
                                    </div>
                                    <a href="#form-pembelian" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105">
                                        Beli Tiket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Purchase Form -->
            <div class="lg:col-span-1">
                <div id="form-pembelian" class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg p-6 sticky top-24">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
                        Form Pembelian
                    </h2>
                    
                    <form action="{{ route('konfirmasi-pembayaran') }}" method="GET" class="space-y-6">
                        <!-- Concert Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Pilih Konser
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                <option>-- Pilih Konser --</option>
                                <option>Festival Musik Nusantara</option>
                                <option>Rock Concert Night</option>
                                <option>Jazz & Blues Festival</option>
                            </select>
                        </div>

                        <!-- Ticket Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tipe Tiket
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                <option>-- Pilih Tipe --</option>
                                <option>VIP - Rp 500.000</option>
                                <option>Regular - Rp 250.000</option>
                                <option>Ekonomi - Rp 150.000</option>
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Jumlah Tiket
                            </label>
                            <div class="flex items-center gap-4">
                                <button type="button" class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                                    <i class="ri-subtract-line text-xl"></i>
                                </button>
                                <input 
                                    type="number" 
                                    value="1" 
                                    min="1" 
                                    max="10"
                                    class="w-20 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg text-center focus:ring-2 focus:ring-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                >
                                <button type="button" class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                                    <i class="ri-add-line text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Customer Info -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">
                                Data Pembeli
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nama Lengkap
                                    </label>
                                    <input 
                                        type="text" 
                                        placeholder="Masukkan nama lengkap"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    >
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Email
                                    </label>
                                    <input 
                                        type="email" 
                                        placeholder="nama@email.com"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    >
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        No. Telepon
                                    </label>
                                    <input 
                                        type="tel" 
                                        placeholder="08xxxxxxxxxx"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Payment Summary -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <div class="space-y-3 mb-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                    <span class="text-gray-900 dark:text-gray-100 font-semibold">Rp 250.000</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600 dark:text-gray-400">Biaya Admin</span>
                                    <span class="text-gray-900 dark:text-gray-100 font-semibold">Rp 10.000</span>
                                </div>
                                <div class="flex justify-between text-lg font-bold border-t border-gray-200 dark:border-gray-700 pt-3">
                                    <span class="text-gray-900 dark:text-gray-100">Total</span>
                                    <span class="text-purple-600 dark:text-purple-400">Rp 260.000</span>
                                </div>
                            </div>
                            
                            <button 
                                type="submit" 
                                class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg"
                            >
                                Lanjutkan Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Simple quantity increment/decrement
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.querySelector('input[type="number"]');
        const decrementBtn = quantityInput?.previousElementSibling;
        const incrementBtn = quantityInput?.nextElementSibling;
        
        if (decrementBtn) {
            decrementBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        }
        
        if (incrementBtn) {
            incrementBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue < 10) {
                    quantityInput.value = currentValue + 1;
                }
            });
        }
    });
</script>
@endpush


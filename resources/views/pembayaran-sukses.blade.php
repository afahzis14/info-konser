@extends('layouts.app')

@section('title', 'Pembayaran Berhasil - Info Konser')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 flex items-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 md:p-12 text-center border border-gray-200 dark:border-gray-700">
            <!-- Success Icon -->
            <div class="mb-6">
                <div class="w-24 h-24 mx-auto bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                    <i class="ri-checkbox-circle-line text-6xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>

            <!-- Success Message -->
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                Pembayaran Berhasil!
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                Terima kasih atas pembelian Anda. Tiket akan segera dikirim ke email Anda.
            </p>

            <!-- Order Details -->
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 mb-8 text-left">
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    Detail Pesanan
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">No. Pesanan:</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">#IK-2024-001234</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Konser:</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">Festival Musik Nusantara</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Jumlah Tiket:</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">2x Regular</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Total Pembayaran:</span>
                        <span class="font-bold text-purple-600 dark:text-purple-400">Rp 510.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Status:</span>
                        <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full text-sm font-semibold">
                            Terkonfirmasi
                        </span>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-8 text-left">
                <h3 class="font-semibold text-blue-900 dark:text-blue-100 mb-3 flex items-center gap-2">
                    <i class="ri-mail-line"></i>
                    <span>Langkah Selanjutnya</span>
                </h3>
                <ol class="list-decimal list-inside space-y-2 text-sm text-blue-800 dark:text-blue-200">
                    <li>E-tiket akan dikirim ke email Anda dalam waktu 1x24 jam</li>
                    <li>Simpan e-tiket dan bawa saat hari konser</li>
                    <li>Datang 30 menit sebelum konser dimulai</li>
                    <li>Jika ada pertanyaan, hubungi customer service kami</li>
                </ol>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a 
                    href="{{ route('pembelian-tiket') }}" 
                    class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg"
                >
                    Beli Tiket Lagi
                </a>
                <a 
                    href="{{ url('/') }}" 
                    class="px-6 py-3 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg font-semibold border-2 border-gray-300 dark:border-gray-600 hover:border-purple-600 dark:hover:border-purple-400 transition-all"
                >
                    Kembali ke Beranda
                </a>
            </div>

            <!-- Download Receipt -->
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <button 
                    class="text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 font-semibold flex items-center gap-2 mx-auto transition-colors"
                >
                    <i class="ri-download-line"></i>
                    Download Invoice
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


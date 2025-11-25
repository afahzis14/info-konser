@extends('layouts.app')

@section('title', 'Pembayaran Gagal - Info Konser')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 flex items-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 md:p-12 text-center border border-gray-200 dark:border-gray-700">
            <!-- Error Icon -->
            <div class="mb-6">
                <div class="w-24 h-24 mx-auto bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                    <i class="ri-close-circle-line text-6xl text-red-600 dark:text-red-400"></i>
                </div>
            </div>

            <!-- Error Message -->
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent">
                Pembayaran Gagal
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                Maaf, pembayaran Anda tidak dapat diproses. Silakan coba lagi atau gunakan metode pembayaran lain.
            </p>

            <!-- Error Details -->
            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-6 mb-8 text-left">
                <h2 class="text-lg font-semibold mb-4 text-red-900 dark:text-red-100 flex items-center gap-2">
                    <i class="ri-error-warning-line"></i>
                    <span>Kemungkinan Penyebab</span>
                </h2>
                <ul class="list-disc list-inside space-y-2 text-sm text-red-800 dark:text-red-200">
                    <li>Saldo tidak mencukupi</li>
                    <li>Kartu kredit/debit ditolak oleh bank</li>
                    <li>Koneksi internet terputus saat proses pembayaran</li>
                    <li>Waktu pembayaran telah habis</li>
                    <li>Masalah teknis pada sistem pembayaran</li>
                </ul>
            </div>

            <!-- Order Info -->
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 mb-8 text-left">
                <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    Informasi Pesanan
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
                        <span class="text-gray-600 dark:text-gray-400">Total:</span>
                        <span class="font-bold text-purple-600 dark:text-purple-400">Rp 510.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Status:</span>
                        <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded-full text-sm font-semibold">
                            Gagal
                        </span>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-8 text-left">
                <h3 class="font-semibold text-blue-900 dark:text-blue-100 mb-3 flex items-center gap-2">
                    <i class="ri-lightbulb-line"></i>
                    <span>Butuh Bantuan?</span>
                </h3>
                <p class="text-sm text-blue-800 dark:text-blue-200 mb-3">
                    Jika Anda yakin sudah melakukan pembayaran tetapi status masih gagal, silakan hubungi customer service kami:
                </p>
                <div class="space-y-2 text-sm text-blue-800 dark:text-blue-200">
                    <p><i class="ri-mail-line"></i> Email: support@infokonser.com</p>
                    <p><i class="ri-phone-line"></i> WhatsApp: +62 812-3456-7890</p>
                    <p><i class="ri-time-line"></i> Jam Layanan: 09:00 - 21:00 WIB</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a 
                    href="{{ route('konfirmasi-pembayaran') }}" 
                    class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg"
                >
                    Coba Lagi
                </a>
                <a 
                    href="{{ route('pembelian-tiket') }}" 
                    class="px-6 py-3 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg font-semibold border-2 border-gray-300 dark:border-gray-600 hover:border-purple-600 dark:hover:border-purple-400 transition-all"
                >
                    Kembali ke Pembelian
                </a>
                <a 
                    href="{{ url('/') }}" 
                    class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-all"
                >
                    Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


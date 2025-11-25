@extends('admin.layouts.app')

@section('title', 'Kelola Konten - Admin Dashboard')
@section('page-title', 'Kelola Konten Halaman')

@section('content')
<div class="space-y-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Daftar Halaman</h3>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400">
                <i class="ri-arrow-left-line"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.page-content.edit', 'welcome') }}" class="p-6 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-all hover:shadow-lg group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="ri-home-line text-2xl text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-gray-100">Halaman Welcome</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Halaman utama</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten hero section, featured concerts, dan informasi lainnya</p>
            </a>

            <a href="{{ route('admin.page-content.edit', 'pembelian-tiket') }}" class="p-6 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-all hover:shadow-lg group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-pink-100 dark:bg-pink-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="ri-ticket-line text-2xl text-pink-600 dark:text-pink-400"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-gray-100">Halaman Pembelian Tiket</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Form pembelian</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten form pembelian tiket dan daftar konser</p>
            </a>

            <a href="{{ route('admin.page-content.edit', 'konfirmasi-pembayaran') }}" class="p-6 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-all hover:shadow-lg group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="ri-bank-card-line text-2xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-gray-100">Halaman Konfirmasi</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Konfirmasi pembayaran</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten form konfirmasi pembayaran dan instruksi</p>
            </a>
        </div>
    </div>
</div>
@endsection



@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - Info Konser')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total Halaman</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $pageCount }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-file-line text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Halaman Terkelola</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $pages->whereNotNull('content')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-pink-100 dark:bg-pink-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-edit-box-line text-2xl text-pink-600 dark:text-pink-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Status Sistem</p>
                    <p class="text-lg font-bold text-green-600 dark:text-green-400">Aktif</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-checkbox-circle-line text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Aksi Cepat</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.page-content.edit', 'welcome') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-home-line text-2xl text-purple-600 dark:text-purple-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Edit Halaman Welcome</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman utama</p>
            </a>

            <a href="{{ route('admin.page-content.edit', 'pembelian-tiket') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-ticket-line text-2xl text-pink-600 dark:text-pink-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Edit Halaman Pembelian</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman pembelian tiket</p>
            </a>

            <a href="{{ route('admin.page-content.edit', 'konfirmasi-pembayaran') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-bank-card-line text-2xl text-indigo-600 dark:text-indigo-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Edit Halaman Konfirmasi</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman konfirmasi pembayaran</p>
            </a>
        </div>
    </div>

    <!-- Pages List -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Daftar Halaman</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Halaman</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Judul</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="py-3 px-4">
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ ucfirst(str_replace('-', ' ', $page->page_name)) }}</span>
                            </td>
                            <td class="py-3 px-4 text-gray-600 dark:text-gray-400">
                                {{ $page->title ?? '-' }}
                            </td>
                            <td class="py-3 px-4">
                                @if($page->content)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full text-xs font-semibold">
                                        Terkelola
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-semibold">
                                        Belum Dikelola
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.page-content.edit', $page->page_name) }}" class="text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500 dark:text-gray-400">
                                Belum ada halaman yang dikelola
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



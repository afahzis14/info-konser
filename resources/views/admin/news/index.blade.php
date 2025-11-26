@extends('admin.layouts.app')

@section('title', 'Kelola News - Admin Dashboard')
@section('page-title', 'Kelola News')

@section('content')
<div class="space-y-6">
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header with Add Button -->
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Daftar Berita</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kelola semua berita dan artikel</p>
        </div>
        <a 
            href="{{ route('admin.news.create') }}" 
            class="px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-500 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-orange-600 transition-all transform hover:scale-105 shadow-lg flex items-center gap-2"
        >
            <i class="ri-add-line"></i>
            Tambah Berita Baru
        </a>
    </div>

    <!-- News Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Berita</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Kategori</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Publikasi</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($news as $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-4">
                                    @if($item->image)
                                        <img 
                                            src="{{ Storage::url($item->image) }}" 
                                            alt="{{ $item->title }}"
                                            class="w-16 h-16 object-cover rounded-lg"
                                        >
                                    @else
                                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                                            <i class="ri-newspaper-line text-2xl text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $item->title }}
                                            @if($item->is_featured)
                                                <span class="ml-2 px-2 py-0.5 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 rounded text-xs font-semibold">
                                                    Featured
                                                </span>
                                            @endif
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-1">
                                            {{ $item->short_excerpt }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            <i class="ri-user-line"></i> {{ $item->author }} • 
                                            <i class="ri-eye-line"></i> {{ $item->views }} views
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @php
                                    $categoryColors = [
                                        'Featured' => 'bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400',
                                        'Hot' => 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400',
                                        'New' => 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400',
                                        'Update' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400',
                                        'Event' => 'bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400',
                                        'Info' => 'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400',
                                        'Trending' => 'bg-pink-100 dark:bg-pink-900/30 text-pink-700 dark:text-pink-400',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $categoryColors[$item->category] ?? $categoryColors['Info'] }}">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm">
                                    <p class="text-gray-900 dark:text-gray-100 font-medium">
                                        <i class="ri-calendar-line"></i> {{ $item->formatted_date }}
                                    </p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @if($item->is_published)
                                    <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full text-xs font-semibold">
                                        Published
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-semibold">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    <a 
                                        href="{{ route('news.detail', $item->slug) }}" 
                                        target="_blank"
                                        class="p-2 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition-colors"
                                        title="Lihat"
                                    >
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a 
                                        href="{{ route('admin.news.edit', $item->id) }}" 
                                        class="p-2 text-orange-600 dark:text-orange-400 hover:bg-orange-100 dark:hover:bg-orange-900/30 rounded-lg transition-colors"
                                        title="Edit"
                                    >
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form 
                                        action="{{ route('admin.news.destroy', $item->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit"
                                            class="p-2 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-colors"
                                            title="Hapus"
                                        >
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="ri-newspaper-line text-4xl text-gray-400 dark:text-gray-600"></i>
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada berita</p>
                                    <a 
                                        href="{{ route('admin.news.create') }}" 
                                        class="mt-2 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors text-sm font-semibold"
                                    >
                                        Tambah Berita Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection


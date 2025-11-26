@extends('admin.layouts.app')

@section('title', 'Kelola Event Konser - Admin Dashboard')
@section('page-title', 'Kelola Event Konser')

@section('content')
<div class="space-y-6">
    <!-- Header with Add Button -->
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Daftar Event Konser</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kelola semua event konser yang tersedia</p>
        </div>
        <a 
            href="{{ route('admin.events.create') }}" 
            class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg flex items-center gap-2"
        >
            <i class="ri-add-line"></i>
            Tambah Event Baru
        </a>
    </div>

    <!-- Events Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Event</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal & Lokasi</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Harga</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($events as $event)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-4">
                                    @if($event->image)
                                        <img 
                                            src="{{ Storage::url($event->image) }}" 
                                            alt="{{ $event->title }}"
                                            class="w-16 h-16 object-cover rounded-lg"
                                        >
                                    @else
                                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                                            <i class="ri-music-line text-2xl text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $event->title }}
                                            @if($event->is_featured)
                                                <span class="ml-2 px-2 py-0.5 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 rounded text-xs font-semibold">
                                                    Featured
                                                </span>
                                            @endif
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-1">
                                            {{ Str::limit($event->description, 50) }}
                                        </p>
                                        @if($event->category)
                                            <span class="inline-block mt-1 px-2 py-0.5 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400 rounded text-xs">
                                                {{ $event->category }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm">
                                    <p class="text-gray-900 dark:text-gray-100 font-medium">
                                        <i class="ri-calendar-line"></i> {{ $event->formatted_date }}
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400 mt-1">
                                        <i class="ri-time-line"></i> {{ $event->formatted_time }}
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400 mt-1">
                                        <i class="ri-map-pin-line"></i> {{ $event->location }}
                                    </p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @if($event->min_price)
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Mulai dari</p>
                                    <p class="text-lg font-bold text-purple-600 dark:text-purple-400">
                                        Rp {{ number_format($event->min_price, 0, ',', '.') }}
                                    </p>
                                @else
                                    <p class="text-gray-500 dark:text-gray-400">-</p>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @php
                                    $statusColors = [
                                        'coming_soon' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400',
                                        'hot' => 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400',
                                        'new' => 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400',
                                        'ended' => 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400',
                                    ];
                                    $statusLabels = [
                                        'coming_soon' => 'Coming Soon',
                                        'hot' => 'Hot',
                                        'new' => 'New',
                                        'ended' => 'Ended',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$event->status] ?? $statusColors['coming_soon'] }}">
                                    {{ $statusLabels[$event->status] ?? ucfirst($event->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    <a 
                                        href="{{ route('admin.events.edit', $event->id) }}" 
                                        class="p-2 text-purple-600 dark:text-purple-400 hover:bg-purple-100 dark:hover:bg-purple-900/30 rounded-lg transition-colors"
                                        title="Edit"
                                    >
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form 
                                        action="{{ route('admin.events.destroy', $event->id) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')"
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
                                    <i class="ri-music-line text-4xl text-gray-400 dark:text-gray-600"></i>
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada event konser</p>
                                    <a 
                                        href="{{ route('admin.events.create') }}" 
                                        class="mt-2 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold"
                                    >
                                        Tambah Event Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</div>
@endsection


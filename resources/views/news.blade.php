@extends('layouts.app')

@section('title', 'News - Info Konser')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen py-12 relative">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12" style="font-family: 'Calibri', sans-serif;">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">
                News & Updates
            </h1>
            <p class="text-lg text-gray-300">
                Berita terbaru seputar dunia musik, konser, dan event
            </p>
        </div>

        <!-- Featured News -->
        @if(isset($featuredNews) && $featuredNews)
            <div class="mb-12">
                <div class="bg-black/60 backdrop-blur-md rounded-xl shadow-lg overflow-hidden border border-orange-500/30">
                    <div class="md:flex">
                        <div class="md:w-1/2 h-64 md:h-auto {{ $featuredNews->image ? '' : 'bg-gradient-to-br from-orange-500 to-orange-600' }} relative">
                            @if($featuredNews->image)
                                <img src="{{ Storage::url($featuredNews->image) }}" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 bg-black/20"></div>
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                    {{ $featuredNews->category }}
                                </span>
                            </div>
                        </div>
                        <div class="md:w-1/2 p-8">
                            <div class="flex items-center gap-2 text-sm text-gray-400 mb-4">
                                <i class="ri-calendar-line"></i>
                                <span>{{ $featuredNews->formatted_date }}</span>
                                <span class="mx-2">•</span>
                                <i class="ri-user-line"></i>
                                <span>{{ $featuredNews->author }}</span>
                            </div>
                            <h2 class="text-3xl font-bold mb-4 text-white">
                                {{ $featuredNews->title }}
                            </h2>
                            <p class="text-gray-300 mb-6 leading-relaxed">
                                {{ $featuredNews->short_excerpt }}
                            </p>
                            <a href="{{ route('news.detail', $featuredNews->slug) }}" class="inline-flex items-center gap-2 text-orange-600 dark:text-orange-400 font-semibold hover:text-orange-700 dark:hover:text-orange-300 transition-colors">
                                Baca Selengkapnya
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- News Grid -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-6 text-white">
                Berita Terbaru
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($latestNews ?? [] as $item)
                    <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                        <div class="h-48 {{ $item->image ? '' : 'bg-gradient-to-br from-orange-400 to-orange-600' }} relative overflow-hidden">
                            @if($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 bg-black/20 hover:bg-black/10 transition-colors"></div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                                    {{ $item->category }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                                <i class="ri-calendar-line"></i>
                                <span>{{ $item->formatted_date }}</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-white">
                                {{ $item->title }}
                            </h3>
                            <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                                {{ $item->short_excerpt }}
                            </p>
                            <a href="{{ route('news.detail', $item->slug) }}" class="inline-flex items-center gap-2 text-orange-600 dark:text-orange-400 font-semibold text-sm hover:text-orange-700 dark:hover:text-orange-300 transition-colors">
                                Baca Selengkapnya
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="ri-newspaper-line text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-400">Belum ada berita yang dipublikasikan</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($latestNews->hasPages())
            <div class="flex justify-center items-center gap-2 mt-8 flex-wrap">
                {{-- Previous Page Link --}}
                @if ($latestNews->onFirstPage())
                    <span class="px-4 py-2 bg-black/40 backdrop-blur-md border border-orange-500/20 text-gray-500 rounded-lg cursor-not-allowed">
                        <i class="ri-arrow-left-line"></i>
                    </span>
                @else
                    <a href="{{ $latestNews->previousPageUrl() }}" class="px-4 py-2 bg-black/60 backdrop-blur-md border border-orange-500/30 text-white rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-colors">
                        <i class="ri-arrow-left-line"></i>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @php
                    $currentPage = $latestNews->currentPage();
                    $lastPage = $latestNews->lastPage();
                    $startPage = max(1, $currentPage - 2);
                    $endPage = min($lastPage, $currentPage + 2);
                @endphp

                {{-- First Page --}}
                @if ($startPage > 1)
                    <a href="{{ $latestNews->url(1) }}" class="px-4 py-2 bg-black/60 backdrop-blur-md border border-orange-500/30 text-white rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-colors">1</a>
                    @if ($startPage > 2)
                        <span class="px-2 text-gray-400">...</span>
                    @endif
                @endif

                {{-- Page Numbers --}}
                @for ($page = $startPage; $page <= $endPage; $page++)
                    @if ($page == $currentPage)
                        <span class="px-4 py-2 bg-orange-600 text-white rounded-lg font-semibold">{{ $page }}</span>
                    @else
                        <a href="{{ $latestNews->url($page) }}" class="px-4 py-2 bg-black/60 backdrop-blur-md border border-orange-500/30 text-white rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-colors">{{ $page }}</a>
                    @endif
                @endfor

                {{-- Last Page --}}
                @if ($endPage < $lastPage)
                    @if ($endPage < $lastPage - 1)
                        <span class="px-2 text-gray-400">...</span>
                    @endif
                    <a href="{{ $latestNews->url($lastPage) }}" class="px-4 py-2 bg-black/60 backdrop-blur-md border border-orange-500/30 text-white rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-colors">{{ $lastPage }}</a>
                @endif

                {{-- Next Page Link --}}
                @if ($latestNews->hasMorePages())
                    <a href="{{ $latestNews->nextPageUrl() }}" class="px-4 py-2 bg-black/60 backdrop-blur-md border border-orange-500/30 text-white rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-colors">
                        <i class="ri-arrow-right-line"></i>
                    </a>
                @else
                    <span class="px-4 py-2 bg-black/40 backdrop-blur-md border border-orange-500/20 text-gray-500 rounded-lg cursor-not-allowed">
                        <i class="ri-arrow-right-line"></i>
                    </span>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection


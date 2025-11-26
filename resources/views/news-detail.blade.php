@extends('layouts.app')

@section('title', $post['title'] . ' - News Info Konser')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="min-h-screen py-12 relative">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300 transition-colors">
                <i class="ri-arrow-left-line"></i>
                <span>Kembali ke News</span>
            </a>
        </div>

        <!-- Article Header -->
        <article class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg overflow-hidden mb-8">
            <!-- Featured Image -->
            <div class="h-64 md:h-96 {{ $post['image'] ? '' : 'bg-gradient-to-br from-orange-500 to-orange-600' }} relative overflow-hidden">
                @if($post['image'])
                    <img src="{{ Storage::url($post['image']) }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-black/20"></div>
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold">
                        {{ $post['category'] }}
                    </span>
                </div>
            </div>

            <!-- Article Content -->
            <div class="p-6 md:p-8">
                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-400 mb-6">
                    <div class="flex items-center gap-2">
                        <i class="ri-calendar-line"></i>
                        <span>{{ $post['date'] }}</span>
                    </div>
                    <span class="text-orange-500">•</span>
                    <div class="flex items-center gap-2">
                        <i class="ri-user-line"></i>
                        <span>{{ $post['author'] }}</span>
                    </div>
                    <span class="text-orange-500">•</span>
                    <div class="flex items-center gap-2">
                        <i class="ri-folder-line"></i>
                        <span>{{ $post['category'] }}</span>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold mb-6 text-white" style="font-family: 'Calibri', sans-serif;">
                    {{ $post['title'] }}
                </h1>

                <!-- Article Body -->
                <div class="prose prose-invert prose-lg max-w-none text-gray-300 leading-relaxed">
                    {!! $post['content'] !!}
                </div>

                <!-- Share Section -->
                <div class="mt-8 pt-8 border-t border-orange-500/30">
                    <div class="flex items-center gap-4">
                        <span class="text-gray-400 font-semibold">Bagikan:</span>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-black/40 border border-orange-500/30 rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-black/40 border border-orange-500/30 rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-black/40 border border-orange-500/30 rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                                <i class="ri-whatsapp-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-black/40 border border-orange-500/30 rounded-lg hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                                <i class="ri-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Posts -->
        @if(isset($relatedNews) && $relatedNews->count() > 0)
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-6 text-white">Berita Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedNews as $related)
                <div class="bg-black/60 backdrop-blur-md border border-orange-500/30 rounded-xl shadow-lg hover:shadow-2xl hover:border-orange-500/50 transition-all duration-300 overflow-hidden">
                    <div class="h-40 {{ $related->image ? '' : 'bg-gradient-to-br from-orange-400 to-orange-600' }} relative overflow-hidden">
                        @if($related->image)
                            <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-black/20"></div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                            <i class="ri-calendar-line"></i>
                            <span>{{ $related->formatted_date }}</span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-white line-clamp-2">
                            {{ $related->title }}
                        </h3>
                        <p class="text-sm text-gray-400 line-clamp-2">
                            {{ $related->short_excerpt }}
                        </p>
                        <a href="{{ route('news.detail', $related->slug) }}" class="inline-flex items-center gap-2 text-orange-400 text-sm font-semibold mt-3 hover:text-orange-300 transition-colors">
                            Baca Selengkapnya
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Navigation -->
        <div class="flex justify-between items-center pt-8 border-t border-orange-500/30">
            <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300 transition-colors">
                <i class="ri-arrow-left-line"></i>
                <span>Semua Berita</span>
            </a>
            @if(isset($nextNews) && $nextNews)
            <a href="{{ route('news.detail', $nextNews->slug) }}" class="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300 transition-colors">
                <span>Berita Selanjutnya</span>
                <i class="ri-arrow-right-line"></i>
            </a>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    .prose {
        color: rgb(209 213 219);
    }
    .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
        color: rgb(255 255 255);
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .prose h3 {
        font-size: 1.5rem;
    }
    .prose h2 {
        font-size: 1.875rem;
    }
    .prose h1 {
        font-size: 2.25rem;
    }
    .prose p {
        margin-bottom: 1.25rem;
        line-height: 1.75;
    }
    .prose ul, .prose ol {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1.25rem;
    }
    .prose ol {
        list-style-type: decimal;
    }
    .prose li {
        margin-bottom: 0.5rem;
    }
    .prose a {
        color: rgb(251 146 60);
        text-decoration: underline;
    }
    .prose a:hover {
        color: rgb(251 191 36);
    }
    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
    }
    .prose blockquote {
        border-left: 4px solid rgb(251 146 60);
        padding-left: 1rem;
        margin: 1.5rem 0;
        font-style: italic;
        color: rgb(209 213 219);
    }
    .prose code {
        background-color: rgba(0, 0, 0, 0.3);
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-family: monospace;
        font-size: 0.875em;
    }
    .prose pre {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin: 1.5rem 0;
    }
    .prose pre code {
        background-color: transparent;
        padding: 0;
    }
</style>
@endpush
@endsection


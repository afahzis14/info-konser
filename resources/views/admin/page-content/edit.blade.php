@extends('admin.layouts.app')

@section('title', 'Edit Konten - ' . ucfirst(str_replace('-', ' ', $pageContent->page_name)))
@section('page-title', 'Edit Konten: ' . ucfirst(str_replace('-', ' ', $pageContent->page_name)))

@section('content')
<div class="space-y-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Edit Konten Halaman</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kelola konten untuk halaman {{ ucfirst(str_replace('-', ' ', $pageContent->page_name)) }}</p>
            </div>
            <a href="{{ route('admin.page-content.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.page-content.update', $pageContent->page_name) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Page Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Judul Halaman
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $pageContent->title) }}"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                    placeholder="Masukkan judul halaman"
                >
                @error('title')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meta Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Meta Description
                </label>
                <textarea 
                    name="meta_description" 
                    rows="3"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                    placeholder="Masukkan meta description untuk SEO"
                >{{ old('meta_description', $pageContent->meta_description) }}</textarea>
                @error('meta_description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dynamic Content Editor based on page -->
            @if($pageContent->page_name === 'welcome')
                @include('admin.page-content.partials.welcome-editor')
            @elseif($pageContent->page_name === 'pembelian-tiket')
                @include('admin.page-content.partials.pembelian-editor')
            @elseif($pageContent->page_name === 'konfirmasi-pembayaran')
                @include('admin.page-content.partials.konfirmasi-editor')
            @endif

            <!-- Content JSON (Advanced) -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <details class="group">
                    <summary class="cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                        <i class="ri-settings-3-line"></i>
                        Konten JSON (Advanced)
                    </summary>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            JSON Content
                        </label>
                        <textarea 
                            name="content" 
                            rows="10"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-mono text-sm"
                            placeholder='{"key": "value"}'
                        >{{ old('content', $pageContent->content) }}</textarea>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Edit konten dalam format JSON. Hati-hati dengan sintaks JSON.
                        </p>
                    </div>
                </details>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg"
                >
                    <i class="ri-save-line"></i> Simpan Perubahan
                </button>
                <a 
                    href="{{ route('admin.page-content.index') }}" 
                    class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Preview Halaman</h3>
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <i class="ri-information-line"></i> 
                Preview akan tersedia setelah menyimpan perubahan
            </p>
            @php
                $pageUrl = match($pageContent->page_name) {
                    'welcome' => url('/'),
                    'pembelian-tiket' => route('pembelian-tiket'),
                    'konfirmasi-pembayaran' => route('konfirmasi-pembayaran'),
                    default => url('/'),
                };
            @endphp
            <a 
                href="{{ $pageUrl }}" 
                target="_blank"
                class="text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 text-sm font-medium"
            >
                <i class="ri-external-link-line"></i> Lihat Halaman di Tab Baru
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-resize textareas
    document.querySelectorAll('textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
</script>
@endpush


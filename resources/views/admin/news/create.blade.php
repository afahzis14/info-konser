@extends('admin.layouts.app')

@section('title', 'Tambah Berita - Admin Dashboard')
@section('page-title', 'Tambah Berita Baru')

@section('content')
<div class="max-w-7xl w-full">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Form Tambah Berita</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Lengkapi informasi berita di bawah ini</p>
            </div>
            <a 
                href="{{ route('admin.news.index') }}" 
                class="text-sm text-gray-600 dark:text-gray-400 hover:text-orange-600 dark:hover:text-orange-400"
            >
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Informasi Dasar</h4>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Judul Berita <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Contoh: Festival Musik Nusantara 2024: Lineup Lengkap Diumumkan"
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Ringkasan (Excerpt)
                        </label>
                        <textarea 
                            name="excerpt" 
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Ringkasan singkat berita (akan muncul di halaman list)..."
                        >{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="category"
                                required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                                <option value="Featured" {{ old('category') == 'Featured' ? 'selected' : '' }}>Featured</option>
                                <option value="Hot" {{ old('category') == 'Hot' ? 'selected' : '' }}>Hot</option>
                                <option value="New" {{ old('category') == 'New' ? 'selected' : '' }}>New</option>
                                <option value="Update" {{ old('category') == 'Update' ? 'selected' : '' }}>Update</option>
                                <option value="Event" {{ old('category') == 'Event' ? 'selected' : '' }}>Event</option>
                                <option value="Info" {{ old('category') == 'Info' ? 'selected' : '' }}>Info</option>
                                <option value="Trending" {{ old('category') == 'Trending' ? 'selected' : '' }}>Trending</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tanggal Publikasi <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="date" 
                                name="published_date" 
                                value="{{ old('published_date', date('Y-m-d')) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                            @error('published_date')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Penulis
                            </label>
                            <input 
                                type="text" 
                                name="author" 
                                value="{{ old('author', auth()->user()->name ?? 'Admin') }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                placeholder="Admin"
                            >
                            @error('author')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Konten Berita</h4>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Konten Lengkap <span class="text-red-500">*</span>
                    </label>
                    <!-- Hidden textarea untuk form submission -->
                    <textarea 
                        name="content" 
                        id="content"
                        style="position: absolute; left: -9999px; width: 1px; height: 1px; opacity: 0;"
                    >{{ old('content', '') }}</textarea>
                    <!-- Quill Editor Container -->
                    <div id="editor" style="min-height: 400px; background: white; color: #1f2937;">
                        {!! old('content', '') !!}
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        <i class="ri-information-line"></i> Gunakan editor di atas untuk memformat konten. Format akan otomatis dikonversi ke HTML.
                    </p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Media & Settings -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Media & Pengaturan</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gambar Featured
                        </label>
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                        >
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Format: JPG, PNG, GIF (Max: 2MB)
                        </p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Meta Description (SEO)
                        </label>
                        <textarea 
                            name="meta_description" 
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Deskripsi singkat untuk SEO (max 500 karakter)..."
                        >{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 space-y-3">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_published" 
                            value="1"
                            {{ old('is_published', true) ? 'checked' : '' }}
                            class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500"
                        >
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Publikasikan segera</span>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_featured" 
                            value="1"
                            {{ old('is_featured') ? 'checked' : '' }}
                            class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500"
                        >
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Tandai sebagai Featured</span>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end gap-4">
                <a 
                    href="{{ route('admin.news.index') }}" 
                    class="px-6 py-3 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors font-semibold"
                >
                    Batal
                </a>
                <button 
                    type="submit"
                    id="submit-btn"
                    class="px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-500 text-white rounded-lg font-semibold hover:from-orange-700 hover:to-orange-600 transition-all transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <i class="ri-save-line"></i> <span id="submit-text">Simpan Berita</span>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    var quill = null;
    
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill Editor
        quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        ['link', 'image'],
                        ['blockquote', 'code-block'],
                        ['clean']
                    ],
                    handlers: {
                        'image': function() {
                            var input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');
                            input.click();
                            
                            input.onchange = function() {
                                var file = input.files[0];
                                if (file) {
                                    var formData = new FormData();
                                    formData.append('image', file);
                                    
                                    // Show loading
                                    var range = quill.getSelection(true);
                                    quill.insertText(range.index, 'Uploading image...', 'user');
                                    
                                    fetch('{{ route("admin.news.upload-image") }}', {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Remove loading text
                                            quill.deleteText(range.index, 'Uploading image...'.length);
                                            // Insert image
                                            quill.insertEmbed(range.index, 'image', data.url);
                                        } else {
                                            alert('Gagal mengupload gambar: ' + (data.message || 'Unknown error'));
                                            quill.deleteText(range.index, 'Uploading image...'.length);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('Gagal mengupload gambar. Silakan coba lagi.');
                                        quill.deleteText(range.index, 'Uploading image...'.length);
                                    });
                                }
                            };
                        }
                    }
                }
            },
            placeholder: 'Tulis konten berita lengkap di sini...',
        });

        // Set initial content if exists
        @if(old('content'))
            var initialContent = {!! json_encode(old('content')) !!};
            if (initialContent) {
                quill.root.innerHTML = initialContent;
            }
        @endif

        // Sync content to textarea on every change
        quill.on('text-change', function() {
            var contentTextarea = document.querySelector('#content');
            if (contentTextarea) {
                contentTextarea.value = quill.root.innerHTML;
            }
        });

        // Update hidden textarea before form submission
        var form = document.querySelector('form');
        var submitBtn = document.querySelector('#submit-btn');
        var submitText = document.querySelector('#submit-text');
        
        if (form) {
            form.addEventListener('submit', function(e) {
                var contentTextarea = document.querySelector('#content');
                
                if (!contentTextarea) {
                    console.error('Content textarea not found');
                    return true;
                }
                
                // Always update content from Quill BEFORE any validation
                if (quill) {
                    var htmlContent = quill.root.innerHTML;
                    contentTextarea.value = htmlContent;
                    console.log('Content updated from Quill editor:', htmlContent.substring(0, 100));
                }
                
                // Check if content is empty
                var contentValue = contentTextarea.value || '';
                var textContent = contentValue.replace(/<[^>]*>/g, '').trim();
                
                if (!textContent || textContent.length === 0 || contentValue === '<p><br></p>' || contentValue === '<p></p>') {
                    e.preventDefault();
                    alert('Konten berita tidak boleh kosong. Silakan tulis konten terlebih dahulu.');
                    if (quill) {
                        quill.focus();
                    } else {
                        contentTextarea.focus();
                    }
                    return false;
                }
                
                // Disable submit button to prevent double submission
                if (submitBtn) {
                    submitBtn.disabled = true;
                    if (submitText) {
                        submitText.textContent = 'Menyimpan...';
                    }
                }
                
                // Ensure content is set
                if (quill && contentTextarea.value !== quill.root.innerHTML) {
                    contentTextarea.value = quill.root.innerHTML;
                }
                
                console.log('Form submitting with content length:', contentTextarea.value.length);
                return true;
            });
        } else {
            console.error('Form not found');
        }
    });
</script>
<style>
    #editor {
        min-height: 400px;
    }
    .ql-editor {
        min-height: 400px;
        font-family: 'Instrument Sans', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }
    .ql-container {
        font-family: 'Instrument Sans', sans-serif;
    }
    .ql-snow {
        border-color: #d1d5db;
    }
    .ql-toolbar {
        border-color: #d1d5db;
        background-color: #ffffff;
        border-radius: 0.5rem 0.5rem 0 0;
    }
    .ql-container {
        border-color: #d1d5db;
        border-radius: 0 0 0.5rem 0.5rem;
    }
    /* Dark mode support */
    .dark .ql-snow {
        border-color: #374151;
    }
    .dark .ql-toolbar {
        border-color: #374151;
        background-color: #1f2937;
    }
    .dark .ql-container {
        border-color: #374151;
        background-color: #1f2937;
    }
    .dark .ql-editor {
        background-color: #1f2937;
        color: #f3f4f6;
    }
    .dark .ql-stroke {
        stroke: #9ca3af;
    }
    .dark .ql-fill {
        fill: #9ca3af;
    }
    .dark .ql-picker-label {
        color: #9ca3af;
    }
    .dark .ql-picker-options {
        background-color: #1f2937;
        border-color: #374151;
    }
</style>
@endpush
@endsection


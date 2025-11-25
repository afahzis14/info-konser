@extends('admin.layouts.app')

@section('title', 'Tambah Event Konser - Admin Dashboard')
@section('page-title', 'Tambah Event Konser Baru')

@section('content')
<div class="max-w-7xl w-full">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Form Tambah Event Konser</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Lengkapi informasi event konser di bawah ini</p>
            </div>
            <a 
                href="{{ route('admin.events.index') }}" 
                class="text-sm text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400"
            >
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Informasi Dasar</h4>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Judul Event <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Contoh: Festival Musik Nusantara"
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Deskripsi
                        </label>
                        <textarea 
                            name="description" 
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Deskripsi lengkap tentang event konser..."
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Kategori
                            </label>
                            <select 
                                name="category"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                                <option value="">Pilih Kategori</option>
                                <option value="Rock" {{ old('category') == 'Rock' ? 'selected' : '' }}>Rock</option>
                                <option value="Pop" {{ old('category') == 'Pop' ? 'selected' : '' }}>Pop</option>
                                <option value="Jazz" {{ old('category') == 'Jazz' ? 'selected' : '' }}>Jazz</option>
                                <option value="Electronic" {{ old('category') == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                                <option value="Hip Hop" {{ old('category') == 'Hip Hop' ? 'selected' : '' }}>Hip Hop</option>
                                <option value="R&B" {{ old('category') == 'R&B' ? 'selected' : '' }}>R&B</option>
                                <option value="Klasik" {{ old('category') == 'Klasik' ? 'selected' : '' }}>Klasik</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="status"
                                required
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                                <option value="coming_soon" {{ old('status', 'coming_soon') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                                <option value="hot" {{ old('status') == 'hot' ? 'selected' : '' }}>Hot</option>
                                <option value="new" {{ old('status') == 'new' ? 'selected' : '' }}>New</option>
                                <option value="ended" {{ old('status') == 'ended' ? 'selected' : '' }}>Ended</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Date & Location -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Tanggal & Lokasi</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tanggal Event <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="date" 
                            name="event_date" 
                            value="{{ old('event_date') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                        >
                        @error('event_date')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Waktu Event <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="time" 
                            name="event_time" 
                            value="{{ old('event_time') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                        >
                        @error('event_time')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Venue <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="venue" 
                            value="{{ old('venue') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Contoh: Jakarta Convention Center"
                        >
                        @error('venue')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Lokasi/Kota <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="location" 
                            value="{{ old('location') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Contoh: Jakarta"
                        >
                        @error('location')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Harga Tiket</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Harga VIP
                        </label>
                        <input 
                            type="number" 
                            name="price_vip" 
                            value="{{ old('price_vip') }}"
                            min="0"
                            step="1000"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="0"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Harga Regular
                        </label>
                        <input 
                            type="number" 
                            name="price_regular" 
                            value="{{ old('price_regular') }}"
                            min="0"
                            step="1000"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="0"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Harga Ekonomi
                        </label>
                        <input 
                            type="number" 
                            name="price_economy" 
                            value="{{ old('price_economy') }}"
                            min="0"
                            step="1000"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="0"
                        >
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Informasi Tambahan</h4>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Lineup Artis (pisahkan dengan koma)
                        </label>
                        <input 
                            type="text" 
                            name="lineup" 
                            value="{{ old('lineup') }}"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Contoh: Artis 1, Artis 2, Artis 3"
                        >
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pisahkan nama artis dengan koma</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Kapasitas
                            </label>
                            <input 
                                type="number" 
                                name="capacity" 
                                value="{{ old('capacity') }}"
                                min="0"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                placeholder="0"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tiket Terjual
                            </label>
                            <input 
                                type="number" 
                                name="sold_tickets" 
                                value="{{ old('sold_tickets', 0) }}"
                                min="0"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                placeholder="0"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Meta Description (SEO)
                        </label>
                        <textarea 
                            name="meta_description" 
                            rows="2"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            placeholder="Deskripsi singkat untuk SEO..."
                        >{{ old('meta_description') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Gambar Event</h4>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Upload Gambar
                    </label>
                    <div 
                        id="drop-zone" 
                        class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:border-purple-500 dark:hover:border-purple-500 transition-colors"
                    >
                        <input 
                            type="file" 
                            name="images[]" 
                            accept="image/*"
                            multiple
                            class="hidden" 
                            id="image-upload"
                            onchange="handleFileSelect(this.files)"
                        >
                        <label for="image-upload" class="cursor-pointer block">
                            <i class="ri-image-add-line text-4xl mb-2 block text-gray-400 dark:text-gray-600"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Klik untuk upload atau drag & drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                PNG, JPG maks. 2MB per gambar (Multiple images)
                            </p>
                        </label>
                    </div>
                    <div id="image-preview-container" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
                    @error('images')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Image Preview Modal -->
            <div id="image-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
                <div class="relative max-w-4xl max-h-[90vh] w-full">
                    <button 
                        type="button"
                        onclick="closeImageModal()"
                        class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors z-10"
                        aria-label="Close modal"
                    >
                        <i class="ri-close-line text-3xl"></i>
                    </button>
                    <img id="modal-image" src="" alt="Preview" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl mx-auto block">
                    <p id="modal-filename" class="mt-2 text-center text-white text-sm"></p>
                </div>
            </div>

            <!-- Featured Checkbox -->
            <div class="flex items-center gap-3">
                <input 
                    type="checkbox" 
                    name="is_featured" 
                    id="is_featured"
                    value="1"
                    {{ old('is_featured') ? 'checked' : '' }}
                    class="w-5 h-5 text-purple-600 focus:ring-purple-500 rounded"
                >
                <label for="is_featured" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Tandai sebagai Event Featured
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center gap-4 pt-6">
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg"
                >
                    <i class="ri-save-line"></i> Simpan Event
                </button>
                <a 
                    href="{{ route('admin.events.index') }}" 
                    class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('image-upload');
        const previewContainer = document.getElementById('image-preview-container');
        let selectedFiles = [];

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Highlight drop zone when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-purple-500', 'bg-purple-50', 'dark:bg-purple-900/20');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-purple-500', 'bg-purple-50', 'dark:bg-purple-900/20');
        }

        // Handle dropped files
        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                handleFileSelect(files);
            }
        }

        // Handle file selection (both click and drop)
        function handleFileSelect(files) {
            const filesArray = Array.from(files);
            
            filesArray.forEach(file => {
                // Validate file type
                if (!file.type.match('image.*')) {
                    alert(`File "${file.name}" bukan file gambar. Silakan pilih file gambar (PNG, JPG, dll)`);
                    return;
                }

                // Validate file size (2MB = 2 * 1024 * 1024 bytes)
                if (file.size > 2 * 1024 * 1024) {
                    alert(`File "${file.name}" terlalu besar. Ukuran file maksimal 2MB`);
                    return;
                }

                // Check if file already exists
                const fileExists = selectedFiles.some(f => f.name === file.name && f.size === file.size);
                if (fileExists) {
                    return;
                }

                // Add file to selectedFiles array
                selectedFiles.push(file);

                // Preview image
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const imageId = 'image-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
                    file.previewId = imageId;
                    
                    const previewCard = document.createElement('div');
                    previewCard.className = 'relative group';
                    previewCard.id = imageId;
                    
                    previewCard.innerHTML = `
                        <div class="relative overflow-hidden rounded-lg border-2 border-gray-200 dark:border-gray-700">
                            <img 
                                src="${e.target.result}" 
                                alt="Preview" 
                                class="w-full h-32 object-cover cursor-pointer hover:opacity-80 transition-opacity"
                                onclick="openImageModal('${e.target.result}', '${file.name.replace(/'/g, "\\'")}')"
                            >
                            <button 
                                type="button" 
                                onclick="event.stopPropagation(); removeImage('${imageId}')"
                                class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-2 transition-colors shadow-lg z-10"
                                title="Hapus gambar"
                            >
                                <i class="ri-delete-bin-line text-sm"></i>
                            </button>
                            <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white text-xs p-2 truncate">
                                ${file.name}
                            </div>
                        </div>
                    `;
                    
                    previewContainer.appendChild(previewCard);
                    updateFileInput();
                }
                
                reader.readAsDataURL(file);
            });
        }

        // Remove image from preview
        window.removeImage = function(imageId) {
            const previewCard = document.getElementById(imageId);
            if (previewCard) {
                // Find and remove file from selectedFiles
                const fileIndex = selectedFiles.findIndex(f => f.previewId === imageId);
                if (fileIndex > -1) {
                    selectedFiles.splice(fileIndex, 1);
                }
                
                previewCard.remove();
                updateFileInput();
            }
        }

        // Update file input with selected files
        function updateFileInput() {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            fileInput.files = dataTransfer.files;
        }

        // Make handleFileSelect available globally for onchange
        window.handleFileSelect = handleFileSelect;
    });

    // Open image modal
    window.openImageModal = function(imageSrc, filename) {
        const modal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');
        const modalFilename = document.getElementById('modal-filename');
        
        if (modal && modalImage && modalFilename) {
            modalImage.src = imageSrc;
            modalFilename.textContent = filename || '';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    }

    // Close image modal
    window.closeImageModal = function() {
        const modal = document.getElementById('image-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }

    // Close modal when clicking outside the image
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('image-modal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeImageModal();
                }
            });
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('image-modal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeImageModal();
                }
            }
        });
    });
</script>
@endpush


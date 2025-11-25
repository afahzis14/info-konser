@extends('admin.layouts.app')

@section('title', 'Edit Event Konser - Admin Dashboard')
@section('page-title', 'Edit Event Konser')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Edit Event Konser</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Perbarui informasi event konser</p>
            </div>
            <a 
                href="{{ route('admin.events.index') }}" 
                class="text-sm text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400"
            >
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

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
                            value="{{ old('title', $event->title) }}"
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
                        >{{ old('description', $event->description) }}</textarea>
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
                                <option value="Rock" {{ old('category', $event->category) == 'Rock' ? 'selected' : '' }}>Rock</option>
                                <option value="Pop" {{ old('category', $event->category) == 'Pop' ? 'selected' : '' }}>Pop</option>
                                <option value="Jazz" {{ old('category', $event->category) == 'Jazz' ? 'selected' : '' }}>Jazz</option>
                                <option value="Electronic" {{ old('category', $event->category) == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                                <option value="Hip Hop" {{ old('category', $event->category) == 'Hip Hop' ? 'selected' : '' }}>Hip Hop</option>
                                <option value="R&B" {{ old('category', $event->category) == 'R&B' ? 'selected' : '' }}>R&B</option>
                                <option value="Klasik" {{ old('category', $event->category) == 'Klasik' ? 'selected' : '' }}>Klasik</option>
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
                                <option value="coming_soon" {{ old('status', $event->status) == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                                <option value="hot" {{ old('status', $event->status) == 'hot' ? 'selected' : '' }}>Hot</option>
                                <option value="new" {{ old('status', $event->status) == 'new' ? 'selected' : '' }}>New</option>
                                <option value="ended" {{ old('status', $event->status) == 'ended' ? 'selected' : '' }}>Ended</option>
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
                            value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}"
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
                            value="{{ old('event_time', $event->formatted_time) }}"
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
                            value="{{ old('venue', $event->venue) }}"
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
                            value="{{ old('location', $event->location) }}"
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
                            value="{{ old('price_vip', $event->price_vip) }}"
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
                            value="{{ old('price_regular', $event->price_regular) }}"
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
                            value="{{ old('price_economy', $event->price_economy) }}"
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
                        @php
                            $lineupArray = $event->lineup ? json_decode($event->lineup, true) : [];
                            $lineupString = is_array($lineupArray) ? implode(', ', $lineupArray) : '';
                        @endphp
                        <input 
                            type="text" 
                            name="lineup" 
                            value="{{ old('lineup', $lineupString) }}"
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
                                value="{{ old('capacity', $event->capacity) }}"
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
                                value="{{ old('sold_tickets', $event->sold_tickets) }}"
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
                        >{{ old('meta_description', $event->meta_description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Gambar Event</h4>
                
                @if($event->image)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Gambar Saat Ini:</p>
                        <img 
                            src="{{ Storage::url($event->image) }}" 
                            alt="{{ $event->title }}"
                            class="max-w-xs rounded-lg border border-gray-200 dark:border-gray-700"
                        >
                    </div>
                @endif
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Upload Gambar Baru (opsional)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:border-purple-500 dark:hover:border-purple-500 transition-colors">
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="hidden" 
                            id="image-upload"
                            onchange="previewImage(this)"
                        >
                        <label for="image-upload" class="cursor-pointer">
                            <i class="ri-image-add-line text-4xl mb-2 block text-gray-400 dark:text-gray-600"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Klik untuk upload atau drag & drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                PNG, JPG maks. 2MB
                            </p>
                        </label>
                    </div>
                    <div id="image-preview" class="mt-4 hidden">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview Gambar Baru:</p>
                        <img id="preview-img" src="" alt="Preview" class="max-w-xs rounded-lg">
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Featured Checkbox -->
            <div class="flex items-center gap-3">
                <input 
                    type="checkbox" 
                    name="is_featured" 
                    id="is_featured"
                    value="1"
                    {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}
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
                    <i class="ri-save-line"></i> Perbarui Event
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
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }
</script>
@endpush


@php
    $content = json_decode($pageContent->content ?? '{}', true);
@endphp

<div class="space-y-6 border-t border-gray-200 dark:border-gray-700 pt-6">
    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Konten Halaman Pembelian Tiket</h4>
    
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Judul Halaman
        </label>
        <input 
            type="text" 
            name="page_title" 
            value="{{ old('page_title', $content['title'] ?? 'Pembelian Tiket Konser') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Subtitle/Deskripsi
        </label>
        <textarea 
            name="page_subtitle" 
            rows="2"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >{{ old('page_subtitle', $content['subtitle'] ?? 'Pilih konser favoritmu dan dapatkan tiketnya sekarang') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Placeholder Search
        </label>
        <input 
            type="text" 
            name="search_placeholder" 
            value="{{ old('search_placeholder', $content['search_placeholder'] ?? 'Cari konser, artis, atau venue...') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Form Title
        </label>
        <input 
            type="text" 
            name="form_title" 
            value="{{ old('form_title', $content['form_title'] ?? 'Form Pembelian') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Biaya Admin (Default)
        </label>
        <input 
            type="number" 
            name="admin_fee" 
            value="{{ old('admin_fee', $content['admin_fee'] ?? 10000) }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>
</div>



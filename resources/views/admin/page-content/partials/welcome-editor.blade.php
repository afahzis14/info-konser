@php
    $content = json_decode($pageContent->content ?? '{}', true);
@endphp

<div class="space-y-6 border-t border-gray-200 dark:border-gray-700 pt-6">
    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Hero Section</h4>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Hero Title
            </label>
            <input 
                type="text" 
                name="hero_title" 
                value="{{ old('hero_title', $content['hero_title'] ?? 'Temukan Konser Favoritmu') }}"
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
            >
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Hero Subtitle
            </label>
            <input 
                type="text" 
                name="hero_subtitle" 
                value="{{ old('hero_subtitle', $content['hero_subtitle'] ?? 'Platform terpercaya untuk informasi konser') }}"
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
            >
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Featured Concerts Section Title
        </label>
        <input 
            type="text" 
            name="featured_title" 
            value="{{ old('featured_title', $content['featured_title'] ?? 'Konser Terbaru') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Featured Concerts Description
        </label>
        <textarea 
            name="featured_description" 
            rows="2"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >{{ old('featured_description', $content['featured_description'] ?? 'Jangan lewatkan event musik spektakuler ini') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Artists Section Title
        </label>
        <input 
            type="text" 
            name="artists_title" 
            value="{{ old('artists_title', $content['artists_title'] ?? 'Artis Populer') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            About Section Title
        </label>
        <input 
            type="text" 
            name="about_title" 
            value="{{ old('about_title', $content['about_title'] ?? 'Mengapa Pilih Info Konser?') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>
</div>



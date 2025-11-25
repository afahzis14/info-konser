@php
    $content = json_decode($pageContent->content ?? '{}', true);
@endphp

<div class="space-y-6 border-t border-gray-200 dark:border-gray-700 pt-6">
    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Konten Halaman Konfirmasi Pembayaran</h4>
    
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Judul Halaman
        </label>
        <input 
            type="text" 
            name="page_title" 
            value="{{ old('page_title', $content['title'] ?? 'Konfirmasi Pembayaran') }}"
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
        >{{ old('page_subtitle', $content['subtitle'] ?? 'Silakan lengkapi informasi pembayaran Anda') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Nama Rekening
        </label>
        <input 
            type="text" 
            name="account_name" 
            value="{{ old('account_name', $content['account_name'] ?? 'Info Konser') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Nomor Rekening (Default)
            </label>
            <input 
                type="text" 
                name="account_number" 
                value="{{ old('account_number', $content['account_number'] ?? '1234567890') }}"
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

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Instruksi Pembayaran (Baris 1)
        </label>
        <input 
            type="text" 
            name="instruction_1" 
            value="{{ old('instruction_1', $content['instruction_1'] ?? 'Transfer sesuai dengan total pembayaran ke rekening yang tertera') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Instruksi Pembayaran (Baris 2)
        </label>
        <input 
            type="text" 
            name="instruction_2" 
            value="{{ old('instruction_2', $content['instruction_2'] ?? 'Upload bukti pembayaran (screenshot atau foto struk transfer)') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Instruksi Pembayaran (Baris 3)
        </label>
        <input 
            type="text" 
            name="instruction_3" 
            value="{{ old('instruction_3', $content['instruction_3'] ?? 'Tunggu konfirmasi dari tim kami (maksimal 1x24 jam)') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Instruksi Pembayaran (Baris 4)
        </label>
        <input 
            type="text" 
            name="instruction_4" 
            value="{{ old('instruction_4', $content['instruction_4'] ?? 'Tiket akan dikirim ke email Anda setelah pembayaran dikonfirmasi') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>
</div>



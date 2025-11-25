@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran - Info Konser')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                Konfirmasi Pembayaran
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Silakan lengkapi informasi pembayaran Anda
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column - Order Summary -->
            <div class="lg:col-span-7">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
                        Detail Pesanan
                    </h2>
                    
                    <!-- Concert Info -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                        <div class="flex gap-4">
                            <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex-shrink-0"></div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                    Festival Musik Nusantara
                                </h3>
                                <div class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                                    <p><i class="ri-calendar-line"></i> 15 Desember 2024, 19:00 WIB</p>
                                    <p><i class="ri-map-pin-line"></i> Jakarta Convention Center</p>
                                    <p><i class="ri-ticket-line"></i> Tipe: Regular (2x)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Subtotal (2x Tiket)</span>
                            <span class="text-gray-900 dark:text-gray-100 font-semibold">Rp 500.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Biaya Admin</span>
                            <span class="text-gray-900 dark:text-gray-100 font-semibold">Rp 10.000</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold border-t border-gray-200 dark:border-gray-700 pt-4">
                            <span class="text-gray-900 dark:text-gray-100">Total Pembayaran</span>
                            <span class="text-purple-600 dark:text-purple-400">Rp 510.000</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
                        Metode Pembayaran
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- Bank Transfer -->
                        <label class="flex items-center p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:border-purple-500 dark:hover:border-purple-500 transition-colors">
                            <input type="radio" name="payment_method" value="bank_transfer" class="w-5 h-5 text-purple-600 focus:ring-purple-500" checked>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">Transfer Bank</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">BCA, Mandiri, BNI, BRI</p>
                                    </div>
                                    <i class="ri-bank-line text-2xl"></i>
                                </div>
                            </div>
                        </label>

                        <!-- E-Wallet -->
                        <label class="flex items-center p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:border-purple-500 dark:hover:border-purple-500 transition-colors">
                            <input type="radio" name="payment_method" value="ewallet" class="w-5 h-5 text-purple-600 focus:ring-purple-500">
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">E-Wallet</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">OVO, GoPay, DANA, LinkAja</p>
                                    </div>
                                    <i class="ri-bank-card-line text-2xl"></i>
                                </div>
                            </div>
                        </label>

                        <!-- Credit Card -->
                        <label class="flex items-center p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer hover:border-purple-500 dark:hover:border-purple-500 transition-colors">
                            <input type="radio" name="payment_method" value="credit_card" class="w-5 h-5 text-purple-600 focus:ring-purple-500">
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">Kartu Kredit/Debit</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Visa, Mastercard, JCB</p>
                                    </div>
                                    <i class="ri-bank-card-line text-2xl"></i>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Right Column - Payment Form -->
            <div class="lg:col-span-5">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 sticky top-24 border border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-gray-100">
                        Informasi Pembayaran
                    </h2>
                    
                    <form action="{{ route('pembayaran-sukses') }}" method="GET" class="space-y-6">
                        <!-- Bank Account (shown when bank transfer selected) -->
                        <div id="bank-info" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Pilih Bank
                                </label>
                                <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option>BCA - 1234567890</option>
                                    <option>Mandiri - 0987654321</option>
                                    <option>BNI - 1122334455</option>
                                    <option>BRI - 5566778899</option>
                                </select>
                            </div>
                            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Nomor Rekening:</p>
                                <p class="text-lg font-bold text-purple-600 dark:text-purple-400">1234567890</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">a.n. Info Konser</p>
                            </div>
                        </div>

                        <!-- Upload Payment Proof -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Upload Bukti Pembayaran
                            </label>
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:border-purple-500 dark:hover:border-purple-500 transition-colors cursor-pointer">
                                <input type="file" accept="image/*" class="hidden" id="payment-proof">
                                <label for="payment-proof" class="cursor-pointer">
                                    <i class="ri-attachment-line text-4xl mb-2 block"></i>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Klik untuk upload atau drag & drop
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                        PNG, JPG maks. 5MB
                                    </p>
                                </label>
                            </div>
                        </div>

                        <!-- Payment Amount -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-400">Total yang harus dibayar:</span>
                                <span class="text-2xl font-bold text-purple-600 dark:text-purple-400">Rp 510.000</span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg"
                        >
                            Konfirmasi Pembayaran
                        </button>

                        <a 
                            href="{{ route('pembelian-tiket') }}" 
                            class="block text-center text-sm text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-colors"
                        >
                            Kembali ke Pembelian Tiket
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <!-- Payment Instructions -->
        <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6">
            <h3 class="font-semibold text-blue-900 dark:text-blue-100 mb-3 flex items-center gap-2">
                <i class="ri-information-line"></i>
                <span>Petunjuk Pembayaran</span>
            </h3>
            <ol class="list-decimal list-inside space-y-2 text-sm text-blue-800 dark:text-blue-200">
                <li>Transfer sesuai dengan total pembayaran ke rekening yang tertera</li>
                <li>Upload bukti pembayaran (screenshot atau foto struk transfer)</li>
                <li>Tunggu konfirmasi dari tim kami (maksimal 1x24 jam)</li>
                <li>Tiket akan dikirim ke email Anda setelah pembayaran dikonfirmasi</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const bankInfo = document.getElementById('bank-info');
        
        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                if (this.value === 'bank_transfer') {
                    bankInfo.style.display = 'block';
                } else {
                    bankInfo.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush


<!-- Footer -->
<footer class="relative z-10 bg-black/80 backdrop-blur-md border-t border-orange-500/30 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h4 class="text-2xl font-bold text-orange-400 mb-4 flex items-center gap-2">
                    <i class="ri-music-line"></i>
                    <span>Info Konser</span>
                </h4>
                <p class="text-sm">
                    Platform terpercaya untuk informasi konser dan event musik terbaru
                </p>
            </div>
            <div>
                <h5 class="text-orange-400 font-semibold mb-4">Tautan</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/') }}#konser" class="hover:text-orange-400 transition-colors">Konser</a></li>
                    <li><a href="{{ url('/') }}#artis" class="hover:text-orange-400 transition-colors">Artis</a></li>
                    <li><a href="{{ url('/') }}#tentang" class="hover:text-orange-400 transition-colors">Tentang</a></li>
                    <li><a href="{{ route('news') }}" class="hover:text-orange-400 transition-colors">News</a></li>
                    <li><a href="{{ route('pembelian-tiket') }}" class="hover:text-orange-400 transition-colors">Pembelian Tiket</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-orange-400 font-semibold mb-4">Bantuan</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-orange-400 transition-colors">FAQ</a></li>
                    <li><a href="#" class="hover:text-orange-400 transition-colors">Kontak</a></li>
                    <li><a href="#" class="hover:text-orange-400 transition-colors">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-orange-400 font-semibold mb-4">Ikuti Kami</h5>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-black/40 border border-orange-500/30 rounded-lg flex items-center justify-center hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                        <i class="ri-facebook-line text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-black/40 border border-orange-500/30 rounded-lg flex items-center justify-center hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                        <i class="ri-instagram-line text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-black/40 border border-orange-500/30 rounded-lg flex items-center justify-center hover:bg-orange-500/20 hover:border-orange-500/50 transition-all text-orange-400">
                        <i class="ri-twitter-x-line text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-orange-500/30 mt-8 pt-8 text-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} Info Konser. All rights reserved.</p>
        </div>
    </div>
</footer>


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pembelian-tiket', function () {
    return view('pembelian-tiket');
})->name('pembelian-tiket');

Route::get('/news', function () {
    $featuredNews = \App\Models\News::where('is_published', true)
        ->where('is_featured', true)
        ->orderBy('published_date', 'desc')
        ->first();
    
    $latestNews = \App\Models\News::where('is_published', true)
        ->where(function($query) use ($featuredNews) {
            if ($featuredNews) {
                $query->where('id', '!=', $featuredNews->id);
            }
        })
        ->orderBy('published_date', 'desc')
        ->take(6)
        ->get();
    
    return view('news', compact('featuredNews', 'latestNews'));
})->name('news');

Route::get('/news/{slug}', function ($slug) {
    // Cari dari database terlebih dahulu
    $news = \App\Models\News::where('slug', $slug)
        ->where('is_published', true)
        ->first();
    
    if ($news) {
        // Increment views
        $news->increment('views');
        
        $post = [
            'title' => $news->title,
            'date' => $news->formatted_date,
            'author' => $news->author,
            'category' => $news->category,
            'image' => $news->image,
            'content' => $news->content,
        ];
        
        // Get related posts (same category, exclude current post)
        $relatedNews = \App\Models\News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->where('category', $news->category)
            ->orderBy('published_date', 'desc')
            ->take(2)
            ->get();
        
        // If not enough related posts, get latest posts
        if ($relatedNews->count() < 2) {
            $additionalNews = \App\Models\News::where('is_published', true)
                ->where('id', '!=', $news->id)
                ->whereNotIn('id', $relatedNews->pluck('id'))
                ->orderBy('published_date', 'desc')
                ->take(2 - $relatedNews->count())
                ->get();
            $relatedNews = $relatedNews->merge($additionalNews);
        }
        
        // Get next post
        $nextNews = \App\Models\News::where('is_published', true)
            ->where('id', '>', $news->id)
            ->orderBy('id', 'asc')
            ->first();
        
        return view('news-detail', compact('post', 'slug', 'relatedNews', 'nextNews'));
    }
    
    // Fallback ke data statis (untuk backward compatibility)
    $posts = [
        'festival-musik-nusantara-2024' => [
            'title' => 'Festival Musik Nusantara 2024: Lineup Lengkap Diumumkan',
            'date' => '15 Desember 2024',
            'author' => 'Admin',
            'category' => 'Featured',
            'image' => 'orange',
            'content' => '<p>Festival Musik Nusantara 2024 akan menghadirkan lebih dari 50 artis ternama dari berbagai genre. Event yang akan digelar di Jakarta Convention Center ini menjanjikan pengalaman musik yang tak terlupakan dengan teknologi sound system terdepan.</p>
            
            <p>Acara yang digelar selama 3 hari berturut-turut ini akan menampilkan berbagai genre musik mulai dari pop, rock, jazz, hingga musik tradisional Indonesia. Para pengunjung akan disuguhkan dengan pertunjukan spektakuler dari artis-artis papan atas tanah air.</p>
            
            <h3>Lineup Artis</h3>
            <p>Beberapa artis yang sudah dikonfirmasi akan tampil antara lain:</p>
            <ul>
                <li>Artis Populer A - Panggung Utama</li>
                <li>Band Rock Terkenal B - Panggung Rock</li>
                <li>Musisi Jazz C - Panggung Jazz</li>
                <li>Dan masih banyak lagi...</li>
            </ul>
            
            <p>Tiket sudah mulai dijual secara online dan offline. Jangan lewatkan kesempatan untuk menyaksikan event musik terbesar tahun ini!</p>'
        ],
        'konser-rock-night-bandung' => [
            'title' => 'Konser Rock Night: Sukses Besar di Bandung',
            'date' => '12 Desember 2024',
            'author' => 'Admin',
            'category' => 'Hot',
            'image' => 'orange',
            'content' => '<p>Konser Rock Night yang digelar di Gedung Sate Bandung berhasil menarik lebih dari 10.000 penonton. Event ini menampilkan berbagai band rock terbaik Indonesia.</p>
            
            <p>Acara yang berlangsung selama 6 jam ini menghadirkan 15 band rock terkenal yang memukau penonton dengan performa mereka. Suasana malam yang penuh energi membuat penonton tidak berhenti bergoyang sepanjang konser.</p>
            
            <h3>Highlights Acara</h3>
            <p>Beberapa momen yang paling berkesan dari konser ini:</p>
            <ul>
                <li>Penampilan kolaborasi antara beberapa band</li>
                <li>Light show yang spektakuler</li>
                <li>Interaksi langsung antara artis dan penonton</li>
            </ul>
            
            <p>Konser ini membuktikan bahwa musik rock masih memiliki tempat istimewa di hati pecinta musik Indonesia. Event serupa direncanakan akan digelar di kota-kota lain dalam waktu dekat.</p>'
        ],
        'jazz-blues-festival-yogyakarta' => [
            'title' => 'Jazz & Blues Festival Kembali Digelar',
            'date' => '10 Desember 2024',
            'author' => 'Admin',
            'category' => 'New',
            'image' => 'orange',
            'content' => '<p>Setelah sukses tahun lalu, Jazz & Blues Festival akan kembali digelar di Yogyakarta dengan lineup yang lebih spektakuler dan venue yang lebih besar.</p>
            
            <p>Festival tahun ini akan diadakan di venue baru yang lebih luas dengan kapasitas hingga 8.000 penonton. Acara akan berlangsung selama 2 hari dengan berbagai sesi pertunjukan dari pagi hingga malam.</p>
            
            <h3>Yang Baru di Festival Ini</h3>
            <ul>
                <li>Venue baru yang lebih luas dan nyaman</li>
                <li>Lineup artis internasional</li>
                <li>Workshop musik jazz dan blues</li>
                <li>Food court dengan berbagai pilihan kuliner</li>
            </ul>
            
            <p>Tiket early bird sudah habis terjual dalam waktu singkat. Masih tersedia tiket reguler yang bisa dibeli melalui website resmi atau outlet terdekat.</p>'
        ],
        'tips-beli-tiket-online' => [
            'title' => 'Tips Membeli Tiket Konser Online dengan Aman',
            'date' => '8 Desember 2024',
            'author' => 'Admin',
            'category' => 'Update',
            'image' => 'orange',
            'content' => '<p>Panduan lengkap untuk membeli tiket konser online dengan aman dan terhindar dari penipuan. Pelajari cara memilih platform terpercaya.</p>
            
            <h3>1. Pilih Platform Resmi</h3>
            <p>Selalu beli tiket dari platform resmi atau website yang terpercaya. Hindari membeli dari penjual individual di media sosial tanpa verifikasi.</p>
            
            <h3>2. Periksa Harga Normal</h3>
            <p>Jika harga tiket terlalu murah atau terlalu mahal dari harga normal, waspada. Harga yang tidak wajar bisa menjadi tanda penipuan.</p>
            
            <h3>3. Verifikasi Informasi Event</h3>
            <p>Pastikan informasi event yang Anda beli sesuai dengan yang diumumkan secara resmi. Periksa tanggal, lokasi, dan lineup artis.</p>
            
            <h3>4. Gunakan Metode Pembayaran Aman</h3>
            <p>Gunakan metode pembayaran yang aman seperti kartu kredit atau e-wallet resmi. Hindari transfer langsung ke rekening pribadi.</p>
            
            <h3>5. Simpan Bukti Transaksi</h3>
            <p>Selalu simpan bukti transaksi dan konfirmasi pembayaran. Ini akan membantu jika terjadi masalah di kemudian hari.</p>'
        ],
        'electronic-music-festival' => [
            'title' => 'Electronic Music Festival: Lineup Internasional',
            'date' => '5 Desember 2024',
            'author' => 'Admin',
            'category' => 'Event',
            'image' => 'orange',
            'content' => '<p>Electronic Music Festival akan menghadirkan DJ internasional ternama dari berbagai negara. Event ini akan digelar di Jakarta dengan teknologi lighting canggih.</p>
            
            <p>Festival elektronik terbesar di Indonesia ini akan berlangsung selama 12 jam non-stop dengan berbagai stage yang menampilkan genre musik elektronik berbeda.</p>
            
            <h3>DJ Internasional yang Akan Tampil</h3>
            <ul>
                <li>DJ A - House Music</li>
                <li>DJ B - Techno</li>
                <li>DJ C - Trance</li>
                <li>DJ D - Dubstep</li>
            </ul>
            
            <h3>Fasilitas Festival</h3>
            <p>Event ini dilengkapi dengan:</p>
            <ul>
                <li>Sound system kelas dunia</li>
                <li>Lighting show spektakuler</li>
                <li>VIP area dengan view terbaik</li>
                <li>Food & beverage stand</li>
            </ul>
            
            <p>Tiket sudah mulai dijual. Jangan lewatkan kesempatan untuk merasakan pengalaman festival elektronik terbaik!</p>'
        ],
        'venue-baru-surabaya' => [
            'title' => 'Venue Baru untuk Konser di Surabaya',
            'date' => '3 Desember 2024',
            'author' => 'Admin',
            'category' => 'Info',
            'image' => 'orange',
            'content' => '<p>Venue baru dengan kapasitas 15.000 penonton akan segera dibuka di Surabaya. Venue ini dilengkapi dengan teknologi audio dan visual terdepan.</p>
            
            <p>Venue yang dibangun dengan investasi besar ini dirancang khusus untuk konser dan event musik besar. Lokasinya strategis di pusat kota Surabaya dengan akses transportasi yang mudah.</p>
            
            <h3>Fasilitas Venue</h3>
            <ul>
                <li>Kapasitas 15.000 penonton</li>
                <li>Sound system profesional</li>
                <li>LED screen besar</li>
                <li>Parkir luas untuk 5.000 kendaraan</li>
                <li>Food court dan restoran</li>
            </ul>
            
            <h3>Event Pertama</h3>
            <p>Venue ini akan dibuka dengan konser besar yang menampilkan berbagai artis ternama. Tiket sudah mulai dijual dan diperkirakan akan laris manis.</p>
            
            <p>Dengan adanya venue baru ini, Surabaya semakin memperkuat posisinya sebagai salah satu kota tujuan utama untuk event musik besar di Indonesia.</p>'
        ],
        'artis-lokal-mendunia' => [
            'title' => 'Artis Lokal Mendunia: Prestasi di Kancah Internasional',
            'date' => '1 Desember 2024',
            'author' => 'Admin',
            'category' => 'Trending',
            'image' => 'orange',
            'content' => '<p>Beberapa artis Indonesia berhasil menorehkan prestasi di kancah internasional dengan meraih penghargaan dan menggelar konser di berbagai negara.</p>
            
            <h3>Prestasi di Tahun 2024</h3>
            <p>Tahun 2024 menjadi tahun yang membanggakan bagi musik Indonesia. Beberapa artis berhasil meraih prestasi internasional:</p>
            
            <ul>
                <li>Artis A meraih penghargaan Best Asian Artist</li>
                <li>Band B melakukan world tour di 20 negara</li>
                <li>Musisi C berkolaborasi dengan artis internasional ternama</li>
            </ul>
            
            <h3>Konser Internasional</h3>
            <p>Beberapa artis Indonesia juga berhasil menggelar konser di berbagai negara seperti Singapura, Malaysia, Thailand, dan bahkan Eropa. Ini membuktikan bahwa musik Indonesia memiliki daya tarik internasional.</p>
            
            <h3>Dampak Positif</h3>
            <p>Kesuksesan artis Indonesia di kancah internasional membawa dampak positif bagi industri musik tanah air. Semakin banyak artis muda yang terinspirasi untuk go international.</p>
            
            <p>Dengan prestasi ini, musik Indonesia semakin dikenal dan dihargai di dunia internasional.</p>'
        ]
    ];
    
    $post = $posts[$slug] ?? null;
    
    if (!$post) {
        abort(404);
    }
    
    $relatedNews = collect([]); // Empty collection for static posts
    $nextNews = null; // No next post for static posts
    
    return view('news-detail', compact('post', 'slug', 'relatedNews', 'nextNews'));
})->name('news.detail');

Route::get('/konfirmasi-pembayaran', function () {
    return view('konfirmasi-pembayaran');
})->name('konfirmasi-pembayaran');

Route::get('/pembayaran-sukses', function () {
    return view('pembayaran-sukses');
})->name('pembayaran-sukses');

Route::get('/pembayaran-gagal', function () {
    return view('pembayaran-gagal');
})->name('pembayaran-gagal');

// Public login route (redirects to admin login)
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Admin Authentication Routes (Public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes (Require Authentication & Admin Role)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin.role'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::prefix('page-content')->name('page-content.')->group(function () {
        Route::get('/', [PageContentController::class, 'index'])->name('index');
        Route::get('/{pageName}/edit', [PageContentController::class, 'edit'])->name('edit');
        Route::put('/{pageName}', [PageContentController::class, 'update'])->name('update');
    });
    
    // Event Routes
    Route::resource('events', EventController::class)->names([
        'index' => 'events.index',
        'create' => 'events.create',
        'store' => 'events.store',
        'show' => 'events.show',
        'edit' => 'events.edit',
        'update' => 'events.update',
        'destroy' => 'events.destroy',
    ]);
    
    // News Routes
    Route::resource('news', NewsController::class)->names([
        'index' => 'news.index',
        'create' => 'news.create',
        'store' => 'news.store',
        'show' => 'news.show',
        'edit' => 'news.edit',
        'update' => 'news.update',
        'destroy' => 'news.destroy',
    ]);
    
    // News Image Upload Route
    Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])->name('news.upload-image');
});

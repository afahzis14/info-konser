<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pembelian-tiket', function () {
    return view('pembelian-tiket');
})->name('pembelian-tiket');

Route::get('/news', function () {
    return view('news');
})->name('news');

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
});

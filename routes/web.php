<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MitraController;

// ════════ RUTE PUBLIK ════════
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact-send', [PagesController::class, 'sendContact'])->name('contact.send');
Route::get('/portofolio', [PagesController::class, 'portofolio'])->name('portofolio');

// ════════ RUTE AUTH ════════
// Jika user belum login & mencoba mengakses halaman tertutup, 
// Laravel akan melemparnya ke route bernama 'login'.
Route::get('/login', function () {
    return redirect('/')->withErrors(['login_error' => 'Akses ditolak. Silakan masuk ke akun Anda terlebih dahulu.']);
})->name('login.get');

// Rute untuk proses pengiriman data form (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ════════ RUTE PELANGGAN ════════
Route::middleware(['auth'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [PelangganController::class, 'dashboard'])->name('dashboard');
    Route::get('/setor', [PelangganController::class, 'create'])->name('setor');
    Route::post('/setor', [PelangganController::class, 'store'])->name('setor.store');
    Route::get('/detail/{id}', [PelangganController::class, 'show'])->name('detail');
    Route::get('/edit/{id}', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [PelangganController::class, 'update'])->name('update');
    Route::delete('/hapus/{id}', [PelangganController::class, 'destroy'])->name('hapus');
});

// ════════ RUTE MITRA ════════
Route::middleware(['auth'])->prefix('mitra')->name('mitra.')->group(function () {
    // Halaman Tampilan
    Route::get('/dashboard', [MitraController::class, 'dashboard'])->name('dashboard');
    Route::get('/tugas', [MitraController::class, 'tugas'])->name('tugas');
    Route::get('/riwayat', [MitraController::class, 'riwayat'])->name('riwayat');
    
    // Aksi / Proses Form (Method POST)
    Route::post('/ambil-tugas/{id}', [MitraController::class, 'ambilTugas'])->name('ambilTugas');
    Route::post('/validasi/{id}', [MitraController::class, 'validasi'])->name('validasi');
    Route::post('/selesai/{id}', [MitraController::class, 'selesai'])->name('selesai');
    Route::post('/batalkan/{id}', [MitraController::class, 'batalkan'])->name('batalkan'); // Ini rute yang tadi error
});

// ════════ RUTE PROFIL TIM GREASYCLE ════════
Route::get('/profile/elvina', [PagesController::class, 'profileElvina'])->name('profile.elvina');
Route::get('/profile/zahlul', [PagesController::class, 'profileZahlul'])->name('profile.zahlul');
Route::get('/profile/indi', [PagesController::class, 'profileIndi'])->name('profile.indi');
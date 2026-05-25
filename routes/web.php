<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PelangganController; 

// =========================================================================
// JALUR RUTE PUBLIK (Menggunakan PagesController)
// =========================================================================
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact-send', [PagesController::class, 'sendContact'])->name('contact.send');
Route::get('/portofolio', [PagesController::class, 'portofolio'])->name('portofolio');

// REVISI: Mengalihkan rute profil tim agar diatur secara rapi oleh PagesController
Route::get('/profile/elvina', [PagesController::class, 'profileElvina'])->name('profile.elvina');
Route::get('/profile/zahlul', [PagesController::class, 'profileZahlul'])->name('profile.zahlul');
Route::get('/profile/indi', [PagesController::class, 'profileIndi'])->name('profile.indi');

// =========================================================================
// JALUR MASUK SESI AKUN (Menggunakan AuthController)
// =========================================================================
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =========================================================================
// JALUR PROTEKSI PORTAL KHUSUS PELANGGAN (Menggunakan PelangganController)
// =========================================================================
Route::middleware(['auth'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [PelangganController::class, 'dashboard'])->name('dashboard');
    Route::get('/setor', [PelangganController::class, 'create'])->name('setor');
    Route::post('/setor', [PelangganController::class, 'store'])->name('setor.store');
    Route::get('/transaksi/{id}', [PelangganController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/{id}/edit', [PelangganController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [PelangganController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [PelangganController::class, 'destroy'])->name('transaksi.destroy');
});
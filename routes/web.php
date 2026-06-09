<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MitraController;

// Rute Publik
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact-send', [PagesController::class, 'sendContact'])->name('contact.send');
Route::get('/portofolio', [PagesController::class, 'portofolio'])->name('portofolio');

// Rute Auth
// Rute Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']); 
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Pelanggan
Route::middleware(['auth'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [PelangganController::class, 'dashboard'])->name('dashboard');
    Route::get('/setor', [PelangganController::class, 'create'])->name('setor');
    Route::post('/setor', [PelangganController::class, 'store'])->name('setor.store');
    Route::get('/detail/{id}', [PelangganController::class, 'show'])->name('detail');
    Route::get('/edit/{id}', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [PelangganController::class, 'update'])->name('update');
    Route::delete('/hapus/{id}', [PelangganController::class, 'destroy'])->name('hapus');
});

// Rute Mitra
// Rute Mitra - SEMENTARA tanpa middleware untuk test
Route::middleware(['auth'])->prefix('mitra')->name('mitra.')->group(function () {
    Route::get('/dashboard', [MitraController::class, 'dashboard'])->name('dashboard');
    Route::get('/tugas', [MitraController::class, 'tugas'])->name('tugas');
    Route::get('/riwayat', [MitraController::class, 'riwayat'])->name('riwayat');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // OTOMATIS LOGIN SEBAGAI PELANGGAN (Masyito Indi Kartika) YANG KITA BUAT DI SEEDER TADI
    $user = User::where('role', 'pelanggan')->first();
    Auth::login($user);
    
    return redirect()->route('pelanggan.dashboard');
});

Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [PelangganController::class, 'dashboard'])->name('dashboard');
    Route::get('/setor', [PelangganController::class, 'create'])->name('setor');
    Route::post('/setor', [PelangganController::class, 'store'])->name('setor.store');
    Route::get('/transaksi/{id}', [PelangganController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/{id}/edit', [PelangganController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [PelangganController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [PelangganController::class, 'destroy'])->name('transaksi.destroy');
});
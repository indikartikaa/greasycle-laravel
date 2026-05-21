<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreasycleController;

// Menampilkan tabel produk/setoran
Route::get('/', [GreasycleController::class, 'index']);
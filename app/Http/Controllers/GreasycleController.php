<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreasycleController extends Controller
{
    public function index()
    {
        // Data simulasi agar tabel terisi (Non-DB)
        $dataProduk = [
            ['nama' => 'Minyak Jelantah Kelapa', 'stok' => 25, 'harga' => 15000],
            ['nama' => 'Minyak Jelantah Sawit', 'stok' => 25, 'harga' => 15000],
            ['nama' => 'Minyak Jelantah Restoran', 'stok' => 25, 'harga' => 15000],
            ['nama' => 'Minyak Jelantah Rumah Tangga', 'stok' => 25, 'harga' => 15000],
        ];

        return view('setor', ['produks' => $dataProduk]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Data Admin
        User::create([
            'nama' => 'Admin Greasycle',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'), // Password otomatis di-enkripsi aman oleh Laravel
            'role' => 'admin',
            'no_telp' => '081234567890'
        ]);

        // Data Pelanggan
        User::create([
            'nama' => 'Masyito Indi Kartika',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'pelanggan',
            'no_telp' => '089876543210'
        ]);

        // Data Mitra
        User::create([
            'nama' => 'Mitra Driver Greasycle',
            'email' => 'mitra@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'mitra',
            'no_telp' => '085112233445'
        ]);
    }
}
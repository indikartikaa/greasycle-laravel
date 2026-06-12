<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // public $timestamps = false; // Dihapus/dicomment karena migration menggunakan $table->timestamps()

    protected $fillable = [
        'nama', 
        'no_telp', 
        'email', 
        'password', 
        'role',
        'alamat',         // Kolom baru
        'nama_usaha',     // Kolom baru
        'dokumen_mitra',  // Kolom baru
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
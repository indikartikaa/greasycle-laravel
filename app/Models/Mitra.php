<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra'; // Karena nama tabelnya tunggal, bukan jamak (mitras)

    protected $fillable = [
        'user_id',
        'wilayah',
        'no_kendaraan',
        'status',
    ];
}
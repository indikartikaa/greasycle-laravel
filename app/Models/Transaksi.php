<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'mitra_id',
        'volume',
        'alamat_jemput',
        'tgl_request',
        'batas_jemput',
        'catatan',
        'status',
    ];
}
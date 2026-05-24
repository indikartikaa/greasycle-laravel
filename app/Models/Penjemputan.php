<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    protected $table = 'penjemputan';

    protected $fillable = [
        'transaksi_id',
        'mitra_id',
        'volume_aktual',
        'tanggal_jemput',
        'saldo_diberikan',
        'status',
        'catatan_mitra',
    ];
}
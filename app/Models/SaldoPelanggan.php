<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaldoPelanggan extends Model
{
    protected $table = 'saldo_pelanggan';

    protected $fillable = [
        'user_id',
        'total_saldo',
    ];
}
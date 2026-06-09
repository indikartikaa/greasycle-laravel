<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id', 'mitra_id', 'volume', 'alamat_jemput',
        'tgl_request', 'batas_jemput', 'catatan', 'status'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }

    public function penjemputan()
    {
        return $this->hasOne(Penjemputan::class, 'transaksi_id');
    }
}
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
    'status',
    'catatan_mitra',
    'saldo_diberikan', // <-- Tambahkan ini
];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }
}
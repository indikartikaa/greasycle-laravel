<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjemputan', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->foreignId('mitra_id')->constrained('mitra')->onDelete('cascade');
            $table->decimal('volume_aktual', 5, 2);
            $table->date('tanggal_jemput');
            $table->decimal('saldo_diberikan', 10, 2);
            $table->enum('status', ['proses', 'selesai']);
            $table->text('catatan_mitra')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjemputan');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mitra_id')->nullable()->constrained('mitra')->onDelete('set null'); 
            $table->decimal('volume', 5, 2);
            $table->text('alamat_jemput');
            $table->date('tgl_request');
            $table->date('batas_jemput')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['menunggu', 'dijemput', 'selesai'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
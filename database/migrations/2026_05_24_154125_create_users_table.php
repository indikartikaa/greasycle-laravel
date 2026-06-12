<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            
            // Tambahkan 'usaha' di dalam pilihan enum role
            $table->enum('role', ['admin', 'pelanggan', 'usaha', 'mitra']);
            $table->string('no_telp', 20)->nullable();
            
            // ══════ TAMBAHAN KOLOM BARU ══════
            $table->text('alamat'); // Wajib untuk pelanggan, usaha, mitra
            $table->string('nama_usaha', 150)->nullable(); // Opsional, khusus role 'usaha'
            $table->string('dokumen_mitra', 255)->nullable(); // Opsional, khusus role 'mitra'
            // ═════════════════════════════════
            
            $table->rememberToken();
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
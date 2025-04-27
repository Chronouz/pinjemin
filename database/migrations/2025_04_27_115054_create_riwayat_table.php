<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('barang_id'); // Foreign key ke tabel barang
            $table->unsignedBigInteger('pemilik_id'); // Foreign key ke tabel users (pemilik)
            $table->unsignedBigInteger('peminjam_id'); // Foreign key ke tabel users (peminjam)
            $table->text('pesan')->nullable(); // Pesan tambahan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Relasi ke tabel barang
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            // Relasi ke tabel users (pemilik)
            $table->foreign('pemilik_id')->references('id')->on('users')->onDelete('cascade');
            // Relasi ke tabel users (peminjam)
            $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};

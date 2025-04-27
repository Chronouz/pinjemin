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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('image_path'); // Untuk menyimpan path gambar
            $table->string('name');
            $table->text('description');
            $table->decimal('cost', 10, 2);
            $table->string('location');
            $table->string('category');
            $table->integer('stock');
            $table->string('condition');
            $table->string('link'); // Untuk menyimpan link
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};

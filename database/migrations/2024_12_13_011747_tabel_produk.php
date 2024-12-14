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
    Schema::create('produk', function (Blueprint $table) {
        $table->string('kode_produk', 5)->primary(); // Kolom kode_produk, panjang 5 karakter
        $table->string('nama_produk', 50); // Kolom nama_produk, panjang 50 karakter
        $table->string('kode_kategori', 5); // Kolom kategori, panjang 5 karakter
        $table->integer('harga'); // Kolom harga, integer tanpa tanda
        $table->integer('stok'); // Kolom stok, integer tanpa tanda
        $table->timestamps(); // Kolom created_at dan updated_at
    });  
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};

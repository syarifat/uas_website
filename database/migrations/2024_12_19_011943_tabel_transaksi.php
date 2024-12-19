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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->increments('id_transaksi'); // Primary key AUTO_INCREMENT
        $table->string('kode_produk', 50)->nullable(); // Kolom kode_produk, nullable
        $table->integer('harga')->nullable(); // Kolom harga
        $table->integer('jumlah')->nullable(); // Kolom jumlah
        $table->integer('total_harga')->storedAs('harga * jumlah'); // Kolom total_harga, generated otomatis
        $table->date('tanggal')->nullable(); // Kolom tanggal
        $table->string('kasir', 50)->nullable(); // Kolom kasir

        // Index (opsional, jika sering query berdasarkan kolom tertentu)
        $table->index('kode_produk');
        $table->index('tanggal');
    });  
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

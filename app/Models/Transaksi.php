<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Tentukan table yang terkait dengan model ini
    protected $table = 'transaksi';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_transaksi',
        'kode_produk',
        'harga',
        'jumlah',
        'total_harga',
        'tanggal',
        'kasir'
    ];

    // Relasi dengan tabel Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }
    
}

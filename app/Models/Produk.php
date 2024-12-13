<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'kode_produk';
    protected $fillable = ['kode_produk', 'nama_produk, kategori, harga, stok'];
}

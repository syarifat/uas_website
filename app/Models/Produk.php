<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'kode_produk';
    protected $fillable = ['kode_produk', 'nama_produk', 'kode_kategori', 'harga', 'stok'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
    }
}

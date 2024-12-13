<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'kode_kategori';
    protected $fillable = ['kode_kategori', 'nama_kategori'];

    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
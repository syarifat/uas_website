<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'tanggal_transaksi',
        'total',
    ];

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    public function getTransaksiDetails()
    {
        // Use the query builder to join the tables
        $transaksis = DB::table('transaksi as t')
                        ->join('detail_transaksi as dt', 't.id_transaksi', '=', 'dt.id_transaksi')
                        ->select('t.id_transaksi', 't.nama_produk', 'dt.jumlah', 't.harga', 't.nama_pembeli')
                        ->get();

        // Display the results
        foreach ($transaksis as $transaksi) {
            echo "ID Transaksi: {$transaksi->id_transaksi}, ";
            echo "Nama Produk: {$transaksi->nama_produk}, ";
            echo "Jumlah: {$transaksi->jumlah}, ";
            echo "Harga: {$transaksi->harga}, ";
            echo "Nama Pembeli: {$transaksi->nama_pembeli}<br>";
        }
    }
}
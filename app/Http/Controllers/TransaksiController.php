<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TransaksiController extends Controller
{
        public function index()
    {
        $transaksiData = DB::table('detail_transaksi')
            ->join('transaksi', 'detail_transaksi.id_transaksi', '=', 'transaksi.id_transaksi')
            ->select(
                'detail_transaksi.id_transaksi',
                'detail_transaksi.nama_produk',
                'detail_transaksi.jumlah',
                'detail_transaksi.harga',
                'transaksi.nama_pembeli',
                'transaksi.tanggal_transaksi',  // Menambahkan tanggal transaksi
                'transaksi.nama_pembeli',        // Nama pembeli
                'transaksi.nama_kasir'           // Nama kasir
            )
            ->get();

        // Menambahkan kolom Total Harga
        foreach ($transaksiData as $data) {
            $data->total_harga = $data->jumlah * $data->harga;  // Hitung total harga (jumlah * harga per pcs)
        }

        return view('transaksi.index', compact('transaksiData'));
    }

}

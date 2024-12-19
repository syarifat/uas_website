<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    // Method untuk menampilkan halaman transaksi summary
    public function index()
    {
        // Ambil data transaksi dan join dengan produk untuk mendapatkan nama produk
        $transaksiData = Transaksi::with('produk')->get();

        // Kembalikan view dengan data transaksi
        return view('transaksi.index', compact('transaksiData'));
    }
}

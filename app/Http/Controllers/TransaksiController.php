<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = $request->input('cart');

        if (!$cart || !is_array($cart)) {
            return response()->json(['message' => 'Keranjang kosong atau tidak valid'], 400);
        }

        foreach ($cart as $item) {
            // Cari produk berdasarkan ID
            $produk = Produk::find($item['id']);

            if (!$produk) {
                return response()->json(['message' => "Produk dengan ID {$item['id']} tidak ditemukan"], 404);
            }

            // Periksa apakah stok cukup
            if ($produk->stok < $item['jumlah']) {
                return response()->json(['message' => "Stok untuk produk {$produk->nama_produk} tidak cukup"], 400);
            }

            // Kurangi stok
            $produk->stok -= $item['jumlah'];
            $produk->save();
        }

        return response()->json(['message' => 'Transaksi berhasil!']);
    }
}


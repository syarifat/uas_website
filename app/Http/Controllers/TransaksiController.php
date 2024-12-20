<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;

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

    public function store(Request $request)
    {
        $cart = $request->input('cart'); // Ambil data keranjang dari request

        // Cek jika cart kosong
        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong.']);
        }

        // Mulai transaksi untuk setiap item di cart
        foreach ($cart as $item) {
            Transaksi::create([
                'kode_produk' => $item['kode_produk'],
                'harga' => $item['harga'],
                'jumlah' => $item['jumlah'],
                'total_harga' => $item['total_harga'],
                'tanggal' => Carbon::now()->toDateTimeString(), // Menggunakan waktu server saat ini
                //'kasir' => auth()->user()->name, // Ambil nama kasir dari session login jika ada
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Checkout berhasil!']);
    }

    public function getChartData()
    {
    $data = DB::table('transaksi')
        ->select(DB::raw('DATE(tanggal) as tanggal'), DB::raw('SUM(total_harga) as total'))
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

    return response()->json($data);
    }
}

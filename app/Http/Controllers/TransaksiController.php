<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil data transaksi dan join dengan produk untuk mendapatkan nama produk
        $transaksiData = Transaksi::with('produk')->get();
// 
        // Kembalikan view dengan data transaksi
        return view('debugging', compact('transaksiData'));
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Produk::where('nama_produk', 'like', '%' . $search . '%')->get();

        return response()->json($products);
    }

    // Method to handle the checkout process
    public function checkout(Request $request)
{
    $cart = $request->get('cart');

    // Validasi input
    if (!$cart || count($cart) === 0) {
        return response()->json(['success' => false, 'message' => 'Keranjang kosong!']);
    }

    try {
        // Mulai transaksi database
        DB::beginTransaction();

        foreach ($cart as $item) {
            // Cari produk berdasarkan kode produk
            $produk = Produk::where('kode_produk', $item['kode_produk'])->first();

            if (!$produk) {
                // Produk tidak ditemukan
                return response()->json([
                    'success' => false,
                    'message' => "Produk dengan kode {$item['kode_produk']} tidak ditemukan."
                ]);
            }

            // Validasi stok
            if ($item['jumlah'] > $produk->stok) {
                return response()->json([
                    'success' => false,
                    'message' => "Stok produk {$produk->nama_produk} tidak mencukupi. Stok tersedia: {$produk->stok}, jumlah diminta: {$item['jumlah']}."
                ]);
            }

            // Simpan transaksi ke tabel
            DB::table('transaksi')->insert([
                'kode_produk' => $item['kode_produk'],
                'harga' => $item['harga'],
                'jumlah' => $item['jumlah'],
                'total_harga' => $item['total_harga'],
                'kasir' => "Ridho", // Ganti dengan nama kasir sesuai kebutuhan
            ]);

            // Kurangi stok produk
            $produk->stok -= $item['jumlah'];
            $produk->save();
        }

        // Komit transaksi
        DB::commit();

        return response()->json(['success' => true, 'message' => 'Checkout berhasil!']);
    } catch (\Exception $e) {
        // Rollback jika terjadi kesalahan
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menyimpan transaksi.',
            'error' => $e->getMessage()
        ]);
    }
}

    public function showlaporan()
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

}

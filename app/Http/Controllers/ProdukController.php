<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon; // Tambahkan Carbon untuk manipulasi tanggal
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    public function lihat(){
    $data = Produk::with('kategori')->get();
    return view('produk.lihat', ['dataProduk' => $data]);
    }

    public function showLaporan(){
    $produk = Produk::all(); // Mengambil semua data produk
    return view('laporan.produk', compact('produk')); // Produk tetap dipassing sebagai $products
    }

    public function exportExcel(){
        return Excel::download(new ProdukExport, 'laporan_produk.xlsx');
    }
    
    public function destroy($kode_produk){
        $data = Produk::find($kode_produk);
        $data->delete();
        return redirect()->route('produk.lihat'); // Redirect to the product list
    }

    public function edit($kode_produk){
        $data = Produk::find($kode_produk);
        $kategori = Kategori::all();
        return view('produk.edit', ['data' => $data, 'kat' => $kategori]);
    }

    public function tambah(){
    $kategori = Kategori::all();  // Ambil semua kategori
    return view('produk.tambah', compact('kategori'));
    }

    
    public function store(Request $request){
    // Validasi data
    $request->validate([
        'kode_produk' => 'required|unique:produk,kode_produk',
        'nama_produk' => 'required|string|max:255',
        'kategori' => 'required|exists:kategori,kode_kategori',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
    ]);

    // Simpan data ke database
    Produk::create([
        'kode_produk' => $request->kode_produk,
        'nama_produk' => $request->nama_produk,
        'kode_kategori' => $request->kategori,
        'harga' => $request->harga,
        'stok' => $request->stok
    ]);

    return redirect()->route('produk.lihat')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $kode_produk){
    // Ambil data berdasarkan kode produk
        $data = Produk::find($kode_produk);

    // Update kolom-kolom sesuai request
        $data->nama_produk = $request->nama_produk;
        $data->kode_kategori = $request->kategori;
        $data->harga = $request->harga;
        $data->stok = $request->stok;

    // Update kolom created_at menjadi waktu sekarang
        $data->created_at = Carbon::now();

    // Simpan perubahan
        $data->update();

    // Redirect dengan pesan sukses
        return redirect('/produk/tambah')->with('success', 'Data berhasil diubah');
    }


    public function cariProduk(Request $request)
{
    $search = $request->query('search');
    if (!$search) {
        return response()->json([]);
    }

    $results = Produk::where('nama_produk', 'like', "%{$search}%")->get();
    return response()->json($results);
}

    
    public function simpanTransaksi(Request $request)
    {
    $keranjang = $request->keranjang;

    if (empty($keranjang)) {
        return response()->json(['message' => 'Keranjang kosong!'], 400);
    }

    $totalHarga = 0;

    // Simpan data transaksi
    $transaksi = Transaksi::create([
        'tanggal_transaksi' => now(),
    ]);

    // Simpan detail transaksi
    foreach ($keranjang as $item) {
        $produk = Produk::find($item['id']);

        if (!$produk) {
            continue;
        }

        // Kurangi stok
        $produk->stok -= $item['jumlah'];
        $produk->save();

        $totalHarga += $produk->harga * $item['jumlah'];

        // DetailTransaksi::create([
        //     'transaksi_id' => $transaksi->id,
        //     'produk_id' => $produk->id,
        //     'jumlah' => $item['jumlah'],
        //     'harga' => $produk->harga,
        // ]);
    }

    $transaksi->total = $totalHarga;
    $transaksi->save();

    return response()->json(['message' => 'Transaksi berhasil disimpan!', 'transaksi' => $transaksi]);
}


}

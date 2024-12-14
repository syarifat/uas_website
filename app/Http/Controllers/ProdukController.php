<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function lihat(){
    $data = Produk::with('kategori')->get();
    return view('produk.lihat', ['dataProduk' => $data]);
    }

    
    public function destroy($kode_produk){
        $data = Produk::find($kode_produk);
        $data->delete();
        return redirect()->route('produk.lihat'); // Redirect to the product list
    }

    public function edit($kode_produk){
        $data = Produk::find($kode_produk);
        $kategori = Kategori::all();
        return view('produk.edit', compact('data', 'kategori'));
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
        $data = Produk::find($kode_produk);
        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->update();
        return redirect('/produk/tambah');
    }


}

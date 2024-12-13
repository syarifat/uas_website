<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function lihat(){
        $data = Produk::all();
            return view('project.lihat', ['dataProduk' => $data]);
    }
    public function destroy($kode_produk){
        $data = Produk::find($kode_produk);
        $data->delete();
        return redirect()->route('project.lihat'); // Redirect to the product list
    }

    
    public function edit($kode_produk){
        $data = Produk::find($kode_produk);
            return view('project.edit', compact('data'));
    }
    public function tambah(){
        $kategori = Kategori::all();
        return view('project.tambah', compact('kategori'));
    }
    public function store(Request $request){
    // Validasi data
    $request->validate([
        'kode_produk' => 'required|unique:produk,kode_produk',
        'nama_produk' => 'required',
        'kategori' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
    ]);

    // Simpan data ke database
    $data = new Produk();
    $data->kode_produk = $request->kode_produk;
    $data->nama_produk = $request->nama_produk;
    $data->kode_kategori = $request->kategori;
    $data->harga = $request->harga;
    $data->stok = $request->stok;
    $data->save();

    return redirect()->route('project.lihat')->with('success', 'Produk berhasil ditambahkan!');
}

}

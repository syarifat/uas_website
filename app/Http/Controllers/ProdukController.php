<?php

namespace App\Http\Controllers;

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

    
    public function edit($kode_produk)
        {
        $data = Produk::find($kode_produk);
            return view('produk.edit', compact('data'));
    }
    public function tambah(){
        return view('project.tambah');
    }
    public function store(Request $request){
    $data = new Produk();
    $data->kode_produk = $request->kode_produk;
    $data->nama_produk = $request->nama_produk;
    $data->kategori = $request->kategori;
    $data->harga = $request->harga;
    $data->stok = $request->stok;
    $data->save();

    return redirect()->route('produk.lihat')->with('success', 'Produk berhasil ditambahkan!');
}

}

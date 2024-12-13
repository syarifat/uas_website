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
<<<<<<< HEAD

    public function destroy($kode_produk){
    $data = Produk::find($kode_produk); // Make sure to use $kode_produk
    if ($data) {
=======
    public function destroy($kode_produk){
        $data = Produk::find($kode_produk);
>>>>>>> 565c1afece8819643569263a2a06ff774f7c7555
        $data->delete();
        return redirect()->route('project.lihat'); // Redirect to the product list
    } else {
        return redirect()->route('project.lihat')->with('error', 'Produk tidak ditemukan');
    }
    }
<<<<<<< HEAD


    public function edit($id)
=======
    public function edit($kode_produk)
>>>>>>> 565c1afece8819643569263a2a06ff774f7c7555
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

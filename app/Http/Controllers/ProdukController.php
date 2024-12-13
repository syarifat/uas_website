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
    $data = Produk::find($kode_produk); // Make sure to use $kode_produk
    if ($data) {
        $data->delete();
        return redirect()->route('project.lihat'); // Redirect to the product list
    } else {
        return redirect()->route('project.lihat')->with('error', 'Produk tidak ditemukan');
    }
    }


    public function edit($id)
        {
        $data = Produk::find($id);
            return view('produk.edit', compact('data'));
    }
}

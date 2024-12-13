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

    public function destroy($id){
        $data = Produk::find($id);
        $data->delete();
        return redirect('/tambah-produk');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function edit($kode_kategori){
        $data = Produk::find($kode_kategori);
            return view('project.edit', ['data' =>$data,'kat' =>$kategoris]);
    }
}

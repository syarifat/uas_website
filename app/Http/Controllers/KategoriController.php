<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class KategoriController extends Controller
{
    // public function edit($kode_kategori){
    //     $data = Produk::find($kode_kategori);
    //         return view('project.edit', ['data' =>$data,'kat' =>$kategoris]);
    // }
    public function index(){
        $data = Kategori::all();
        return view('kategori.index', ['dataKategori'=> $data]);
    }

    public function create(){
        return view('kategori.tambah');
    }

    public function store(Request $request) {
        $data = new Kategori();
        $data->kode_kategori = $request->kode_kategori;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();
        return redirect('/tampil-kategori');
    }
    
    public function edit($kode_kategori) {
        $data = Kategori::find($kode_kategori);
        return view('kategori.edit', compact('data'));
    }
    
    public function update(Request $request, $kode_kategori) {
        $data = Kategori::find($kode_kategori); // Cari data berdasarkan kode_kategori
        if ($data) {
            $data->nama_kategori = $request->nama_kategori; // Update nama kategori
            $data->save(); // Simpan perubahan
        }
        return redirect('/tampil-kategori'); // Redirect ke halaman daftar kategori
    }
    
    
    public function destroy($kode_kategori) {
        $data = Kategori::find($kode_kategori);
        $data->delete();
        return redirect('/tampil-kategori');
    }
    
}

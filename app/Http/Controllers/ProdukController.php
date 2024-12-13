<<<<<<< HEAD
public function edit($id)
    {
        $data = Produk::find($id);
        return view('produk.edit', compact('data'));
    }
=======
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
}
>>>>>>> 66de5f15088da49ccc8ec736573b1a588bea7c80

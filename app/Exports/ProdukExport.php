<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Produk;

class ProdukExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produk::with('kategori')->get()->map(function($produk, $key) {
            return [
                $key + 1,
                $produk->kode_produk,
                $produk->nama_produk,
                $produk->kategori ? $produk->kategori->nama_kategori : 'Tidak Ada Kategori', // Menampilkan nama kategori
                $produk->harga,
                $produk->stok,
                $produk->created_at->format('d-m-Y H:i') // Menampilkan tanggal dan jam produk masuk
            ];
        });
    }

    public function headings():array
    {
        return [
            'No',
            'Kode Produk',
            'Nama Produk',
            'Nama Kategori',
            'Harga',
            'Stok',
            'Tanggal Masuk',
        ];
    }
}

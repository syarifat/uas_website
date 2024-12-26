<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transaksi;
use Carbon\Carbon;

class TransaksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::with('produk')->get()->map(function ($transaksi) {
            return [
                $transaksi->id_transaksi, // ID Transaksi
                $transaksi->produk->nama_produk ?? 'Produk Tidak Ditemukan', // Nama Produk
                $transaksi->jumlah, // Jumlah
                $transaksi->harga, // Harga per Pcs
                $transaksi->total_harga, // Total Harga
                Carbon::parse($transaksi->tanggal)->format('d-m-Y'), // Format tanggal
                $transaksi->kasir, // Nama Kasir
            ];
        });
    }

    public function headings():array
    {
        return [
            'No',
            'ID Transaksi',
            'Nama Produk',
            'Jumlah',
            'Harga / Pcs',
            'Total Harga',
            'Tanggal',
            'Nama Kasir',
        ];
    }
}

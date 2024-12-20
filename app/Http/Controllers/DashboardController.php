<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getInformation()
    {
        $currentMonth = date('Y-m');

        // Barang terjual bulan ini
        $barangTerjual = DB::table('transaksi')
            ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$currentMonth])
            ->sum(DB::raw('COALESCE(jumlah, 0)'));


        // Barang masuk bulan ini
        $barangMasuk = DB::table('produk')
            // ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$currentMonth])
            ->sum('stok'); // Anda harus menyesuaikan field jika bukan kode_produk

        // Jumlah transaksi bulan ini
        $jumlahTransaksi = DB::table('transaksi')
            ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$currentMonth])
            ->count();

        // Penghasilan bulan ini
        $penghasilan = DB::table('transaksi')
            ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$currentMonth])
            ->sum('total_harga');

        return view('dashboards.dashboard_admin', compact('barangTerjual', 'barangMasuk', 'jumlahTransaksi', 'penghasilan'));
    }
    public function getChartData()
    {
        $data = DB::table('transaksi')
            ->select(DB::raw('DATE(tanggal) as tanggal'), DB::raw('SUM(total_harga) as total')) // Ambil hanya tanggal (YYYY-MM-DD)
            ->groupBy(DB::raw('DATE(tanggal)')) // Pastikan pengelompokan berdasarkan tanggal tanpa waktu
            ->orderBy('tanggal', 'asc') // Urutkan berdasarkan tanggal
            ->get();
    
        return response()->json($data); // Kirimkan data dalam format JSON
    }
}

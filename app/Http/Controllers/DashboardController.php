<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

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

//     public function showlaporan(Request $request)
// {
//     if (Auth::user()->role === 'owner') {
//         // Logika untuk owner
//         return view('dashboards.owner_laporan', [
//             'data' => Transaksi::all(), // atau data spesifik
//         ]);
//     }

//     if (Auth::user()->role === 'kasir') {
//         // Logika untuk kasir
//         return view('dashboards.kasir_laporan', [
//             'data' => Transaksi::where('kasir_id', Auth::id())->get(),
//         ]);
//     }

//     abort(403, 'Unauthorized action.');
// }

}

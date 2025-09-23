<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function tampil_dashboard()  
    {
        // Hitung total peminjaman per bulan
        $data = Peminjaman::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Konversi angka bulan ke nama bulan
        $labels = $data->pluck('bulan')->map(function ($bulan) {
            return Carbon::create()->month($bulan)->format('F'); 
        });

        $totals = $data->pluck('total');

        $jumlah_barang = Barang::count();
        $jumlah_peminjaman = Peminjaman::count();
        $items = Barang::get();


        return view('pages.dashboard', compact(
            'jumlah_barang', 
            'jumlah_peminjaman', 
            'labels', 
            'totals',
            'items'
        ));
    }
}

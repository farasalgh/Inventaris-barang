<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pengembalian;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');

        // ambil semua bulan yang tersedia dan ubah ke Carbon
        $bulanTersedia = Pengembalian::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as bulan')
            ->distinct()
            ->orderBy('bulan', 'desc')
            ->pluck('bulan')
            ->map(function ($item) {
                return Carbon::createFromFormat('Y-m', $item);
            });

        $laporans = Laporan::query()
            ->when($bulan, function ($query, $bulan) {
                $periode_mulai = date('Y-m-01', strtotime($bulan));
                $periode_selesai = date('Y-m-t', strtotime($bulan));
                $query->whereBetween('periode_mulai', [$periode_mulai, $periode_selesai]);
            })
            ->latest()
            ->get();

        return view('laporan.index', compact('laporans', 'bulanTersedia', 'bulan'));
    }

    public function generate(Request $request)
    {
        $bulan = $request->bulan;

        // ambil awal dan akhir bulan
        $periode_mulai = date('Y-m-01', strtotime($bulan));
        $periode_selesai = date('Y-m-t', strtotime($bulan));

        // Ambil transaksi bulan tersebut
        $transaksi = Pengembalian::whereBetween('tanggal_dikembalikan', [$periode_mulai, $periode_selesai])->get();

        $nama_laporan = 'Laporan Pengembalian - ' . date('F Y', strtotime($bulan));

        // Simpan data laporan ke database
        $laporan = Laporan::create([
            'nama_laporan'   => $nama_laporan,
            'periode_mulai'  => $periode_mulai,
            'periode_selesai' => $periode_selesai,
            'file_path'      => null,
        ]);

        // Buat PDF
        $pdf = Pdf::loadView('laporan.template', [
            'judul'          => $nama_laporan,
            'periode_mulai'  => $periode_mulai,
            'periode_selesai' => $periode_selesai,
            'transaksi'      => $transaksi,
        ]);

        $filePath = 'laporan/' . $laporan->id . '.pdf';
        $pdf->save(storage_path('app/public/' . $filePath));

        // update file_path
        $laporan->update(['file_path' => $filePath]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat!');
    }



    public function cetak($id)
    {
        $laporan = Laporan::findOrFail($id);
        return response()->file(storage_path('app/public/' . $laporan->file_path));
    }
}

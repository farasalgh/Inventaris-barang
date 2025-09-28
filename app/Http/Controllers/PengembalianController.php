<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');

        $barangs = Barang::all();
        $pengembalians = Pengembalian::with('barang')
            ->when($search, function ($query, $search) {
                $query->whereHas('barang', function ($q) use ($search) {
                    $q->where('nama_peminjam', 'like', "%{$search}%");
                })
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $availableMonths = Pengembalian::select(
            DB::raw('DATE_FORMAT(tanggal_dikembalikan, "%Y-%m") as bulan')
        )
            ->whereNotNull('tanggal_dikembalikan')
            ->groupBy('bulan')
            ->orderBy('bulan', 'desc')
            ->pluck('bulan')
            ->map(function ($item) {
                return Carbon::createFromFormat('Y-m', $item);
            });


        return view('pengembalian.index', compact('pengembalians', 'barangs', 'search', 'availableMonths'));
    }


    public function kembalikan(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $tanggalDikembalikan = $request->input('tanggal_dikembalikan', now()->toDateString());

        // Menentukan status
        $status = (strtotime($tanggalDikembalikan) <= strtotime($peminjaman->tanggal_kembali))
            ? 'returned'
            : 'late';

        // Simpan data ke tabel pengembalians
        Pengembalian::create([
            'id_barang' => $peminjaman->id_barang,
            'nama_peminjam' => $peminjaman->nama_peminjam,
            'tanggal_pinjam' => $peminjaman->created_at->toDateString(),
            'tanggal_kembali' => $peminjaman->tanggal_kembali,
            'tanggal_dikembalikan' => $tanggalDikembalikan,
            'status' => $status,
            'keperluan' => $peminjaman->keperluan,
            'telepon' => $peminjaman->telepon,
            'alamat' => $peminjaman->alamat,
        ]);

        //hapus data dari tabel peminjaman
        $peminjaman->delete();

        // Update stock barang
        $barang = Barang::find($peminjaman->id_barang);
        if ($barang) {
            $barang->qty += 1; // Asumsikan setiap peminjaman mengurangi stock sebanyak 1
            $barang->save();
        }

        return redirect()->route('peminjaman.index')->with('success', 'Barang berhasil dikembalikan.');
    }
}

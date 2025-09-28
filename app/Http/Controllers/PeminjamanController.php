<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $barangs = Barang::all();

        $peminjamans = Peminjaman::with('barang')
            ->when($search, function ($query, $search) {
                $query->where('nama_peminjam', 'like', "%{$search}%")
                    ->orWhereHas('barang', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->paginate(15);

        return view('peminjam.index', compact('peminjamans', 'search', 'barangs'));
    }


    public function buat_peminjaman(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_kembali' => 'required|date',
            'keperluan' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:500',
        ]);

        // Simpan data peminjaman ke database
        $data = $request->only(['id_barang', 'nama_peminjam', 'tanggal_kembali', 'keperluan', 'telepon', 'alamat']);

        Peminjaman::create($data);

        // Kurangi stock barang
        $barang = Barang::find($request->input('id_barang'));
        if ($barang && $barang->qty > 0) {
            $barang->decrement('qty');
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dibuat');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjam.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        Peminjaman::findOrFail($id);

        // $request->validate([
        //     'nama_peminjam' => 'required|string|max:255',
        //     'tanggal_kembali' => 'required|date',
        //     'keperluan' => 'required|string|max:255',
        //     'telepon' => 'required|string|max:15',
        //     'alamat' => 'required|string|max:500',
        // ]);

        $data = $request->only(['nama_peminjam', 'tanggal_kembali', 'keperluan', 'telepon', 'alamat']);
        Peminjaman::where('id', $id)->update($data);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function hapus_peminjaman(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}

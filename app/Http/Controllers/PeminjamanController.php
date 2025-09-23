<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    //
    public function index()
    {
        $barangs = Barang::all();
        $peminjamans = Peminjaman::paginate(15);

        return view('peminjam.index', compact('barangs', 'peminjamans'));
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

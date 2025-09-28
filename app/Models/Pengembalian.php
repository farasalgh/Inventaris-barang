<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    //
    protected $fillable = [
        'id_barang',
        'nama_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_dikembalikan',
        'status',
        'keperluan',
        'telepon',
        'alamat',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

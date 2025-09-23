<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $guarded = ['id'];

    // Bentuk relasi many-to-one dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

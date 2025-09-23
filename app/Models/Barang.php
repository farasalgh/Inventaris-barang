<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['name', 'qty', 'type', 'image'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_barang');
    }
}

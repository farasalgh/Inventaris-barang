<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peminjaman')->truncate();

        for ($i = 1; $i <= 143; $i++) {
            DB::table('peminjaman')->insert([
                'nama_peminjam' => "User $i",
                'id_barang' => 21,
                'tanggal_kembali' => Carbon::now()->addDays(rand(1, 30)),
                'keperluan' => 'Keperluan Dummy',
                'telepon' => '08' . rand(100000000, 999999999),
                'alamat' => 'Alamat Dummy',
                // Generate created_at random tiap bulan dalam tahun ini
                'created_at' => Carbon::create(2025, rand(1, 9), rand(1, 28)),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('barangs')->onDelete('cascade');
            $table->string('nama_peminjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->date('tanggal_dikembalikan');
            $table->enum('status', ['returned', 'late']);
            $table->string('keperluan');
            $table->string('telepon');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};

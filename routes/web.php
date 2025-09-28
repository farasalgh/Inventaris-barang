<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/login', [AuthController::class, 'tampil_login'])->name('login');
Route::get('/register', [AuthController::class, 'tampil_register'])->name('register');
Route::post('/register/submit', [AuthController::class, 'submit_register']);
Route::post('/login/submit', [AuthController::class, 'submit_login']);

Route::get('/dashboard', [DashboardController::class, 'tampil_dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout/submit', [AuthController::class, 'submit_logout'])->middleware('auth');

Route::get('/mengelola-barang', [BarangController::class, 'index'])->middleware('auth')->name('kelolabarang.index');
Route::resource('barang', BarangController::class)->middleware('auth');
Route::get('/mengelola-barang/edit/{id}', [BarangController::class, 'edit'])->middleware('auth')->name('kelolabarang.edit');
Route::post('/mengelola-barang/update/{id}', [BarangController::class, 'update'])->middleware('auth')->name('kelolabarang.update');

Route::get('/peminjaman-barang', [PeminjamanController::class, 'index'])->middleware('auth')->name('peminjaman.index');
Route::post('/peminjaman-barang/submit', [PeminjamanController::class, 'buat_peminjaman'])->middleware('auth')->name('peminjaman.submit');
Route::get('/peminjaman-barang/edit/{id}', [PeminjamanController::class, 'edit'])->middleware('auth')->name('peminjaman.edit');
Route::post('/peminjaman-barang/update/{id}', [PeminjamanController::class, 'update'])->middleware('auth')->name('peminjaman.update');
Route::post('/peminjaman-barang/destroy/{id}', [PeminjamanController::class, 'hapus_peminjaman'])->middleware('auth');

// Route pengembalian barang dari peminjaman ke pengembalian
Route::post('/peminjaman/{id}/kembalikan', [PengembalianController::class, 'kembalikan'])->middleware('auth')->name('peminjaman.kembalikan');

Route::get('/pengembalian-barang', [PengembalianController::class, 'index'])->middleware('auth')->name('pengembalian.index');

// Route laporan
Route::get('/laporan', [LaporanController::class, 'index'])->middleware('auth')->name('laporan.index');
Route::post('/laporan/generate', [LaporanController::class, 'generate'])->middleware('auth')->name('laporan.generate');
Route::get('/laporan/cetak/{id}', [LaporanController::class, 'cetak'])->middleware('auth')->name('laporan.cetak');

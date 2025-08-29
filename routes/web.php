<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/login', [AuthController::class, 'tampil_login'])->name('login');
Route::get('/register', [AuthController::class, 'tampil_register']);
Route::post('/register/submit', [AuthController::class, 'submit_register'])->name('register');
Route::post('/login/submit', [AuthController::class,'submit_login']);

Route::get('/dashboard', [DashboardController::class, 'tampil_dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout/submit', [AuthController::class,'submit_logout'])->middleware('auth');

Route::get('/mengelola-barang', [BarangController::class,'index'])->middleware('auth')->name('kelolabarang.index');
Route::resource('barang', BarangController::class);
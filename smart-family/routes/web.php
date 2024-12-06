<?php
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Rute untuk Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rute resource untuk pemasukan, kecuali show
Route::resource('pemasukan', PemasukanController::class)->except(['show']);

// Rute untuk cetak laporan pemasukan
Route::get('/pemasukan/cetak', [PemasukanController::class, 'cetak'])->name('pemasukan.cetak');

// Rute untuk create keluarga
Route::get('/keluarga/create', [KeluargaController::class, 'create'])->name('keluarga.create');

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

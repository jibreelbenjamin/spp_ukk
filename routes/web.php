<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['checklogin'])->group(function () {
    Route::get('/home', [AuthController::class, 'dashboard']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/me', function () {
    return view('dashboard.profile', ['title' => 'Profile page', 'page' => 'p_profile']);
});

// index
Route::get('/daftar-invoice', [InvoiceController::class, 'index'])->name('faktur.index');
Route::get('/daftar-spp', [SppController::class, 'index'])->name('spp.index');
Route::get('/daftar-siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/daftar-petugas', [UserController::class, 'index'])->name('petugas.index');
Route::get('/daftar-kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/daftar-pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

// create
Route::post('/daftar-invoice', [InvoiceController::class, 'store'])->name('faktur.save');
Route::get('/tambah-invoice', [InvoiceController::class, 'create'])->name('faktur.create');

Route::post('/daftar-siswa', [SiswaController::class, 'store'])->name('siswa.save');
Route::get('/tambah-siswa', [SiswaController::class, 'create'])->name('siswa.create');

Route::post('/daftar-pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.save');
Route::get('/tambah-pembayaran', function () {
    return view('dashboard.tambah_pembayaran', ['title' => 'Tambah Pembayaran', 'page' => 'd_pembayaran']);
});
Route::post('/daftar-spp', [SppController::class, 'store'])->name('spp.save');
Route::get('/tambah-spp', function () {
    return view('dashboard.tambah_spp', ['title' => 'Tambah SPP', 'page' => 'd_spp']);
});
Route::post('/daftar-petugas', [UserController::class, 'store'])->name('petugas.save');
Route::get('/tambah-petugas', function () {
    return view('dashboard.tambah_petugas', ['title' => 'Tambah Petugas', 'page' => 'd_petugas']);
});
Route::post('/daftar-kelas', [KelasController::class, 'store'])->name('kelas.save');
Route::get('/tambah-kelas', function () {
    return view('dashboard.tambah_kelas', ['title' => 'Tambah Kelas', 'page' => 'd_kelas']);
});

// delete
Route::delete('/daftar-faktur/{invoice}', [InvoiceController::class, 'destroy'])->name('faktur.delete');
Route::delete('/daftar-siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.delete');
Route::delete('/daftar-pembayaran/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayaran.delete');
Route::delete('/daftar-spp/{spp}', [SppController::class, 'destroy'])->name('spp.delete');
Route::delete('/daftar-petugas/{user}', [UserController::class, 'destroy'])->name('petugas.delete');
Route::delete('/daftar-kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');

// update
Route::get('/daftar-faktur/{invoice}/edit', [InvoiceController::class, 'edit'])->name('faktur.edit');
Route::put('/daftar-faktur/{invoice}/edit', [InvoiceController::class, 'update'])->name('faktur.update');
Route::get('/daftar-siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/daftar-siswa/{siswa}/edit', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/daftar-pembayaran/{pembayaran}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
Route::put('/daftar-pembayaran/{pembayaran}/edit', [PembayaranController::class, 'update'])->name('pembayaran.update');
Route::get('/daftar-spp/{spp}/edit', [SppController::class, 'edit'])->name('spp.edit');
Route::put('/daftar-spp/{spp}/edit', [SppController::class, 'update'])->name('spp.update');
Route::get('/daftar-petugas/{user}/edit', [UserController::class, 'edit'])->name('petugas.edit');
Route::put('/daftar-petugas/{user}/edit', [UserController::class, 'update'])->name('petugas.update');
Route::get('/daftar-kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/daftar-kelas/{kelas}/edit', [KelasController::class, 'update'])->name('kelas.update');

// detail
Route::get('/daftar-invoice/{invoice}', [InvoiceController::class, 'show'])->name('faktur.show');

Route::fallback(function () {
    return view('404'); // Or return abort(404);
});
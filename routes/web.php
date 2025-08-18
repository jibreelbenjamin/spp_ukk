<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.home', ['title' => 'Dashboard', 'page' => 'home']);
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['checklogin'])->group(function () {
    Route::get('/home', [AuthController::class, 'dashboard']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/home', function () {
    return view('dashboard.home', ['title' => 'Dashboard', 'page' => 'home']);
});

Route::get('/me', function () {
    return view('dashboard.profile', ['title' => 'Profile page', 'page' => 'p_profile']);
});

// index
Route::get('/daftar-spp', [InvoiceController::class, 'index'])->name('faktur.index');
Route::get('/daftar-siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/daftar-petugas', [UserController::class, 'index'])->name('petugas.index');
Route::get('/daftar-kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/daftar-pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

// create
Route::post('/daftar-petugas', [UserController::class, 'store'])->name('petugas.save');
Route::get('/tambah-petugas', function () {
    return view('dashboard.tambah_petugas', ['title' => 'Tambah Petugas', 'page' => 'd_petugas']);
});
Route::post('/daftar-kelas', [KelasController::class, 'store'])->name('kelas.save');
Route::get('/tambah-kelas', function () {
    return view('dashboard.tambah_kelas', ['title' => 'Tambah Siswa', 'page' => 'd_kelas']);
});

// delete
Route::delete('/daftar-petugas/{user}', [UserController::class, 'destroy'])->name('petugas.delete');
Route::delete('/daftar-kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');

// update
Route::get('/daftar-petugas/{user}/edit', [UserController::class, 'edit'])->name('petugas.edit');
Route::put('/daftar-petugas/{user}/edit', [UserController::class, 'update'])->name('petugas.update');
Route::get('/daftar-kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/daftar-kelas/{kelas}/edit', [KelasController::class, 'update'])->name('kelas.update');


Route::get('/tambah-spp', function () {
    return view('dashboard.tambah_spp', ['title' => 'Tambah Faktur', 'page' => 'd_spp']);
});

Route::get('/daftar-spp/12', function () {
    return view('dashboard.faktur', ['title' => 'Daftar SPP', 'page' => 'd_spp']);
});


Route::fallback(function () {
    return view('404'); // Or return abort(404);
});
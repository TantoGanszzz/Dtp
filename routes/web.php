<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdb;
use App\Http\Controllers\Admin\GaleriController as AdminGaleri;
use App\Http\Controllers\Admin\BeritaController as AdminBerita;
use App\Http\Controllers\Admin\SekolahController as AdminSekolah;
use App\Http\Controllers\Admin\StrukturYayasanController;
use App\Http\Controllers\Admin\StrukturSekolahController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/sekolah/smp', [SekolahController::class, 'smp'])->name('sekolah.smp');
Route::get('/sekolah/sma', [SekolahController::class, 'sma'])->name('sekolah.sma');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('galeri.show');

// PPDB — Wajib login dulu sebagai user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');
    Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
    Route::get('/ppdb/riwayat', [PpdbController::class, 'riwayat'])->name('ppdb.riwayat');
});

// Profil Akun — Wajib login
Route::get('/profil-akun', function () {
    return view('profil-akun');
})->middleware('auth')->name('profil.akun');

// Auth Routes
require base_path('routes/auth.php');

// Admin Routes — Hanya admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/ppdb', [AdminPpdb::class, 'index'])->name('ppdb.index');
    Route::patch('/ppdb/{ppdb}', [AdminPpdb::class, 'update'])->name('ppdb.update');
    Route::delete('/ppdb/{ppdb}', [AdminPpdb::class, 'destroy'])->name('ppdb.destroy');

    Route::get('/galeri', [AdminGaleri::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [AdminGaleri::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [AdminGaleri::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{galeri}', [AdminGaleri::class, 'destroy'])->name('galeri.destroy');

    Route::get('/berita', [AdminBerita::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [AdminBerita::class, 'create'])->name('berita.create');
    Route::post('/berita', [AdminBerita::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [AdminBerita::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [AdminBerita::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [AdminBerita::class, 'destroy'])->name('berita.destroy');

    Route::get('/sekolah', [AdminSekolah::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/create', [AdminSekolah::class, 'create'])->name('sekolah.create');
    Route::post('/sekolah', [AdminSekolah::class, 'store'])->name('sekolah.store');
    Route::get('/sekolah/{sekolah}/edit', [AdminSekolah::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{sekolah}', [AdminSekolah::class, 'update'])->name('sekolah.update');
    Route::delete('/sekolah/{sekolah}', [AdminSekolah::class, 'destroy'])->name('sekolah.destroy');

    // Struktur Yayasan
    Route::get('/struktur-yayasan', [StrukturYayasanController::class, 'index'])->name('struktur-yayasan.index');
    Route::get('/struktur-yayasan/create', [StrukturYayasanController::class, 'create'])->name('struktur-yayasan.create');
    Route::post('/struktur-yayasan', [StrukturYayasanController::class, 'store'])->name('struktur-yayasan.store');
    Route::get('/struktur-yayasan/{struktur_yayasan}/edit', [StrukturYayasanController::class, 'edit'])->name('struktur-yayasan.edit');
    Route::put('/struktur-yayasan/{struktur_yayasan}', [StrukturYayasanController::class, 'update'])->name('struktur-yayasan.update');
    Route::delete('/struktur-yayasan/{struktur_yayasan}', [StrukturYayasanController::class, 'destroy'])->name('struktur-yayasan.destroy');

    // Struktur Sekolah
    Route::get('/sekolah/{sekolah}/struktur', [StrukturSekolahController::class, 'index'])->name('sekolah.struktur.index');
    Route::get('/sekolah/{sekolah}/struktur/create', [StrukturSekolahController::class, 'create'])->name('sekolah.struktur.create');
    Route::post('/sekolah/{sekolah}/struktur', [StrukturSekolahController::class, 'store'])->name('sekolah.struktur.store');
    Route::get('/sekolah/{sekolah}/struktur/{struktur}/edit', [StrukturSekolahController::class, 'edit'])->name('sekolah.struktur.edit');
    Route::put('/sekolah/{sekolah}/struktur/{struktur}', [StrukturSekolahController::class, 'update'])->name('sekolah.struktur.update');
    Route::delete('/sekolah/{sekolah}/struktur/{struktur}', [StrukturSekolahController::class, 'destroy'])->name('sekolah.struktur.destroy');
});

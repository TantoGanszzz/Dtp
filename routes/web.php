<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdb;
use App\Http\Controllers\Admin\GaleriController as AdminGaleri;
use App\Http\Controllers\Admin\BeritaController as AdminBerita;
use App\Http\Controllers\Admin\SekolahController as AdminSekolah;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/sekolah/smp', [SekolahController::class, 'smp'])->name('sekolah.smp');
Route::get('/sekolah/sma', [SekolahController::class, 'sma'])->name('sekolah.sma');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');

// Auth Routes
require base_path('routes/auth.php');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

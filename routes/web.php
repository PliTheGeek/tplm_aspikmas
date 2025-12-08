<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Livewire\KasDashboard;
use App\Livewire\KasList;
use App\Livewire\KasForm;
use App\Livewire\KasLaporan;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dashboard user biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk profile user biasa
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk dashboard kas
Route::middleware(['auth'])->group(function () {

    // Dashboard Kas
    Route::get('/kas/dashboard', KasDashboard::class)->name('kas.dashboard');

    // Daftar Transaksi
    Route::get('/kas', KasList::class)->name('kas.index');

    // Tambah Transaksi
    Route::get('/kas/create', KasForm::class)->name('kas.create');

    // Edit Transaksi
    Route::get('/kas/{id}/edit', KasForm::class)->name('kas.edit');

    // Laporan Kas
    Route::get('/kas/laporan', KasLaporan::class)->name('kas.laporan');
});

// ================================================================
// === TAMBAHKAN ROUTE INI DI SINI ===
// Rute Direktori Karyawan (untuk semua user yang login)
Route::get('/direktori', function () {
    return view('direktori');
})->middleware(['auth'])->name('direktori');

// Rute HPP (Harga Pokok Penjualan) - untuk semua user yang login
Route::get('/hpp', function () {
    return view('hpp');
})->middleware(['auth'])->name('hpp');
// ================================================================

// GRUP ROUTE UNTUK ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('karyawan', KaryawanController::class);
});

require __DIR__.'/auth.php';
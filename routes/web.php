<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KaryawanController;
use Illuminate\Support\Facades\Route;





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

// ================================================================
// === TAMBAHKAN BLOK KODE INI ===
// GRUP ROUTE UNTUK ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('karyawan', KaryawanController::class);
    // Contoh: Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
// ================================================================

require __DIR__.'/auth.php';

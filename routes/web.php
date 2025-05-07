<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

Route::middleware('auth')->group(function () {
    Route::get('/', [
        DashboardController::class, 'index'
    ])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

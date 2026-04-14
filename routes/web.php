<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\LuatController;

Route::get('/gio-hang', [LuatController::class, 'gioHang'])->name('gio-hang');
Route::get('/gio-hang/xoa/{id}', [LuatController::class, 'xoaGioHang'])->name('gio-hang.xoa');
Route::post('/gio-hang/dat-hang', [LuatController::class, 'datHang'])->name('gio-hang.dat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

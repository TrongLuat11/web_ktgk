<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LuatController;
use App\Http\Controllers\TrinhController;

Route::get('/storage/image/{filename}', function ($filename) {
    $path = base_path('storage/public/image/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    return response()->file($path);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [TrinhController::class, 'index'])->name('trinh.index');
Route::get('/laptop/{id}', [TrinhController::class, 'show'])->name('trinh.show');
Route::post('/add-to-cart/{id}', [TrinhController::class, 'addToCart'])->name('trinh.addcart');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/gio-hang', [LuatController::class, 'gioHang'])->name('gio-hang');
Route::get('/gio-hang/xoa/{id}', [LuatController::class, 'xoaGioHang'])->name('gio-hang.xoa');
Route::post('/gio-hang/dat-hang', [LuatController::class, 'datHang'])->name('gio-hang.dat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

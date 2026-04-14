<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MinhController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LuatController;
use App\Http\Controllers\TrinhController;
use App\Http\Controllers\TriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

// Serve storage images
Route::get('/storage/image/{filename}', function ($filename) {
    $path = base_path('storage/public/image/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    return response()->file($path);
});

// === Trang chủ (Trinh) ===
Route::get('/', [TrinhController::class, 'index'])->name('trinh.index');

// === Chi tiết sản phẩm & Thêm giỏ hàng (Trinh) ===
Route::get('/laptop/{id}', [TrinhController::class, 'show'])->name('trinh.show');
Route::post('/add-to-cart/{id}', [TrinhController::class, 'addToCart'])->name('trinh.addcart');

// === Tìm kiếm & Lọc thể loại (Tri) ===
Route::post('/timkiem', [TriController::class, 'search']);
Route::get('/laptop/theloai/{id}', [TriController::class, 'category']);

// === Giỏ hàng (Luat) ===
Route::get('/gio-hang', [LuatController::class, 'gioHang'])->name('gio-hang');
Route::get('/gio-hang/xoa/{id}', [LuatController::class, 'xoaGioHang'])->name('gio-hang.xoa');
Route::post('/gio-hang/dat-hang', [LuatController::class, 'datHang'])->name('gio-hang.dat');

// === Quản lý sản phẩm (Minh) ===
Route::get('/san-pham', [MinhController::class, 'index'])->name('san-pham.index');
Route::get('/san-pham/them', [MinhController::class, 'create'])->name('san-pham.create');
Route::post('/san-pham', [MinhController::class, 'store'])->name('san-pham.store');
Route::post('/san-pham/import-csv', [MinhController::class, 'importCsv'])->name('san-pham.import-csv');
Route::get('/san-pham/{id}', [MinhController::class, 'show'])->name('san-pham.show');
Route::delete('/san-pham/{id}', [MinhController::class, 'destroy'])->name('san-pham.destroy');

// === Dashboard & Auth ===
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

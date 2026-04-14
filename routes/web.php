<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MinhController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes quản lý sản phẩm
Route::get('/san-pham', [MinhController::class, 'index'])->name('san-pham.index');
Route::get('/san-pham/{id}', [MinhController::class, 'show'])->name('san-pham.show');
Route::delete('/san-pham/{id}', [MinhController::class, 'destroy'])->name('san-pham.destroy');

require __DIR__.'/auth.php';

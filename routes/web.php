<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('splash');
});

Route::get('/home', function () {
    return view('customer/home');
});

// ==========================================
// PINDAHKAN DASHBOARD KE SINI (DI LUAR ADMIN)
// ==========================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Khusus Admin (Harus Login)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('reviews', ReviewController::class);
});

require __DIR__ . '/auth.php';

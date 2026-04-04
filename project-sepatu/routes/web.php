<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('indeks');
})->name('indeks');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route Halaman Produk
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect()->route('produk.index');
    });

    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');

    Route::middleware('admin')->group(function () {
        Route::resource('produk', ProdukController::class)->except(['index', 'show']);
    });
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
     ->name('dashboard');

     use App\Http\Controllers\ProdukController;

Route::resource('produk', ProdukController::class);

use App\Http\Controllers\TransaksiController;

Route::resource('transaksi', TransaksiController::class);

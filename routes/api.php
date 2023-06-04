<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group( function(){

    Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index']);
    Route::get('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'detail']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/produk', [App\Http\Controllers\ProdukController::class, 'store']);
    Route::post('/produk/update/{id}', [App\Http\Controllers\ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'destroy']);

    //customer route
    Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'store']);
    Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index']);
    Route::get('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'detail']);
    Route::post('/customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update']);
    Route::delete('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'destroy']);

    //transaksi route
    Route::post('/transaksi', [App\Http\Controllers\TransaksiController::class, 'store']);
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('/produk/client', [App\Http\Controllers\ProdukController::class, 'show']);

Route::get('/ukuran', [App\Http\Controllers\UkuranController::class, 'index']);
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index']);
Route::get('/dropdown-produk', [App\Http\Controllers\ProdukController::class, 'dropdown']);


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/produk', [App\Http\Controllers\ProdukController::class, 'store']);
    Route::patch('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'destroy']);
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('/produk/client', [App\Http\Controllers\ProdukController::class, 'show']);

Route::get('/ukuran', [App\Http\Controllers\UkuranController::class, 'index']);
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index']);


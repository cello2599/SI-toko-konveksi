<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('login'); });
Route::post('postlogin', [App\Http\Controllers\AuthController::class, 'postlogin']);

Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () { return view('welcome'); });
    // Route::get('/logout', function () { return view('logout'); });
    // Route::get('/produk', 'ProdukController@index');
    // Route::get('/produk/tambah', 'ProdukController@tambah');
    // Route::post('/produk/store', 'ProdukController@store');
    // Route::get('/produk/edit/{id}', 'ProdukController@edit');
    // Route::post('/produk/update', 'ProdukController@update');
    // Route::get('/produk/hapus/{id}', 'ProdukController@hapus');
});


<?php

use App\Http\Controllers\DaftarDonasiController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('/dashboard/kategori',KategoriController::class);
Route::resource('/dashboard/daftar-donasi',DaftarDonasiController::class);

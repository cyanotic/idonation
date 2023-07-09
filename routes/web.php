<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarDonasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;
use App\Models\DaftarDonasi;
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
//halaman login
Route::get('/', function () {
    return view('index');
})->name('login')->middleware('guest');
Route::post('/',[AuthController::class,'authenticate'])->middleware('guest');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');
//halaman registrasi
Route::get('/registrasi', function () {
    return view('registrasi.index');
});
Route::post('/register', [RegisterController::class,'store']);

//proses verifikasi
Route::get('/email/verify/verification',[VerifikasiController::class,'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}',[VerifikasiController::class,'verify'])->middleware(['auth','signed'])->name('verification.verify');
//kirim ulang verifikasi
Route::get('/email/verify/resend-verifikasi',[VerifikasiController::class,'send'])->middleware(['auth','throttle:6,1'])->name('verification.send');

//jika sudah login dan verifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::middleware(['auth','auth.session','verified','admin'])->group(function(){
Route::resource('/dashboard/kategori',KategoriController::class);
Route::resource('/dashboard/daftar-donasi',DaftarDonasiController::class);
});

Route::get('/user-donasi',[MemberController::class,'index']);
Route::get('/user-donasi/{daftardonasi}',[MemberController::class,'show']);
Route::post('/user-donasi/kirim-donasi',[MemberController::class,'kirimDonasi']);
Route::post('/user-donasi/notification',[MemberController::class,'notifikasi']);
Route::get('/riwayat/invoice/{kode}',[MemberController::class,'invoiceDetail']);
Route::get('/riwayat/invoice',[MemberController::class,'invoice']);


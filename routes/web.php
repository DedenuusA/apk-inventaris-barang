<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailpinjamanController;
use App\Http\Controllers\EstimasiController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerusahaanController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/create',[UserController::class,'create'])->middleware('auth');
Route::post('/user',[UserController::class,'store'])->middleware('auth');
Route::delete('/user/{id}',[UserController::class,'destroy'])->middleware('auth');
Route::get('/user/{id}/edit',[UserController::class,'edit'])->middleware('auth');
Route::put('/user/{id}',[UserController::class,'update'])->middleware('auth');
Route::get('/password/{id}/edit',[UserController::class,'editpassword'])->middleware('auth');
Route::post('/edit/password/{id}',[UserController::class,'updatepassword'])->middleware('auth');
Route::get('/',[UserController::class,'total'])->name('dashboard')->middleware('auth');

Route::get('/pinjaman',[PinjamanController::class,'index'])->middleware('auth');
Route::get('/pinjaman/create',[PinjamanController::class,'create'])->middleware('auth');
Route::post('/pinjaman',[PinjamanController::class,'store'])->middleware('auth');
Route::get('/pinjaman/{id}/edit',[PinjamanController::class,'edit'])->middleware('auth');
Route::put('/pinjaman/{id}',[PinjamanController::class,'update'])->middleware('auth');
Route::delete('/pinjaman/{id}',[PinjamanController::class,'destroy'])->middleware('auth');
Route::get('/pinjaman/{id}/detail',[PinjamanController::class,'detail'])->middleware('auth');
Route::put('/cetak_pdf/{id}',[PinjamanController::class,'cetak_pdf'])->middleware('auth');
// Route::get('/',[pinjamanController::class,'total'])->middleware('auth');

Route::get('/detail_pinjaman',[DetailPinjamanController::class,'index'])->middleware('auth');
Route::get('/detail_pinjaman/create',[DetailPinjamanController::class,'create'])->middleware('auth');
Route::post('/detail_pinjaman',[DetailPinjamanController::class,'store'])->middleware('auth');
Route::get('/detail_pinjaman/{id}/edit',[DetailPinjamanController::class,'edit'])->middleware('auth');
Route::put('/detail_pinjaman/{id}',[DetailPinjamanController::class,'update'])->middleware('auth');
Route::delete('/detail_pinjaman/{id}',[DetailPinjamanController::class,'destroy'])->middleware('auth');
// Route::get('/',[DetailpinjamanController::class,'total'])->middleware('auth');

Route::get('/item',[ItemController::class,'index'])->middleware('auth');
Route::get('/item/create',[ItemController::class,'create'])->middleware('auth');
Route::post('/item',[ItemController::class,'store'])->middleware('auth');
Route::get('/item/{id}/edit',[ItemController::class,'edit'])->middleware('auth');
Route::put('/item/{id}',[ItemController::class,'update'])->middleware('auth');
Route::delete('/item/{id}',[ItemController::class,'destroy'])->middleware('auth');
// Route::get('/',[ItemController::class,'total'])->middleware('auth');

Route::get('/kategori',[KategoriController::class,'index'])->middleware('auth');
Route::get('/kategori/create',[KategoriController::class,'create'])->middleware('auth');
Route::post('/kategori',[KategoriController::class,'store'])->middleware('auth');
Route::get('/kategori/{id}/edit',[KategoriController::class,'edit'])->middleware('auth');
Route::put('/kategori/{id}',[KategoriController::class,'update'])->middleware('auth');
Route::delete('/kategori/{id}',[KategoriController::class,'destroy'])->middleware('auth');
// Route::delete('/kategori/{id}',[KategoriController::class,'destroy'])->middleware('auth');

Route::get('/laporan',[LaporanController::class,'index'])->middleware('auth');
Route::get('/peminjaman/cetak_pdf',[LaporanController::class,'cetak_pdf'])->middleware('auth');
Route::get('/barang/cetak_pdf',[LaporanController::class,'barang_cetak_pdf'])->middleware('auth');
Route::get('/user/cetak_pdf',[LaporanController::class,'user_cetak_pdf'])->middleware('auth');
Route::get('/perusahaan/cetak_pdf',[LaporanController::class,'perusahaan_cetak_pdf'])->middleware('auth');
Route::get('/detail/{id}/cetak_pdf',[LaporanController::class,'detail_cetak_pdf'])->middleware('auth');


Route::get('/perusahaan',[PerusahaanController::class,'index'])->middleware('auth');
Route::get('/perusahaan/create',[PerusahaanController::class,'create'])->middleware('auth');
Route::post('/perusahaan',[PerusahaanController::class,'store'])->middleware('auth');
Route::get('/perusahaan/{id}/edit',[PerusahaanController::class,'edit'])->middleware('auth');
Route::put('/perusahaan/{id}',[PerusahaanController::class,'update'])->middleware('auth');
Route::delete('/perusahaan/{id}',[PerusahaanController::class,'destroy'])->middleware('auth');

Route::get('/estimasi',[EstimasiController::class,'index'])->middleware('auth');
Route::get('/total_kuliah',[EstimasiController::class,'total_kuliah']);



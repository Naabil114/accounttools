<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

// Route::get('/', function () {
//     // return view('shop.beli');
// });

Route::get('welcome',[AdminController::class, 'welcome']);
Route::get('shop', [AdminController::class, 'shop']);
Route::get('produkdetail/{id}', [AdminController::class, 'produkdetail']);
Route::get('kritik', [AdminController::class, 'kritik']);
Route::post('post', [AdminController::class, 'postkomentar']);



Route::get('/', [AdminController::class, 'login']);
Route::get('signup',[AdminController::class,'signup']);
Route::post('signupproses',[AdminController::class,'signupproses']);
Route::post('loginproses', [AdminController::class, 'loginproses']);
Route::get('logout', [AdminController::class, 'logout']);
Route::post('beli', [AdminController::class, 'beli']);
Route::post('beliproses', [AdminController::class, 'beliproses']);
Route::get('trans', [AdminController::class, 'dtransaksi']);
Route::get('bayar/{id_transaksi}',[AdminController::class, 'bayar']);
Route::post('callback', [AdminController::class, 'callback']);
Route::get('selesai',[AdminController::class, 'selesai']);
Route::put('/transaksi/{code_transaksi}/update-status', [AdminController::class, 'updateStatus'])->name('transaksi.update_status');
Route::put('/transaksi/{code_transaksi}/update-status_batal', [AdminController::class, 'updateStatusBatal'])->name('transaksi.update_status_batal');

Route::group(['middleware' => 'admin'], function () {

Route::get('dashboard', [AdminController::class,'dashboard']);
Route::get('akun', [AdminController::class, 'akun']);
Route::get('inputakun', [AdminController::class, 'createakun']);
Route::post('simpanakun', [AdminController::class, 'storeakun']);
Route::get('editakun/{id}/edit',[AdminController::class,'editakun']);
Route::put('updateakun/{id}',[AdminController::class,'updateakun']);
Route::DELETE('deleteakun/{id}', [AdminController::class, 'destroyakun']);
Route::get('produk',[AdminController::class, 'produk']);
Route::get('inputproduk',[AdminController::class, 'createproduk']);
Route::post('simpanproduk',[AdminController::class, 'storeproduk']);
Route::GET('editproduk/{id_produk}/edit', [AdminController::class, 'editproduk']);
Route::PUT('updateproduk/{id_produk}', [AdminController::class, 'updateproduk']);
Route::DELETE('deleteproduk/{id_produk}', [AdminController::class, 'destroyproduk']);
Route::get('transaksi', [AdminController::class,'transaksi']);
Route::get('search',[AdminController::class, 'search']);
Route::get('laporan',[AdminController::class, 'laporan']);
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);


Route::get('akunpelanggan', [AdminController::class,'akunpelanggan']);
Route::get('inputakunpelanggan', [AdminController::class, 'createakunpelanggan']);
Route::post('simpanakunpelanggan', [AdminController::class, 'storeakunpelanggan']);
Route::get('editakunpelanggan/{id}/edit',[AdminController::class,'editakunpelanggan']);
Route::put('updateakunpelanggan/{id}',[AdminController::class,'updateakunpelanggan']);
Route::DELETE('deleteakunpelanggan/{id}', [AdminController::class, 'destroyakunpelanggan']);


Route::get('kategori', [AdminController::class, 'kategori']);
Route::get('inputkategori', [AdminController::class, 'createkategori']);
Route::post('simpankategori', [AdminController::class, 'storekategori']);
Route::get('editkategori/{id}/edit',[AdminController::class,'editkategori']);
Route::put('updatekategori/{id}',[AdminController::class,'updatekategori']);
Route::DELETE('deletekategori/{id}', [AdminController::class, 'destroykategori']);

Route::put('/softdeleteproduk/{id_produk}', [AdminController::class, 'softdeleteproduk'])->name('softdeleteproduk');
Route::put('/softdeletepelanggan/{id}', [AdminController::class, 'softdeletepelanggan']);
Route::put('/softdeleteadmin/{id}', [AdminController::class, 'softdeleteadmin']);
});

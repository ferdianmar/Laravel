<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Runtime;

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

Auth::routes();
Route::post('/postLogin', [TestController::class, 'index'])->name('postLogin');
Route::get('/logout', [TestController::class, 'logout'])->name('logout');
Route::get('/', function () {
    $barangs = Barang::where('terjual', '!=', 0)->orderBy('terjual', 'desc')->paginate(3);
    return view('welcome', compact('barangs'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pesanan/{id}', [PesananController::class, 'index']);
Route::post('/pesanan/order/{id}', [PesananController::class, 'update']);
Route::get('/keranjang', [PesananController::class, 'keranjang']);
Route::delete('/cancel-order/{id}', [PesananController::class, 'destroy']);
Route::get('/order', [PesananController::class, 'order']);
Route::get('/order-transfer', [PesananController::class, 'invoice_transfer']);
Route::get('/order-transfer/{id}', [PesananController::class, 'invoice_view']);

// CONTROLER USER
Route::get('/profile', [UserController::class, 'index']);
Route::get('/history', [UserController::class, 'history']);
Route::get('/history/{id}', [UserController::class, 'detail']);
Route::get('/edit', [UserController::class, 'edit_profile']);
Route::patch('/edit/{id}/update', [UserController::class, 'update']);

//CONTROLLER KASIR
Route::get('dashboard', [KasirController::class, 'index']);
Route::get('datapelanggan', [KasirController::class, 'datapelanggan']);
Route::get('datatransaksi', [KasirController::class, 'datatransaksi']);
Route::get('terimaorder/{id}', [KasirController::class, 'terima_order']);
Route::post('tambahbarang', [KasirController::class, 'store']);

//CONTROLLER ADMIN
Route::get('/admin/', [AdminController::class, 'index']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::get('/admin/profile/edit', [AdminController::class, 'edit_profile']);
Route::get('/admin/transaksi/selesai', [AdminController::class, 'selesai']);
Route::get('/admin/transaksi/sudah', [AdminController::class, 'sudah']);
Route::get('/admin/transaksi/belum', [AdminController::class, 'belum']);
Route::get('/admin/transaksi/{id}', [AdminController::class, 'detail']);
Route::get('/admin/transaksi/acc/{id}', [AdminController::class, 'terima_order']);
Route::get('/admin/user', [AdminController::class, 'user']);
Route::get('/admin/user/{id}', [AdminController::class, 'topup']);
Route::patch('/admin/user/{id}/update', [AdminController::class, 'upsaldo']);
Route::get('/admin/menu', [AdminController::class, 'menu']);
Route::post('tambahbarang', [AdminController::class, 'store']);
Route::get('/admin/menu/{id}', [AdminController::class, 'editmenu']);
Route::patch('/menu/{id}/update', [AdminController::class, 'updatemenu']);
Route::delete('/menu/delete/{id}', [AdminController::class, 'destroy']);





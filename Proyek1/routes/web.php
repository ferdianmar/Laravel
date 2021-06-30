<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [LoginController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register/create', [RegisterController::class, 'create']);



// Route::get('/anggota', 'AnggotaController@index')->name('anggota');

Route::get('/anggotas', [AnggotaController::class, 'index2']);
Route::get('/detail/{id}', [AnggotaController::class, 'detail']);
Route::get('/anggotax', [AnggotaController::class, 'indexs']);

Route::get('/anggota/create', [AnggotaController::class, 'create']);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']);
Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy']);
Route::get('/anggota/search', [AnggotaController::class, 'search']);
Route::get('/exportAnggota', [AnggotaController::class, 'exportAnggota']);
Route::get('/pdfAnggota', [AnggotaController::class, 'pdfAnggota']);

Route::get('/gajis', [GajiController::class, 'index2']);
Route::get('/gaji', [GajiController::class, 'index']);
Route::get('/gaji/create', [GajiController::class, 'create']);
Route::post('/gaji/store', [GajiController::class, 'store']);
Route::get('/gaji/edit/{id}', [GajiController::class, 'edit']);
Route::post('/gaji/update/{id}', [GajiController::class, 'update']);
Route::delete('/gaji/delete/{id}', [GajiController::class, 'destroy']);
// Route::get('/gaji/search', 'GajiController@search')->name('gaji.search');
Route::get('/exportGaji', [GajiController::class, 'exportGaji']);
Route::get('/pdfGaji', 'GajiController@pdfGaji')->name('cetakPdfGaji');
Route::get('/gaji/ambilupdate/{id}', [GajiController::class, 'ambilupdate']);
Route::get('/gajis/cetak/{id}', [GajiController::class, 'cetak']);

Route::get('/jabatans', [JabatanController::class, 'index2']);
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/create', [JabatanController::class, 'create']);
Route::post('/jabatan/store', [JabatanController::class, 'store']);
Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit']);
Route::post('/jabatan/update/{id}', [JabatanController::class, 'update']);
Route::delete('/jabatan/delete/{id}', [JabatanController::class, 'destroy']);
Route::get('/excel2', [JabatanController::class, 'exportJabatan']);


Route::get('/user', [UserController::class, 'index']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);
// Route::delete('/jabatan/delete/{id}', [JabatanController::class, 'destroy']);
// Route::get('/jabatan/search', 'JabatanController@search')->name('jabatan.search');

// Route::get('/pdfJabatan', 'JabatanController@pdfJabatan')->name('cetakPdfJabatan');

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

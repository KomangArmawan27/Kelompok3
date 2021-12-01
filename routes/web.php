<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\lupaPasswordController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TambahPemasukanController;
use App\Http\Controllers\TambahPengeluaranController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [UserController::class, 'index']);
Route::get('/lupaPassword', [lupaPasswordController::class, 'lupaPassword']);
Route::get('/register', [UserController::class, 'registration']);
Route::post('/auth', [UserController::class, 'postLogin']);
Route::post('/reg', [UserController::class, 'postRegistration']);
Route::get('/dashboard', [DashboardController::class, 'admin']);
Route::get('/dashboard', [DashboardController::class, 'user']);
Route::get('/pemasukan', [PemasukanController::class, 'pemasukan']);
Route::get('/tambahPemasukan', [TambahPemasukanController::class, 'tambahPemasukan']);
Route::get('/pengeluaran', [PengeluaranController::class, 'pengeluaran']);
Route::get('/tambahPengeluaran', [TambahPengeluaranController::class, 'tambahPengeluaran']);
Route::get('/barang', [BarangController::class, 'barang']);
Route::get('/logout', [UserController::class, 'logout']);
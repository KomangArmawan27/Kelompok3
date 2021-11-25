<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
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
Route::get('/register', [UserController::class, 'registration']);
Route::post('/auth', [UserController::class, 'postLogin']);
Route::post('/reg', [UserController::class, 'postRegistration']);
Route::get('/dashboard', [DashboardController::class, 'admin']);
Route::get('/dashboard', [DashboardController::class, 'user']);
Route::get('/pemasukan', [PemasukanController::class, 'pemasukan']);
Route::get('/pengeluaran', [PengeluaranController::class, 'pengeluaran']);
Route::get('/logout', [UserController::class, 'logout']);
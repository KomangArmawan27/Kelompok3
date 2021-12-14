<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\lupaPasswordController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\UserBarangController;
use App\Http\Controllers\userPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/userPage', [userPageController::class, 'userPage']);
Route::post('/contact', [userPageController::class, 'sendMail']);
Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/dashboard', [DashboardController::class]);
    Route::get('/dashboard',function(){
        if(Auth::user()->admin == 1){
        return view('admin');
    }else{
        return view('user');
        }
    });
});
Route::get('admin', ['middleware' => 'web', 'auth', 'admin'], function(){
    return view('admin');
});
Route::get('/dashboard', [DashboardController::class, 'data']);

// route pemasukan
Route::get('/pemasukan', [PemasukanController::class, 'pemasukan']);
Route::get('/editPemasukan/{id}', [PemasukanController::class, 'editPemasukan']);
Route::get('/hapusPemasukan/{id}', [PemasukanController::class, 'hapusPemasukan']);
Route::post('/updatePemasukan', [PemasukanController::class, 'update']);
Route::get('/tambahPemasukan', [PemasukanController::class, 'tambahPemasukan']);
Route::post('/storePemasukan', [PemasukanController::class, 'store']);

// route pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'pengeluaran']);
Route::get('/tambahPengeluaran', [PengeluaranController::class, 'tambahPengeluaran']);
Route::post('/storePengeluaran', [PengeluaranController::class, 'store']);
Route::get('/editPengeluaran/{id}', [PengeluaranController::class, 'editPengeluaran']);
Route::get('/hapusPengeluaran/{id}', [PengeluaranController::class, 'hapusPengeluaran']);
Route::post('/updatePengeluaran', [PengeluaranController::class, 'update']);

//route Generate Report
Route::get('/export', [DashboardController::class,'export']);


Route::get('/barang', [BarangController::class, 'barang']);
Route::get('/editStok/{id}', [BarangController::class, 'editStok']);
Route::post('/updateStok', [BarangController::class, 'update']);
Route::get('/logout', [UserController::class, 'logout']);


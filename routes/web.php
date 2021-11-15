<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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

Route::get('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'register']);
Route::group(['middleware' => ['jwt.verify','jwt.verify:admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'admin']);
});
Route::group(['middleware' => ['jwt.verify','jwt.verify:admin, user']], function() {
    Route::get('/dashboard', [DashboardController::class, 'user']);
});
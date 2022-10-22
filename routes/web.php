<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Back\ComplaintController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProdukController;
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

Route::get('/login', [AuthController::class, 'login']);

// Back

Route::get('/', [FrontController::class, 'index']);

// Route::resource('user', UserController::class);

// Complaint
Route::resource('complaint', ComplaintController::class);
Route::get('status-diproses/{id}', [ComplaintController::class, 'statusDiproses']);
Route::get('status-selesai/{id}', [ComplaintController::class, 'statusSelesai']);

// Front

Route::get('dashboard', [HomeController::class, 'index']);

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('front/login', [FrontController::class, 'login']);

Route::resource('role', RoleController::class);
Route::resource('tiket', TiketController::class);
Route::resource('produk', ProdukController::class);
Route::resource('user', UserController::class);
Route::resource('layanan', LayananController::class);
Route::resource('produk', ProdukController::class);
Route::resource('level', LevelController::class);
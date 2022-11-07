<?php

use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\TiketController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
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

// Back

Route::get('/', [FrontController::class, 'index']);

// Front

Route::get('dashboard', [HomeController::class, 'index']);

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::resource('tiket', TiketController::class);

Route::resource('produk', ProdukController::class);

Route::resource('user', UserController::class);

Route::resource('layanan', LayananController::class);

Route::resource('produk', ProdukController::class);

Route::resource('level', LevelController::class);

Route::resource('tiket', TiketController::class);
Route::get('status-diproses/{id}', [TiketController::class, 'statusDiproses']);
Route::get('status-selesai/{id}', [TiketController::class, 'statusSelesai']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile/update', [ProfileController::class, 'update']);
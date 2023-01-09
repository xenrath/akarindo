<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::prefix('admin')->middleware('admin')->group(function () {
  Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
  Route::resource('tiket', \App\Http\Controllers\Admin\TiketController::class);
  Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
  Route::resource('level', \App\Http\Controllers\Admin\LevelController::class);
  Route::resource('layanan', \App\Http\Controllers\Admin\LayananController::class);
  Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class);
  Route::get('status-diproses/{id}', [\App\Http\Controllers\Admin\TiketController::class, 'statusDiproses']);
  Route::get('status-selesai/{id}', [\App\Http\Controllers\Admin\TiketController::class, 'statusSelesai']);
});

Route::prefix('cs')->middleware('cs')->group(function () {
  Route::get('/', [\App\Http\Controllers\CS\DashboardController::class, 'index']);

  Route::get('tiket/menunggu', [\App\Http\Controllers\CS\TiketController::class, 'menunggu']);
  Route::post('tiket/jawab/{id}', [\App\Http\Controllers\CS\TiketController::class, 'jawab']);
  Route::post('tiket/alihkan/{id}', [\App\Http\Controllers\CS\TiketController::class, 'alihkan']);

  Route::get('tiket/proses', [\App\Http\Controllers\CS\TiketController::class, 'proses']);
  Route::get('tiket/konfirmasi/{id}', [\App\Http\Controllers\CS\TiketController::class, 'konfirmasi']);

  Route::get('tiket/selesai', [\App\Http\Controllers\CS\TiketController::class, 'selesai']);

  Route::resource('tiket', \App\Http\Controllers\CS\TiketController::class);
});

Route::prefix('teknisi')->middleware('teknisi')->group(function () {
  Route::get('/', [\App\Http\Controllers\Teknisi\DashboardController::class, 'index']);

  Route::get('tiket/menunggu', [\App\Http\Controllers\Teknisi\TiketController::class, 'menunggu']);
  Route::get('tiket/kerjakan/{id}', [\App\Http\Controllers\Teknisi\TiketController::class, 'kerjakan']);
  Route::post('tiket/alihkan/{id}', [\App\Http\Controllers\Teknisi\TiketController::class, 'alihkan']);

  Route::get('tiket/proses', [\App\Http\Controllers\Teknisi\TiketController::class, 'proses']);
  Route::get('tiket/konfirmasi/{id}', [\App\Http\Controllers\Teknisi\TiketController::class, 'konfirmasi']);

  Route::get('tiket/selesai', [\App\Http\Controllers\Teknisi\TiketController::class, 'selesai']);

  Route::resource('tiket', \App\Http\Controllers\Teknisi\TiketController::class);
});


Route::prefix('client')->middleware('client')->group(function () {
  Route::get('/', [\App\Http\Controllers\Client\DashboardController::class, 'index']);

  Route::get('tiket/menunggu', [\App\Http\Controllers\Client\TiketController::class, 'menunggu']);

  Route::get('tiket/proses', [\App\Http\Controllers\Client\TiketController::class, 'proses']);
  Route::get('tiket/konfirmasi/{id}', [\App\Http\Controllers\Client\TiketController::class, 'konfirmasi']);

  Route::get('tiket/riwayat', [\App\Http\Controllers\Client\TiketController::class, 'riwayat']);

  Route::resource('tiket', \App\Http\Controllers\Client\TiketController::class);
});

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile/update', [ProfileController::class, 'update']);
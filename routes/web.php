<?php

use App\Events\Realtime;
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

Route::get('push', function () {
  Realtime::dispatch('Hello World');
});

// Front

Route::get('dashboard', [HomeController::class, 'index']);

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('admin')->group(function () {
  Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
  Route::get('tiket/menunggu', [\App\Http\Controllers\Admin\TiketController::class, 'menunggu']);
  Route::get('tiket/proses', [\App\Http\Controllers\Admin\TiketController::class, 'proses']);
  Route::get('tiket/selesai', [\App\Http\Controllers\Admin\TiketController::class, 'selesai']);
  Route::get('tiket/konfirmasi_proses/{id}', [\App\Http\Controllers\Admin\TiketController::class, 'konfirmasi_proses']);
  Route::get('tiket/konfirmasi_selesai/{id}', [\App\Http\Controllers\Admin\TiketController::class, 'konfirmasi_selesai']);
  Route::resource('tiket', \App\Http\Controllers\Admin\TiketController::class);
  Route::get('user/cs', [\App\Http\Controllers\Admin\UserController::class, 'cs']);
  Route::get('user/teknisi', [\App\Http\Controllers\Admin\UserController::class, 'teknisi']);
  Route::get('user/client', [\App\Http\Controllers\Admin\UserController::class, 'client']);
  Route::get('user/nonaktif/{id}', [\App\Http\Controllers\Admin\UserController::class, 'nonaktif']);
  Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
  Route::resource('level', \App\Http\Controllers\Admin\LevelController::class);
  Route::resource('layanan', \App\Http\Controllers\Admin\LayananController::class);
  Route::resource('sublayanan', \App\Http\Controllers\Admin\SubLayananController::class);
  Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class);
  Route::resource('faq', \App\Http\Controllers\Admin\FaqController::class);
  Route::get('report', [\App\Http\Controllers\Admin\ReportController::class, 'index']);
  Route::get('report/print', [\App\Http\Controllers\Admin\ReportController::class, 'print']);
});

Route::prefix('cs')->middleware('cs')->group(function () {
  Route::get('/', [\App\Http\Controllers\CS\DashboardController::class, 'index']);

  Route::resource('obrolan', \App\Http\Controllers\CS\ObrolanController::class);

  Route::get('tiket/menunggu', [\App\Http\Controllers\CS\TiketController::class, 'menunggu']);
  Route::get('tiket/proses', [\App\Http\Controllers\CS\TiketController::class, 'proses']);
  Route::get('tiket/selesai', [\App\Http\Controllers\CS\TiketController::class, 'selesai']);

  Route::post('tiket/konfirmasi_jawab/{id}', [\App\Http\Controllers\CS\TiketController::class, 'konfirmasi_jawab']);
  Route::post('tiket/konfirmasi_alihkan/{id}', [\App\Http\Controllers\CS\TiketController::class, 'konfirmasi_alihkan']);
  Route::get('tiket/konfirmasi_selesai/{id}', [\App\Http\Controllers\CS\TiketController::class, 'konfirmasi_selesai']);

  Route::get('tiket/teknisi/{id}', [\App\Http\Controllers\CS\TiketController::class, 'teknisi']);

  Route::resource('tiket', \App\Http\Controllers\CS\TiketController::class);
});

Route::prefix('teknisi')->middleware('teknisi')->group(function () {
  Route::get('/', [\App\Http\Controllers\Teknisi\DashboardController::class, 'index']);

  Route::get('tiket/menunggu', [\App\Http\Controllers\Teknisi\TiketController::class, 'menunggu']);
  Route::get('tiket/proses', [\App\Http\Controllers\Teknisi\TiketController::class, 'proses']);
  Route::get('tiket/selesai', [\App\Http\Controllers\Teknisi\TiketController::class, 'selesai']);
  
  Route::get('tiket/konfirmasi_kerjakan/{id}', [\App\Http\Controllers\Teknisi\TiketController::class, 'konfirmasi_kerjakan']);
  Route::get('tiket/konfirmasi_selesai/{id}', [\App\Http\Controllers\Teknisi\TiketController::class, 'konfirmasi_selesai']);

  Route::resource('tiket', \App\Http\Controllers\Teknisi\TiketController::class);
  
  Route::get('tiket/komentar/{id}', [\App\Http\Controllers\Teknisi\TiketController::class, 'komentar']);
  Route::post('tiket/buat_komentar', [\App\Http\Controllers\Teknisi\TiketController::class, 'buat_komentar']);
});


Route::prefix('client')->middleware('client')->group(function () {
  Route::get('/', [\App\Http\Controllers\Client\DashboardController::class, 'index']);

  Route::resource('obrolan', \App\Http\Controllers\Client\ObrolanController::class);

  Route::get('tiket/menunggu', [\App\Http\Controllers\Client\TiketController::class, 'menunggu']);
  Route::get('tiket/proses', [\App\Http\Controllers\Client\TiketController::class, 'proses']);
  Route::get('tiket/selesai', [\App\Http\Controllers\Client\TiketController::class, 'selesai']);
  Route::get('tiket/konfirmasi_selesai/{id}', [\App\Http\Controllers\Client\TiketController::class, 'konfirmasi_selesai']);
  Route::resource('tiket', \App\Http\Controllers\Client\TiketController::class);
  
  Route::get('tiket/komentar/{id}', [\App\Http\Controllers\Client\TiketController::class, 'komentar']);
  Route::post('tiket/buat_komentar', [\App\Http\Controllers\Client\TiketController::class, 'buat_komentar']);

  Route::get('faq', [\App\Http\Controllers\Client\FaqController::class, 'index']);
});

Route::get('client/nonaktif', [\App\Http\Controllers\Client\DashboardController::class, 'nonaktif']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile/update', [ProfileController::class, 'update']);

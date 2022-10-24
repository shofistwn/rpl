<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController,
    ArtikelController
};
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

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin|guru')->group(function () {
        route::resource('/artikel', ArtikelController::class)->except('index', 'show');
        route::resource('/guru', GuruController::class)->except('index', 'show');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('pages.home');
})->name('index');

Route::get('admin-page', function () {
    return 'Halaman untuk Admin';
})->middleware('role:admin')->name('admin.page');

Route::get('guru-page', function () {
    return 'Halaman untuk Guru';
})->middleware('role:guru')->name('guru.page');

Route::controller(ArtikelController::class)->prefix('artikel')->name('artikel.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show');
});

Route::controller(GuruController::class)->prefix('guru')->name('guru.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

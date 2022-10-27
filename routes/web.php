<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    GuruController,
    ArtikelController,
    LokerController
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

// user perlu login untuk mengakses
Route::middleware('auth')->group(function () {
    // user harus memiliki role admin atau guru untuk mengakses
    Route::middleware('role:admin|guru')->group(function () {
        route::resource('/artikel', ArtikelController::class)->except('index', 'show');
        route::resource('/loker', LokerController::class)->except('index', 'show');
    });

    // user harus memiliki role admin untuk mengakses
    Route::middleware('role:admin')->group(function () {
        route::resource('/guru', GuruController::class)->except('index', 'show');

        Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/guru', 'guru')->name('guru');
            Route::get('/artikel', 'artikel')->name('artikel');
            Route::get('/loker', 'loker')->name('loker');
        });
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
    Route::get('/search', 'search')->name('search');
});

Route::controller(GuruController::class)->prefix('guru')->name('guru.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::controller(LokerController::class)->prefix('loker')->name('loker.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

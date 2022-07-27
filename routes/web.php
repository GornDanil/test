<?php

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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PastesController;

Route::get('/', [ PastesController::class, 'homeData' ])->name('home');

//Route::view('/paste', 'paste')->name('paste');

Route::group(['name' => 'user.'], function(){

    Route::get(
        '/private',
        [ PastesController::class, 'privateData' ]
    )->middleware('auth')->name('private');

    Route::group(['name' => 'login.'], function() {
        Route::get('/', [LoginController::class, 'viewLogin'])->name('view');
        Route::post('/', [LoginController::class, 'login'])->name('store');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['name' => 'registration.'], function () {
        Route::get('/', [RegisterController::class, 'authLog'])->name('get');
        Route::post('/', [RegisterController::class, 'save'])->name('store');
    });
});


Route::post('/paste/submit', [ PastesController::class, 'submit' ])->name('paste-form');
Route::get(
    '/paste/all',
    [ PastesController::class, 'allData', 'all' ]
)->name('contact-data');

Route::get(
    'paste/{id}',
    [ PastesController::class, 'showOneMessage' ]
)->name('contact-data-one');

<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PastesController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [PastesController::class, 'allData'])->name('home');

Route::view('/paste', 'paste')->name('paste');

Route::name('user.')->group(function () {
    Route::get(
        '/private',
        [PastesController::class, 'privateData']
    )->middleware('auth')->name('private');

    Route::view('login', 'login')->middleware('guest')->name('login.view');
    Route::post('login', [LoginController::class, 'login'])->name('login.store');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::view('/registration', 'registration')->middleware('guest')->name('registration.get');
    Route::post('/registration', [RegisterController::class, 'save'])->name('registration.store');
});


Route::post('/paste/submit', [PastesController::class, 'submit'])->name('paste-form');
Route::get(
    '/paste/all',
    [PastesController::class, 'allData', 'all']
)->name('contact-data');

Route::get(
    'paste/{id}',
    [PastesController::class, 'showOneMessage']
)->name('contact-data-one');

Route::middleware('auth')->get('/test', function () {
    dd(Auth::user());
});

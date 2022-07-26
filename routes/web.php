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

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/paste', function () {
    return view('paste');
})->name('paste');






Route::name('user.')->group(function(){

    //Route::view('/private', 'paste')->middleware('auth')->name('private');
    Route::get(
        '/private', 
        [ PastesController::class, 'privateData' ]
    )->middleware('auth')->name('private');
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    
    Route::post('/registration', [RegisterController::class, 'save']);
});


Route::post('/paste/submit', [ PastesController::class, 'submit' ])->name('paste-form');
Route::get(
    '/paste/all', 
    [ PastesController::class, 'allData', 'all' ]
)->name('contact-data');
Route::get(
    '/{id}', 
    [ PastesController::class, 'showOneMessage' ]
    )->name('contact-data-one');


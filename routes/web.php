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

Route::get('/', function () {
    return view('layout.master');
})->name('test');

Route::get('/login', 'AuthenticationController@login')->name('authentication.login');
Route::post('/login', 'AuthenticationController@checkLogin')->name('authentication.checkLogin');

Route::middleware(['auth.login'])->group(function () {

});

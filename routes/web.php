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

Route::get('/11', function () {
    return view('client.index');
});

Route::get('/login', 'AuthenticationController@login')->name('authentication.login');
Route::post('/login', 'AuthenticationController@checkLogin')->name('authentication.checkLogin');

Route::middleware(['auth.login'])->group(function () {
    Route::prefix('client')->group(function () {
        Route::get('/', 'ClientController@index')->name('client.index');
        Route::get('ajax-get', 'ClientController@getClient')->name('client.get');
        Route::get('create', 'ClientController@create')->name('client.create');
        Route::post('store', 'ClientController@store')->name('client.store');

        Route::post('delete/{id}', 'ClientController@delete')->name('client.delete');
        Route::get('show/{id}', 'ClientController@show')->name('client.show');
        Route::get('update/{id}', 'ClientController@update')->name('client.delete');
    });
});

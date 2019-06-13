<?php

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

//User
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/lokasi', 'LokasiController');
Route::post('/lokasi/search', 'LokasiController@search')->name('search_lokasi');

//Sebaran Lokasi
Route::get('/peta', 'MapsController@index')->name('peta');
Route::get('/peta/{id}', 'MapsController@wilayah')->name('petawilayah');

//Misc
Route::get('/register', function() {
    return redirect('/');
});
Route::get('/home', function() {
    return redirect('/');
});
Auth::routes();

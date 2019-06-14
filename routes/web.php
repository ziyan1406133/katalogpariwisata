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

//Admin
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::resource('/user', 'UserController');
Route::resource('/wilayah', 'WilayahController');
Route::resource('/foto', 'FotoController');
//Edit Password
Route::get('/editpassword/{id}/user', 'UserController@editpassword')->name('edit');
Route::put('/editpassword/{id}', 'UserController@editpassword1')->name('password');

//Guest
Route::get('/', 'HomeController@index')->name('home');
Route::post('/lokasi/search', 'LokasiController@search')->name('search_lokasi');

//
Route::resource('/lokasi', 'LokasiController');

//Sebaran Lokasi
Route::get('/peta', 'MapsController@index')->name('peta');
Route::get('/peta/{id}', 'MapsController@wilayah')->name('petawilayah');
Route::post('/peta/search', 'MapsController@search')->name('search_peta');

//Misc
Route::get('/register', function() {
    return redirect('/');
});
Route::get('/home', function() {
    return redirect('/');
});
Auth::routes();

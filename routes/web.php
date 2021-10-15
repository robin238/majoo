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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kategori', 'KategoriController@index');
Route::get('/inputkategori', 'KategoriController@create');
Route::post('/inputkategori', 'KategoriController@store');
Route::get('/kategori/{kategori}', 'KategoriController@edit');
Route::put('/updatekategori/{kategori}', 'KategoriController@update');
Route::delete('/kategori/hapus/{kategori}', 'KategoriController@destroy');

Route::get('/product', 'ProductController@index');
Route::get('/inputproduct', 'ProductController@create');
Route::post('/inputproduct', 'ProductController@store');
Route::get('/product/{product}', 'ProductController@edit');
Route::put('/updateproduct/{product}', 'ProductController@update');
Route::delete('/product/hapus/{product}', 'ProductController@destroy');
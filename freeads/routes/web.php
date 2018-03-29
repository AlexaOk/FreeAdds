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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@showIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::get('/{user}/edit', 'UserController@edit')->name('auth.edit');

Route::put('/{user}/update', 'UserController@update')->name('auth.update');

Route::put('/{user}/delete', 'UserController@destroy')->name('auth.delete');

Route::get('/auth/passwords/reset', function () {
     return view('/auth/passwords/reset');
 });

Route::get('/annonces', 'AnnoncesController@index');

Route::get('/annonces/new', 'AnnoncesController@create')->name('annonces.create');

Route::put('/annonces/post', 'AnnoncesController@store')->name('annonces.store');

Route::get('/annonces/{annonce}', 'AnnoncesController@show')->name('annonces.show');

Route::get('/annonces/{annonce}/edit', 'AnnoncesController@edit')->name('annonces.edit');

Route::put('/annonces/{annonce}/update', 'AnnoncesController@update')->name('annonces.update');

Route::put('/annonces/{annonce}/delete', 'AnnoncesController@destroy')->name('annonces.delete');

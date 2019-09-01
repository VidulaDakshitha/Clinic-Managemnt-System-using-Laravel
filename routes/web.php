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

Route::get('/', 'PagesController@index');

Route::get('/AdminHome', 'PagesController@adhome');

Route::get('/ServiceTest', 'PostsController@index');

Route::post('/ServiceTest', 'PostsController@store');

Route::put('/ServiceTest/{id}', 'PostsController@update');

Route::get('/ServiceAdmin', 'PostsController@adm');
Route::get('/ServiceAdmin/create', 'PostsController@create');
Route::get('/ServiceTest/{id}/edit', 'PostsController@edit');

Route::delete('/ServiceTest/{id}', 'PostsController@destroy');

Route::get('/Services', 'ServicesController@index')->name('Services');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
Route::get('/AdHome', 'PostsController@admhome');
Route::get('/ServiceTest', 'PostsController@index');
Route::get('/AdminServ', 'PostsController@serv');
Route::get('/gallery', 'PostsController@media');


// Route::post('/ServiceTest', 'PostsController@store');
// Route::put('/ServiceTest/{post}', 'PostsController@update');
// Route::get('/ServiceTest/create', 'PostsController@create');
// Route::get('/ServiceTest/{post}/edit', 'PostsController@edit');
// Route::delete('/ServiceTest/{post}', 'PostsController@destroy');

Route::get('/gallery', 'ArticlesController@index');
Route::post('/gallery', 'ArticlesController@store');
Route::put('/gallery/{article}', 'ArticlesController@update');
Route::get('/gallery/create', 'ArticlesController@create');
Route::get('/gallery/{article}/edit', 'ArticlesController@edit');
Route::delete('/gallery/{article}', 'ArticlesController@destroy');

Route::get('/aboutus', 'NoticesController@index');
Route::post('/aboutus', 'NoticesController@store');
Route::put('/aboutus/{article}', 'NoticesController@update');
Route::get('/aboutus/create', 'NoticesController@create');
Route::get('/aboutus/{article}/edit', 'NoticesController@edit');
Route::delete('/aboutus/{article}', 'NoticesController@destroy');


Route::resource('ServiceTest', 'PostsController');

Route::get('/Services', 'ServicesController@index')->name('Services');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::view('/', 'main.index');
Route::view('/about', 'main.about');
Route::view('/contact', 'main.contact');
Route::view('/login', 'main.login');
Route::view('/search', 'PatientManagement.search');
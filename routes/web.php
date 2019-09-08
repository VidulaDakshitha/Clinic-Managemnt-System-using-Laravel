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
// Route::view('/contact', 'main.about');
Route::view('/contact', 'main.contact');

// Route::view('/search', 'PatientManagement.search');
Route::view('/registerp', 'auth.registerp');
Route::view('/dashboard', 'PatientManagement.patientDashboard');
Auth::routes();

Route::get('/usermanager', 'UserTypeController@manage');
Route::resource('supplier', 'SupplierManagerController');
Route::resource('supplier', 'SupplierManagerController')->middleware('auth_supp');


Route::resource('patient', 'PatientDashboardController');
Route::resource('search', 'SearchController');

//payment routes
Route::get('/paymentHome', function () {
    return view('payment.paymentHome');
});

Route::get('/paymentCard', function () {
    return view('payment.paymentCard');
});

Route::get('/paymentSlip', function () {
    return view('payment.paymentSlip');
});

Route::get('/paymentRefund', function () {
    return view('payment.paymentRefund');
});

Route::get('/paymentSearch', function () {
    return view('payment.paymentSearch');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'PaymentController@search');
Route::resource('payment', 'PaymentController');
Route::get('/card', 'CardController@index');
Route::resource('card', 'CardController');
Route::get('/slip', 'BankSlipController@index');
Route::resource('slip', 'BankSlipController');
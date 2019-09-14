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
Route::view('/contact', 'main.about');
Route::view('/contact', 'main.contact');

Route::view('/search', 'PatientManagement.search');
Route::view('/registerp', 'auth.registerp');
Route::view('/dashboard', 'PatientManagement.patientDashboard');
Route::view('/show', 'PatientManagement.showDoc');
Auth::routes();

Route::get('/usermanager', 'UserTypeController@manage');
Route::resource('supplier', 'SupplierManagerController')->middleware('auth_supp');

// for patients dashboard
Route::resource('patient', 'PatientDashboardController');
// to search doctor
//Route::resource('search', 'SearchController');

// to display doctor
Route::post('showdoctor','ShowDoctorController@search');

// to delete a user
Route::delete('/userdelete/{id}', 'UserProfileController@destroy');



//order managemet system

Route::get('/shoppingcart', function () {
    return view('product_order_system.ShoppingCart');
});

Route::get('/search-product', 'ProductSearchController@index');
Route::get('/viewproduct/{id}', 'ProductSearchController@show');
Route::get('/productshow','ProductViewController@index');
Route::post('search-product','ProductSearchController@search');
Route::get('/admindash','ProductAdminDashController@index')->middleware('auth');
Route::post('admindash','ProductAdminDashController@search');
Route::post('admindash_status','ProductAdminDashController@updatesatus');
Route::get('/paitientorderdash','PaitientOrderDashController@indexpaitent')->middleware('auth');
Route::post('/paitientorderdash','PaitientOrderDashController@searchgeneral');
Route::post('/paitientorderdash','PaitientOrderDashController@searchmedical');
Route::post('paitientorderdash/edit','PaitientOrderDashController@showedit');
Route::post('paitientorderdash/updateorder','PaitientOrderDashController@updates');
Route::resource('paitintorder','PaitientOrderDashController');
Route::get('/user-prescriptions','PaitientPrescriptionsController@index');
Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getAddToCart',
    'as'=>'product.addToCart'
]);

Route::get('/reduce-product/{id}',[
    'uses'=>'ProductController@getReduceByone',
    'as'=>'product.reducedbyone'
]);
//Route::get('show-cart','ProductController@getCart');
Route::get('/show-cart',[
    'uses'=>'ProductController@getCart',
    'as'=>'product.show-cart'
]);
Route::get('/getcheckout',[
    'uses'=>'ProductController@getcheckout',
    'as'=>'product-chek-out'
]);

Route::get('go-to-cart','ShoppingCartController@index');



//Product Management

Route::get('/product', 'ProductManagementController@index');

Route::resource('product', 'ProductManagementController');

Route::delete('/productdelete/{id}', 'ProductManagementController@destroy');

Route::post('/store', 'ProductManagementController@store');
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



Route::get('/shoppingcart', function () {
    return view('product_order_system.ShoppingCart');
});

Route::get('/search', 'ProductSearchController@index');
Route::get('/viewproduct/{id}', 'ProductSearchController@show');
Route::get('/productshow','ProductViewController@index');
Route::post('search','ProductSearchController@search');
Route::get('/admindash','ProductAdminDashController@index');
Route::post('admindash','ProductAdminDashController@search');
Route::post('admindash_status','ProductAdminDashController@updatesatus');
Route::get('/paitientorderdash','PaitientOrderDashController@indexpaitent');
Route::post('/paitientorderdash/general','PaitientOrderDashController@searchgeneral');
Route::post('/paitientorderdash/medical','PaitientOrderDashController@searchmedical');
Route::post('paitientorderdash/edit','PaitientOrderDashController@showedit');
Route::post('paitientorderdash/updateorder','PaitientOrderDashController@updates');
Route::resource('paitintorder','PaitientOrderDashController');
Route::get('/user-prescriptions','PaitientPrescriptionsController@index');




Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getAddToCart',
    'as'=>'product.addToCart'
]);


//Route::get('show-cart','ProductController@getCart');

Route::get('/show-cart',[
    'uses'=>'ProductController@getCart',
    'as'=>'product.show-cart'
]);

Route::get('go-to-cart','ShoppingCartController@index');





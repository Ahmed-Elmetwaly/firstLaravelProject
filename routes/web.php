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

Route::get('home','HomeController@index');

// frontend
Route::get('/','FrontController@index')->name('home');
Route::get('/shirts','FrontController@shirts')->name('shirts');
Route::get('/shirt','FrontController@shirt')->name('shirt');

Auth::routes();

// Auth
Route::get('logout','Auth\LoginController@logout');

Route::group(['prefix'=>'admin','middleware'=>['admin','auth',]], function () {
	Route::get('/', function () {
		return view('admin.index');
	})->name('admin.index');

	Route::resource('product','ProductsController');
	Route::resource('category','CategoriesController');
	Route::get('orders/{type?}','OrderController@orders');
	Route::post('toggledeliver/{orderId}','orderController@toggledeliver')->name('toggle.delivered');
	Route::get('orders/{type?}','orderController@orders');
});

// Cart
Route::resource('/cart','CartController');
Route::get('/cart/add-item/{id}','CartController@addItem')->name('cart.addItem');

// Route::get('checkout','CheckoutController@step1');

Route::get('payment','CheckoutController@payment')->name('checkout.payment');
Route::post('store-payment','CheckoutController@storePayment')->name('payment.store');

// shipping-info and address
Route::group(['middleware'=>'auth'],function(){
	Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');	
});
Route::resource('address','AddressController');

// orders

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'DashboardController@index');

Route::get('/kategori', 'CategoryController@show');

// Admin Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('/admin/users', 'Admin\UsersController');
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/product', 'Admin\ProductController');

// Route Login
Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');

Route::get('facebook', 'FacebookController@redirect');
Route::get('facebook/callback', 'FacebookController@callback');

Auth::routes();
Route::resource('/alamat', 'AddressController');
Route::resource('/kategori', 'CategoryController');
Route::resource('/kategori', 'CartController');

Route::get('/cart', 'Cart2Controller@cart')->name('cart.index');
Route::post('/add', 'Cart2Controller@add')->name('cart.store');
Route::post('/update', 'Cart2Controller@update')->name('cart.update');
Route::post('/remove', 'Cart2Controller@remove')->name('cart.remove');
Route::post('/clear', 'Cart2Controller@clear')->name('cart.clear');

// Route::get('/checkout', 'Site\CheckoutController@getCheckout')
// 	->middleware('auth')
// 	->name('checkout.index');
// Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')
// 	->middleware('auth')
// 	->name('checkout.place.order');
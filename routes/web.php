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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/',function() {
    return view('home');

});

Route::get('/consumer',function() {
    return view('pages.consumer');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sell',function() {
    return view('farmer.sell');
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
  });

Route::resource('sales','SalesController');

Route::resource('cart_items','CartController');

Route::get('/checkout','CartController@show');

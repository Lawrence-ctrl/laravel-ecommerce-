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
Route::get('/', function(){
    return view('userview.index');
});

Route::get('/categories','User\CategoriesController@index')->name('categories.index');
Route::post('/categories','User\CategoriesController@index')->name('categories.index');
Route::get('/details/{id}','User\ProductsController@show')->name('details');

Route::group(['as' => 'cart.', 'prefix' =>'cart', 'middleware' =>'auth'],function(){
    Route::post('/','User\CartController@store')->name('store');
    Route::get('/cart','User\CartController@index')->name('cart');
    Route::get('/remove/{id}','User\CartController@remove')->name('remove');
    Route::post('/update','User\CartController@update')->name('update');
});

Route::get('/cart/empty','User\CartController@empty')->name('cart.empty');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function() {
    Route::get('/','Admin\DashboardController@index')->name('index');
    
});

Route::get('/admin/login','Auth\AdminLoginController@showAdminLoginForm')->name('admin.loginformshow');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::post('/admin/logout','Auth\AdminLoginController@adminlogout')->name('admin.logout');

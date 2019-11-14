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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/product/{id}',[
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);


Route::post('/cart/add', [
    'uses' => 'ShoppingController@add_to_cart',
    'as' =>  'cart.add'
]);

Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/increment/{id}/{quantity}', [
    'uses' => 'ShoppingController@increment',
    'as' => 'cart.increment'
]);

Route::get('/cart/decrement/{id}/{quantity}', [
    'uses' => 'ShoppingController@decrement',
    'as' => 'cart.decrement'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/checkout',[
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay', 
    'as' => 'cart.checkout'
]);


Route::resource('products', 'ProductsController');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

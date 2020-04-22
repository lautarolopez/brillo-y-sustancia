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


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/profile', function(){
    $user = Auth::user();
    return view('profile', compact('user'));
})->name('profile');

Route::get('/cart', 'CartController@show')->name('cart');

Route::get('/addtocart/{product}', 'CartController@addToCart')->name('addToCart');
Route::delete('/cart/delete/{product}', 'CartController@removeFromCart')->name('deleteFromCart');
Route::post('/', 'ContactController@store')->name('home');
Route::post('/#contact', 'ContactController@store')->name('contact');

Route::resource('products', 'ProductController');
Route::get('/productos/{category}', 'ProductController@categoryIndex')->name('products.index.category');
Auth::routes();

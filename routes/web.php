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

Route::get('/bys-admin', 'AdminController@dashboard')->name('admin.dashboard')->middleware('adminPermission');

Route::get('/perfil', function(){
    $user = Auth::user();
    return view('profile', compact('user'));
})->name('profile');

Route::get('/carrito', 'CartController@show')->name('cart');

Route::get('/añadir-al-carrito/{product}', 'CartController@addToCart')->name('addToCart');
Route::delete('/carrito/eliminar/{product}', 'CartController@removeFromCart')->name('deleteFromCart');
Route::post('/', 'ContactController@store')->name('home');
Route::post('/#contact', 'ContactController@store')->name('contact.send');
Route::post('/realizar-compra', 'SalesController@CheckOutCart')->name('checkOutCart');
Route::resource('productos', 'ProductController')->names([
    'store' => 'products.store',
    'index' => 'products.index',
    'create' => 'products.create',
    'show' => 'products.show',
    'update' => 'products.update',
    'destroy' => 'products.destroy',
    'edit'=> 'products.edit',
])->parameters([
    'productos' => 'product'
]);
Route::get('/productos/categorias/{category}', 'ProductController@categoryIndex')->name('products.index.category');
Route::localizeAuth();

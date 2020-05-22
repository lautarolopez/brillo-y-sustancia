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
Route::post('/procesar-pago', 'SalesController@successMercadoPagoPayment');
Route::get('/payment-success', 'SalesController@paymentSuccess');
Route::get('/payment-failure', 'SalesController@paymentFailure');
// ruta al enviar correo
Route::post('/send', 'ContactController@send');
Route::post('/editar-perfil','UserController@editarPerfil')->name('editarPerfil');

Route::get('/perfil', function(){
    $user = Auth::user();
    return view('profile', compact('user'));
})->name('profile');

Route::get('/carrito', 'CartController@show')->name('cart');

Route::get('/añadir-al-carrito/{product}', 'CartController@addToCart')->name('addToCart');
Route::delete('/carrito/eliminar', 'CartController@removeFromCart')->name('deleteFromCart');
Route::post('/', 'ContactController@store')->name('home');
Route::post('/#contact', 'ContactController@store')->name('contact.send');
Route::post('/realizar-compra', 'SalesController@CheckOutCart')->name('checkOutCart');
Route::post('/finalizar-compra', 'SalesController@redirectToMercadoPago')->name('redirectToMercadoPago');
Route::resource('productos', 'ProductController')->names([
    'index' => 'products.index',
    'show' => 'products.show',
])->parameters([
    'productos' => 'product'
])->only([
    'index',
    'show',
]);
Route::get('/productos/categorias/{category}', 'ProductController@categoryIndex')->name('products.index.category');
Route::resource('mis-direcciones', 'AddressController')->names([
    'store' => 'addresses.store',
    'index' => 'addresses.index',
    'create' => 'addresses.create',
    'update' => 'addresses.update',
])->parameters([
    'direcciones' => 'address'
])->middleware('auth')->only([
    'store',
    'index',
    'create',
    'update',
]);
Route::localizeAuth();

// Admin panel routes
Route::get('/bys-admin', 'AdminController@dashboard')->name('admin.dashboard')->middleware('adminPermission');
Route::get('/bys-admin/usuarios', 'UserController@index')->name('users.index')->middleware('adminPermission');
Route::patch('bys-admin/usuarios/{user}', 'UserController@changePermissions')->name('users.changePermissions')->middleware('adminPermission');
Route::get('/bys-admin/ventas', 'SalesController@index')->name('sales.index')->middleware('adminPermission');
Route::patch('bys-admin/ventas/marcar-enviada/{sale}', 'SalesController@setShipped')->name('sales.setShipped')->middleware('adminPermission');
Route::patch('bys-admin/ventas/marcar-completada/{sale}', 'SalesController@setCompleted')->name('sales.setCompleted')->middleware('adminPermission');
Route::get('/bys-admin/categorias', 'CategoryController@index')->name('categories.index')->middleware('adminPermission');
Route::get('/bys-admin/categorias/crear', 'CategoryController@create')->name('categories.create')->middleware('adminPermission');
Route::post('bys-admin/categories', 'CategoryController@store')->name('categories.store')->middleware('adminPermission');
Route::delete('/bys-admin/categorias/{category}', 'CategoryController@destroy')->name('categories.destroy')->middleware('adminPermission');
Route::resource('/bys-admin/productos', 'ProductController')->names([
    'store' => 'admin-products.store',
    'create' => 'admin-products.create',
    'update' => 'admin-products.update',
    'destroy' => 'admin-products.destroy',
    'edit'=> 'admin-products.edit',
])->parameters([
    'productos' => 'product'
])->except([
    'show',
    'index',
]);
Route::get('/bys-admin/productos', 'ProductController@indexAdmin')->name('admin-products.index')->middleware('adminPermission');
Route::get('/bys-admin/limpiar-carritos-inactivos', 'CartController@cleanInactiveCarts')->name('cleanCarts')->middleware('adminPermission');

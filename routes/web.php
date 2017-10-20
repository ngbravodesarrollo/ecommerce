<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/home', 'HomeController@index')->name('home');
//login usuario config
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('datos/personales','DatosPersonalesController');
Route::get('datos/usuario/{usuario}/edit','UsuarioController@edit');
Route::patch('datos/usuario/{usuario}','UsuarioController@update')->name('datos.usuario.update');
Route::get('datos/usuario/{usuario}/editpass','UsuarioController@editpass');
Route::patch('datos/usuario/{usuario}/editpass','UsuarioController@updatepass')->name('usuario.pass.update');
//vistas
Route::get('/', function () {
    return view('welcome');
    //return view('auth/login');
});
Route::get('productos',function (){
	return view('tienda/producto');
});
//Web metodos
Route::get('api/articulos','TiendaController@articulos');
Route::get('api/categorias','TiendaController@categorias');
Route::get('api/metales','TiendaController@metales');
Route::get('api/colecciones','TiendaController@colecciones');
//carrito
//Route::get('carrito/mercadopago/getToken','CarritoController@getToken');

Route::get('carrito/items','CarritoController@index');
Route::post('carrito/items','CarritoController@addCarrito');//store method
Route::delete('carrito/items','CarritoController@flushCarrito');
Route::delete('carrito/items/{carrito}','CarritoController@removeCarrito');
Route::patch('carrito/items/{carrito}','CarritoController@updateCant');
Route::post('carrito/action/mercadopago','CarritoController@createPreference');
//return preferences
Route::get('carrito/action/susecces','CarritoController@suseccesPreference');
Route::get('carrito/action/pending','CarritoController@pendingPreference');
Route::get('carrito/action/failure','CarritoController@failurePreference');
//administracion 
Route::resource('almacen/categorias','CategoriaController');
Route::resource('almacen/metales','MetalController');
Route::resource('almacen/colecciones','ColeccionController');
Route::resource('almacen/articulos','ArticuloController');
Route::resource('ventas/clientes','PersonaController');
Route::resource('compras/proveedores','ProveedorController');
Route::resource('compras/ingresos','IngresoController');
Route::resource('ventas/ventas','VentaController');
Route::resource('seguridad/usuario','UsuarioController');

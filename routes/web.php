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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

//validar que este logeado ahuevo :v si no regresa al login
Route::group(['middleware' => ['auth']], function(){



Route::get('/home', 'HomeController@index')->name('home');

//mandar a traer las rutas
Route::resource('proveedores', 'ProveedorController');
Route::resource('clientes', 'ClienteController');
Route::resource('productos', 'ProductosController');
//para exportar a pdf
Route::get('proveedores-pdf', 'ProveedorController@exportPDF')->name('proveedores.pdf');
Route::get('clientes-pdf', 'ClienteController@exportPDF')->name('clientes.pdf');
Route::get('productos-pdf', 'ProductosController@exportPDF')->name('productos.pdf');

});
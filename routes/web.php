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
})->name('inicio');;*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::post('/menu', 'HomeController@menu');


Route::get('/salir', 'LoginController@salir');

Route::post('/perfil', 'user@perfil');

Route::prefix('producto')->group(function () {
    Route::post('/get/', 'catalogo\\producto@index');
    Route::post('/getData/', 'catalogo\\producto@getData');
    Route::post('/guadar/', 'catalogo\\producto@registrar');
});

Route::prefix('productoEstados')->group(function () {
    Route::post('/get/', 'catalogo\\producto@index');
    Route::post('/guadar/', 'catalogo\\producto@registrar');
});

Route::prefix('proveedor')->group(function () {
    Route::post('/get/', 'catalogo\\proveedorController@index');
    Route::post('/guardar/', 'catalogo\\proveedorController@registrar');
    Route::post('/eliminar/', 'catalogo\\proveedorController@eliminar');
});

Route::prefix('categoria')->group(function () {
    Route::post('/get/', 'catalogo\\categoriaController@index');
    Route::post('/guardar/', 'catalogo\\categoriaController@registrar');
    Route::post('/eliminar/', 'catalogo\\categoriaController@eliminar');
});
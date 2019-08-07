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

Route::get('informe-ventas','VentaController@ventasPagadas')->name('informeVentas');
Route::get('/', 'VentaController@index')->name('index');

Route::resource('ventas', 'VentaController', ['except' => ['index']]);
Route::resource('cart', 'DetalleVentaController');

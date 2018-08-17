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

Route::get('/', 'PerformanceController@index')->name('home');
Route::get('/performance/{id}/produto', 'PerformanceController@performancePorProduto')->name('performance.produto');

Route::resource('fabricante','FabricanteController');
Route::resource('marca','MarcaController');
Route::resource('produto','ProdutoController');
Route::resource('disputa','DisputaController');
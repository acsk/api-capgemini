<?php


Route::get('contas', 'Api\ContaController@all');
Route::post('contas/show/{numConta}', 'Api\ContaController@show');
Route::post('contas/sacar/{numConta}/{valor}', 'Api\ContaController@sacar');
Route::post('contas/depositar/{numConta}/{valor}', 'Api\ContaController@depositar');

Route::get('clientes', 'Api\ClienteController@index');
Route::post('clientes', 'Api\ClienteController@store');
Route::put('clientes/{id}', 'Api\ClienteController@update');
Route::delete('clientes/{id}', 'Api\ClienteController@delete');






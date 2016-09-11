<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//rotas series
Route::get('serie/listar', 'SeriesController@listar');
Route::get('serie/criar', 'SeriesController@criar');
Route::get('serie/{id}/editar', 'SeriesController@editar');
Route::get('serie/{id}/remover', 'SeriesController@remover');
Route::post('serie/salvar', 'SeriesController@salvar');

Route::get('temporada/listar', 'TemporadasController@listar');

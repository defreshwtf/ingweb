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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('peticionAsesoria', 'PeticionAsesoriaController')
    ->only([
        "store",
        "index",
        "edit",
        "show",
        "destroy",
    ]);
Route::resource('asesorias', 'AsesoriasController')
    ->only([
        "store",
        "index",
        "destroy",
    ]);

Route::resource('profesores', 'ProfesoresController')
    ->only([
        "index",
        "show",
        "update",
    ]);

Route::resource('materias', 'MateriasController')
    ->only([
        "index",
        "show",
        "update",
    ]);

Route::get('profesoresAceptados', 'ProfesoresController@profesoresAceptados');
Route::get('materiasConProfesoresAceptados', 'MateriasController@materiasConProfesoresAceptados');
Route::get('asesoria/peticiones/{id}', 'AsesoriasController@showInfoPeticiones_Asesoria');
Route::get('asesoria/eliminaPeticion/{id}', 'AsesoriasController@eliminarPeticion_en_Asesoria');

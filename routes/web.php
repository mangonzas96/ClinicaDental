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
Route::delete('Tratamiento/destroyAll', 'TratamientoController@destroyAll')->name('Tratamiento.destroyAll');
Route::resource('Tratamiento', 'TratamientoController');

Route::resource('odontologos', 'OdontologoController');
Route::resource('pacientes', 'PacienteController');


Route::resource('sesiones', 'SesionController');

Auth::routes();

Route::get('/home', 'HomeController@index');


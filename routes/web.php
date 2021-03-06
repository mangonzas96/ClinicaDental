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

Route::get('/registerodontologo', function (){
    return view('auth/registerodontologo');
})->name('auth/registerodontologo');

Route::get('/registerpaciente', function (){
    return view('auth/registerpaciente');
})->name('auth/registerpaciente');

Route::get('/homeodontologo', 'HomeController@index');
Route::get('/homepaciente', 'HomeController@index');

Route::resource('sesions', 'SesionController');

Route::resource('gabinetes', 'GabineteController');

Auth::routes();

Route::get('/home', 'HomeController@index');


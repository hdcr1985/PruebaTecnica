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
    return view('principal');
});

Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');
Route::post('usuarios/add', 'UsuarioController@store')->name('usuarios.store');

Route::get('habitaciones', 'HabitacionesController@index')->name('habitaciones.index');
Route::post('habitaciones/add', 'HabitacionesController@store')->name('habitaciones.store');

Route::get('reservaciones', 'ReservacionesController@index')->name('reservaciones.index');
Route::post('reservaciones/add', 'ReservacionesController@store')->name('reservaciones.store');
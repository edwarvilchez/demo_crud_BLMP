<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de la Aplicación
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# listamos los registros
Route::get('/','UserController@index'); 
# guardamos en la BD
Route::post('users', 'UserController@store')->name('users.store'); 
# borramos el registro por el ID
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

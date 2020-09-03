<?php

use Illuminate\Support\Facades\Route;

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

//Admin
Route::get('/users', 'AdminController@getUsers')->name('getUsers');
Route::get('/municipios', 'AdminController@getMunicipios')->name('getMunicipios');
Route::get('/subdelegaciones', 'AdminController@getSubDelegaciones')->name('getSubDelegaciones');
Route::get('/enfermedades', 'AdminController@getEnfermedades')->name('getEnfermedades');
Route::get('/emergencias', 'AdminController@getEmergencias')->name('getEmergencias');
Route::get('/pacientes', 'AdminController@getPacientes')->name('getPacientes');
Route::get('/fallecidos', 'AdminController@getFallecidos')->name('getFallecidos');
//User


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/day', 'GraphController@day')->name('day');

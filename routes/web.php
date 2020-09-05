<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => 'CheckRole'], function () {
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::get('/municipios', 'AdminController@getMunicipios')->name('getMunicipios');
    Route::get('/subdelegaciones', 'AdminController@getSubDelegaciones')->name('getSubDelegaciones');
    Route::get('/enfermedades', 'AdminController@getEnfermedades')->name('getEnfermedades');
    Route::get('/emergencias', 'AdminController@getEmergencias')->name('getEmergencias');
});

//Operadores
Route::group(['middleware' => 'State'], function () {
    Route::get('/pacientes', 'AdminController@getPacientes')->name('getPacientes');
    Route::get('/fallecidos', 'AdminController@getFallecidos')->name('getFallecidos');
});


//User
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/day', 'GraphController@day')->name('day');
Route::get('/month', 'GraphController@month')->name('month');
Route::get('/year', 'GraphController@year')->name('year');
Route::get('/deceased', 'GraphController@deceased')->name('deceased');
/*Controller query*/
Route::get('/registerDay/{sub_id}/{date_1}/{date_2}', 'GraphController@registerDay');
Route::get('/registerMonth/{sub_id}', 'GraphController@registerMonth');
Route::get('/registerYear/{sub_id}', 'GraphController@registerYear');

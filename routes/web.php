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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('users')->group(function () {
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::get('/addUserView', 'UserController@addUserView')->name('addUserView');
    Route::post('/addUser', 'UserController@addUser')->name('addUser');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::post('/update', 'UserController@update')->name('update');
    Route::get('/delete/{id}', 'UserController@delete')->name('delete');
});

Route::prefix('graph')->group(function () {
    Route::get('/concentrated', 'GraphController@viewconcentrated')->name('concentrated');
    Route::get('/tipServicio', 'GraphController@tipServicio');
});

Route::prefix('bitacora')->group(function () {
    Route::get('/records', 'BitacoraController@records')->name('records');
    Route::get('/formRecords', 'BitacoraController@formRecords')->name('formRecords');
    Route::post('/addRecords', 'BitacoraController@addRecords')->name('addRecords');
    Route::get('/searchRecords', 'BitacoraController@searchRecords')->name('searchRecords');
    Route::delete('/deleteRecords', 'BitacoraController@deleteRecords')->name('deleteRecords');
});

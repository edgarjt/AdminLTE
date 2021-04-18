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
    Route::get('/day', 'GraphController@day')->name('day');
    Route::get('/month', 'GraphController@month')->name('month');
    Route::get('/year', 'GraphController@year')->name('year');
    Route::get('/all', 'GraphController@all')->name('all');
    Route::get('/registerDay/{sub_id}/{date_1}/{date_2}', 'GraphController@registerDay');
    Route::get('/registerDayDeced/{sub_id}/{date_1}/{date_2}', 'GraphController@registerDayDeced');
    Route::get('/registerMonth/{sub_id}', 'GraphController@registerMonth');
    Route::get('/registerMonthDeced/{sub_id}', 'GraphController@registerMonthDeced');
    Route::get('/registerYear/{sub_id}', 'GraphController@registerYear');
    Route::get('/registerYearDeced/{sub_id}', 'GraphController@registerYearDeced');
    Route::get('/registerAll/{data}', 'GraphController@registerAll');
    Route::get('/registerAllDead/{data}', 'GraphController@registerAllDead');
    Route::get('/test', 'GraphController@test');
});

Route::prefix('bitacora')->group(function () {
    Route::get('/records', 'BitacoraController@records')->name('records');
    Route::get('/formRecords', 'BitacoraController@formRecords')->name('formRecords');
    Route::post('/addRecords', 'BitacoraController@addRecords')->name('addRecords');
    Route::get('/searchRecords', 'BitacoraController@searchRecords')->name('searchRecords');
    Route::delete('/deleteRecords', 'BitacoraController@deleteRecords')->name('deleteRecords');
});

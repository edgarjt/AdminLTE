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
    //Reportes
    Route::get('reportsdata/{sub?}/{eme?}/{enf?}/{p2?}', 'PacienteController@reportsData')->name('reports');
    Route::get('reports', 'PacienteController@reports')->name('reports');
    /*Usuarios*/
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::get('/addUserView', 'UserController@addUserView')->name('addUserView');
    Route::post('/addUser', 'UserController@addUser')->name('addUser');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::post('/update', 'UserController@update')->name('update');
    Route::get('/delete/{id}', 'UserController@delete')->name('delete');
    /*Municipios*/
    Route::get('/municipios', 'AdminController@getMunicipios')->name('getMunicipios');
    Route::get('/addMunView', 'MunicipioController@addMunView')->name('addMunView');
    Route::post('/addMun', 'MunicipioController@addMun')->name('addMun');
    Route::get('/editMun/{id}', 'MunicipioController@editMun');
    Route::post('/updateMun', 'MunicipioController@updateMun')->name('updateMun');
    Route::get('/deleteMun/{id}', 'MunicipioController@deleteMun')->name('deleteMun');
    /*Sub delegaciones*/
    Route::get('/subdelegaciones', 'AdminController@getSubDelegaciones')->name('getSubDelegaciones');
    Route::get('/addSubView', 'SubDelegacionController@addSubView')->name('addSubView');
    Route::post('/addSub', 'SubDelegacionController@addSub')->name('addSub');
    Route::get('/editSub/{id}', 'SubDelegacionController@editSub');
    Route::post('/updateSub', 'SubDelegacionController@updateSub')->name('updateSub');
    Route::post('/deletesub', 'SubDelegacionController@deleteSub')->name('deleteSub');
    /*Enfermedades*/
    Route::get('/enfermedades', 'AdminController@getEnfermedades')->name('getEnfermedades');
    Route::get('/addEnfView', 'EnfermedadController@addEnfView')->name('addEnfView');
    Route::get('/addEnfView', 'EnfermedadController@addEnfView')->name('addEnfView');
    Route::post('/addEnf', 'EnfermedadController@addEnf')->name('addEnf');
    Route::get('/editEnf/{id}', 'EnfermedadController@editEnf')->name('editEnf');
    Route::post('/updateEnf', 'EnfermedadController@updateEnf')->name('updateEnf');
    Route::get('/deleteEnf/{id}', 'EnfermedadController@deleteEnf')->name('deleteEnf');
    /*Emergencias*/
    Route::get('/emergencias', 'AdminController@getEmergencias')->name('getEmergencias');
    Route::get('/addEmeView', 'EmergenciaController@addEmeView')->name('addEmeView');
    Route::post('/addEme', 'EmergenciaController@addEme')->name('addEme');
    Route::get('/editEme/{id}', 'EmergenciaController@editEme')->name('editEme');
    Route::post('/updateEme', 'EmergenciaController@updateEme')->name('updateEme');
    Route::get('/deleteEme/{id}', 'EmergenciaController@deleteEme')->name('deleteEme');
});

//Operadores
Route::group(['middleware' => 'State'], function () {
    /*Pacientes*/
    Route::get('/pacientes', 'AdminController@getPacientes')->name('getPacientes');
    Route::get('/editPac/{id}', 'PacienteController@editPac')->name('editPac');
    Route::get('/addPacView', 'PacienteController@addPacView')->name('addPacView');
    Route::post('/addPac', 'PacienteController@addPac')->name('addPac');
    Route::post('/updatePac', 'PacienteController@updatePac')->name('updatePac');
    Route::get('/deletePac/{id}', 'PacienteController@deletePac')->name('deletePac');
    /*Fallecidos*/
    Route::get('/fallecidos', 'AdminController@getFallecidos')->name('getFallecidos');
    Route::get('/addFalView', 'PacienteController@addFalView')->name('addFalView');
    Route::post('/addFal', 'PacienteController@addFal')->name('addFal');
    Route::get('/editFal/{id}', 'PacienteController@editFal')->name('editFal');
    Route::post('/updateFal', 'PacienteController@updateFal')->name('updateFal');
    Route::get('/deleteFal/{id}', 'PacienteController@deleteFal')->name('deleteFal');
});


//User
Route::get('/config', 'UserController@config')->name('configUser');
Route::get('/avatar/{filename}', 'UserController@getImage')->name('profile');
Route::post('/setting', 'UserController@setting')->name('configSetting');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/day', 'GraphController@day')->name('day');
Route::get('/month', 'GraphController@month')->name('month');
Route::get('/year', 'GraphController@year')->name('year');
Route::get('/all', 'GraphController@all')->name('all');
/*Controller query*/
Route::get('/registerDay/{sub_id}/{date_1}/{date_2}', 'GraphController@registerDay');
Route::get('/registerDayDeced/{sub_id}/{date_1}/{date_2}', 'GraphController@registerDayDeced');
Route::get('/registerMonth/{sub_id}', 'GraphController@registerMonth');
Route::get('/registerMonthDeced/{sub_id}', 'GraphController@registerMonthDeced');
Route::get('/registerYear/{sub_id}', 'GraphController@registerYear');
Route::get('/registerYearDeced/{sub_id}', 'GraphController@registerYearDeced');
Route::get('/registerAll/{data}', 'GraphController@registerAll');
Route::get('/registerAllDead/{data}', 'GraphController@registerAllDead');

Route::get('/test', 'GraphController@test');

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


Auth::routes(['verify' => true]);


// routes protected
Route::group(['middleware' => ['auth','verified']], function () {
    // rutas de las vacantes
    Route::get('/vacants','VacantController@index')->name('vacants.index');
    Route::post('/vacants','VacantController@store')->name('vacants.store');
    Route::get('/vacants/create','VacantController@create')->name('vacants.create');
    Route::get('/vacants/{vacant}/edit','VacantController@edit')->name('vacants.edit');
    Route::put('/vacants/{vacant}','VacantController@update')->name('vacants.update');
    Route::delete('/vacants/{vacant}','VacantController@destroy')->name('vacants.destroy');
    // ruote for image
    Route::post('/dropzone/store','DropzoneController@store')->name('dropzone.store');
    Route::post('/dropzone/delete','DropzoneController@delete')->name('dropzone.delete');

    // Cambiar estado de la vacante
    Route::post('vacants/{vacant}','VacantController@state')->name('vacants.state');

    // Notifications
    Route::get('/notifications','NotificationController')->name('notifications');
});

// pagina de inicio
Route::get('/','InicioController')->name('inicio');

// categories
Route::get('/categories/{category}','CategoryController@show')->name('categories.show');

// enviar datos para una vacante
Route::get('/candidates/{vacant}','CandidateController@index')->name('candidates.index');
Route::post('/candidates/store','CandidateController@store')->name('candidates.store');
// ruts para buscar vacantes en el inicio
Route::post('/vacant/search','VacantController@search')->name('vacants.search');
Route::get('/vacant/search','VacantController@result')->name('vacants.result');

// muestra las rutas del front-end sin autenticacion
Route::get('/vacants/{vacant}','VacantController@show')->name('vacants.show');






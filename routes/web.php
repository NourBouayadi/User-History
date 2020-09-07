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


Route::get('/table', function () {
    return view('table');
});

Route::middleware(['onlyUsers'])->group(function () {
    Route::get('etudiants', 'EtudiantController@index');
    Route::get('etudiants/create', 'EtudiantController@create');
    Route::post('etudiants', 'EtudiantController@store');
    Route::get('etudiants/{id}/edit', 'EtudiantController@edit');
    Route::put('etudiants/{id}', 'EtudiantController@update');
    Route::delete('users/{id}', 'UserController@delete');
    Route::post('etudiants/del', 'EtudiantController@del');
    Route::get('/etudiants', 'EtudiantController@index');
    Route::get('/etudiants/search/{search}', 'EtudiantController@search');
    Route::get('/etudiants/pdfview/{view_type}', 'EtudiantController@report');

}) ;

Route::middleware(['onlyAdmins'])->group(function () {

    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users', 'UserController@store');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::put('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');
}) ;
Route::get('/activity', 'ActivityLogController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

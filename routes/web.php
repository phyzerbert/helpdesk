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

Auth::routes();

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/updateuser', 'UserController@updateuser');

Route::get('/home', 'IncidentController@index')->name('home');
Route::post('/incident/create', 'IncidentController@create')->name('incident.create');

Route::get('/incident/search', 'IncidentController@search');
Route::post('/incident/search', 'IncidentController@search')->name('incident.search');

Route::get('/kdb/index', 'KdbController@index');
Route::post('/kdb/index', 'KdbController@index')->name('kdb.index');
Route::get('/kdb/solution/{id}', 'KdbController@solution')->name('kdb.solution');
Route::get('/kdb/create', 'KdbController@create')->name('kdb.create');
Route::post('/kdb/save', 'KdbController@save')->name('kdb.save');

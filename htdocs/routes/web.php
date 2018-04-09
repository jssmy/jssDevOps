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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('projects','ProjectController@index')->name('project.index');

Route::get('/project/{id}/members','ProjectController@members')->name('project.members');


Route::get('user','UserController@index')->name('user.index');
Route::get('user/create','UserController@create')->name('user.create');

Route::post('user/store','UserController@store')->name('user.store');



/*****   rutas de manager **************/
Route::get('project/create','ProjectController@create')->name('project.create');
Route::post('project/store','ProjectController@store')->name('project.store');

Route::get('project/{id}/details','ProjectController@details')->name('project.details');




/***/
Route::get('auth/github','ProjectController@github')->name('github');
Route::get('slack','ProjectController@slack')->name('slack');
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

Route::get('/', 'HomeController@loginpage');
Route::post('/', 'HomeController@login');
Route::get('/logout','HomeController@logout');

Route::get('/home','HomeController@index');
Route::get('/home/menuuser','HomeController@menuuser');

Route::post('/user/createuser','UserController@createuser');
Route::get('/user/{id}/edituser','UserController@edituser');
Route::post('/user/{id}/updateuser','UserController@updateuser');
Route::get('/user/{id}/deleteuser','UserController@deleteuser');

Route::get('/errorpage','HomeController@error');
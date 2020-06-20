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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/detalles/{id}', 'HomeController@show')->name('detalles');

Route::resource('dashboard/empresas', 'EmpresasController');
Route::resource('dashboard/users', 'UserController');
Route::resource('dashboard/sensors', 'SensoresController');
Route::resource('dashboard/inicio', 'DashboardController');
Route::resource('dashboard/salas', 'SalasController');

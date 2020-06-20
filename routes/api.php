<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/registro', 'api\RegistroController@registro');
Route::get('/sensor', 'api\RegistroController@sensor');
Route::get('/login', 'api\RegistroController@login');
Route::group(['middleware' => ['cors']], function () {
    Route::get('/dd', 'api\RegistroController@dd');
});

// Route::get('/detalles/{id}', 'HomeController@show')->name('detalles');

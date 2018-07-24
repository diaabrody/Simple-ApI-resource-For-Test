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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articales','ArticaleController@index');
Route::get('articales/{id}','ArticaleController@show');
Route::delete('articales/{id}' ,'ArticaleController@destroy');
Route::post('articales','ArticaleController@store');
Route::put('articales/{id}' ,'ArticaleController@update');

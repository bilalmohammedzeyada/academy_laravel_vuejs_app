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


Route::get('fields','FieldsController@index');
Route::get('fields/{id}','FieldsController@show');
Route::post('fields','FieldsController@store');
Route::put('fields','FieldsController@store');
Route::delete('fields/{id}','FieldsController@destroy');
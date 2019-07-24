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

// fields api
Route::get('fields','FieldsController@index');
Route::get('fields/{id}','FieldsController@show');
Route::post('fields','FieldsController@store');
Route::put('fields/{id}','FieldsController@update');
Route::delete('fields/{id}','FieldsController@destroy');


// teachers api
Route::get('teachers','TeachersController@index');
Route::get('teachers/{id}','TeachersController@show');
Route::post('teachers','TeachersController@store');
Route::put('teachers/{id}','TeachersController@update');
Route::delete('teachers/{id}','TeachersController@destroy');
// get courses by teacher
Route::get('teachers/{id}/courses','TeachersController@showCoursesByTeacher');  

// courses api
Route::get('courses','CoursesController@index');
Route::get('courses/{id}','CoursesController@show');
Route::post('courses','CoursesController@store');
Route::put('courses/{id}','CoursesController@update');
Route::delete('courses/{id}','CoursesController@destroy');


// where route is not defined
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});




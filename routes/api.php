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

// authentication api
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post("/register",'AuthController@register');
Route::post("/login",'AuthController@login');


// fields api
Route::get('fields','FieldsController@index');
Route::get('fields/{id}','FieldsController@show');
Route::post('fields','FieldsController@store')->middleware(['auth:api','checkRole:admin']);
Route::put('fields/{id}','FieldsController@update')->middleware('auth:api','checkRole:admin');
Route::delete('fields/{id}','FieldsController@destroy')->middleware('auth:api','checkRole:admin');
// get courses by field
Route::get('fields/{id}/courses','FieldsController@showCoursesByField');

// teachers api
Route::get('teachers','TeachersController@index');
Route::get('teachers/{id}','TeachersController@show');
Route::post('teachers','TeachersController@store')->middleware('auth:api');
Route::put('teachers/{id}','TeachersController@update')->middleware('auth:api','checkRole:teacher|admin');
Route::delete('teachers/{id}','TeachersController@destroy')->middleware('auth:api','checkRole:admin|teacher');
// get courses by teacher
Route::get('teachers/{id}/courses','TeachersController@showCoursesByTeacher');


// courses api
Route::get('courses','CoursesController@index');
Route::get('courses/{id}','CoursesController@show');
Route::post('courses','CoursesController@store')->middleware('auth:api','checkRole:teacher');
Route::put('courses/{id}','CoursesController@update')->middleware('auth:api','checkRole:teacher|admin');
Route::delete('courses/{id}','CoursesController@destroy')->middleware('auth:api','checkRole:teacher|admin');
// get lessons by course
Route::get('courses/{id}/lessons','CoursesController@showLessonsByCourse');


// lessons api
Route::get('lessons','LessonsController@index');
Route::get('lessons/{id}','LessonsController@show');
Route::post('lessons','LessonsController@store')->middleware('auth:api','checkRole:teacher');
Route::put('lessons/{id}','LessonsController@update')->middleware('auth:api','checkRole:teacher|admin');
Route::delete('lessons/{id}','LessonsController@destroy')->middleware('auth:api','checkRole:teacher|admin');



// where route is not defined
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});




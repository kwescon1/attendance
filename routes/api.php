<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Get the number of students in the table

Route::get('/students', ['uses' => 'StudentsController@index']);


Route::post('register', 'Api\ApiController@register');
Route::post('login', 'Api\ApiController@login');

Route::group(['middleware' => ['auth:api', 'student'], 'namespace' => 'Api'], function() {

    Route::post('records', 'ApiController@recordAttendance');
    Route::get('records', 'ApiController@getAllAttendances');

});

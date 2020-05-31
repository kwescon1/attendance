<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/signup', ['uses' => 'UsersController@index','as' =>'signup_page']);

Route::get('/', function(){

   return view('homepage');
});

Route::post('/register', 'UsersController@register');

Route::get('/signin', 'HomeController@index')->name('signin');

Route::post('/signin','LecturersController@login');

// Route::get('/signin', ['uses' => 'LecturersController@login_page', 'as' => 'signin_page']);

Route::get('/logout', 'LecturersController@logout')->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'lecturer'], function() {

    Route::get('/', ['uses'=> 'LecturersController@dashboard']);

    Route::get('addcourses', function(){

        return view('courses');

    })->name('addCourses');

    Route::post('addcourses', ['uses' => 'LecturersController@addCourses', 'as' => 'addCourses']);


// Returns the courses added
    Route::get('managecourses', ['uses' => 'LecturersController@showCourses', 'as' => 'showCourses']);

// Delete a course from the course list

    Route::delete('managecourses/delete/{id}', ['uses' => 'LecturersController@destroy', 'as' => 'deleteCourse']);

    Route::get('registeredstudents',['uses' => 'LecturersController@showStudent','as' => 'showStudent']);


// view qrcode form
    Route::get('generatecode', 'LecturersController@showcodeform')->name('showQrcode');

// generate code here
    Route::post('generatecode',['uses'=> 'LecturersController@generateCode', 'as' => 'qrCode']);

    Route::get('qr-codes', 'LecturersController@listQrCodes')->name('qrcodes.list');


});

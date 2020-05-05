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

Route::get('/signup', ['uses' => 'UsersController@index','as' =>'signup_page']);

Route::get('/', function(){

   return view('homepage');
});

Route::post('/register', 'UsersController@register');

// Route::get('/signin', ['uses' => 'LecturersController@login_page', 'as' => 'signin_page']);

Route::get('/dashboard', ['uses'=> 'LecturersController@dashboard']);

Route::get('/dashboard/addcourses', function(){

	return view('courses');

})->name('addCourses');

Route::get('/logout', 'LecturersController@logout')->name('logout');


Route::post('/dashboard/addcourses', ['uses' => 'LecturersController@addCourses', 'as' => 'addCourses']);	


Route::get('/signin', 'HomeController@index')->name('signin');

Route::post('/signin','LecturersController@login');


// Returns the courses added
Route::get('/dashboard/managecourses', ['uses' => 'LecturersController@showCourses', 'as' => 'showCourses']);

// Delete a course from the course list

Route::delete('/dashboard/managecourses/delete/{id}', ['uses' => 'LecturersController@destroy', 'as' => 'deleteCourse']);

Route::get('/dashboard/registeredstudents',['uses' => 'LecturersController@showStudent','as' => 'showStudent']);


// view qrcode form
Route::get('/dashboard/generatecode', ['uses'=> 'LecturersController@showcodeform', 'as' => 'showQrcode']);

// generate code here
Route::post('/dashboard/generatecode',['uses'=> 'LecturersController@generateCode', 'as' => 'qrCode']);


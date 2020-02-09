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

Route::get('/signup', ['uses' => 'LecturersController@index','as' =>'signup_page']);

Route::get('/', function(){

   return view('homepage');
});

Route::post('/signup', 'LecturersController@signup');

Route::get('/signin', ['uses' => 'LecturersController@login_page', 'as' => 'signin_page']);

Route::post('/signin','LecturersController@login');

Route::get('/dashboard', ['uses'=> 'LecturersController@dashboard']);

	



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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

Route::get('/', function(){
    return view('homepage');
});

Route::get('/register', ['uses' => 'UsersController@index','as' =>'signup_page']);
Route::post('/register', 'UsersController@register');

Route::get('login', 'LecturersController@login_page')->name('login');
Route::post('/login','LecturersController@login');




Route::group(['middleware' => ['auth', 'lecturer']], function() {

    Route::get('/logout', 'LecturersController@logout')->name('logout');

    Route::prefix('dashboard')->group(function() {

        Route::get('/', ['uses'=> 'LecturersController@dashboard']);

        Route::get('addcourses', function(){
            return view('courses');
        })->name('addCourses');

        Route::post('addcourses', ['uses' => 'LecturersController@addCourses', 'as' => 'addCourses']);

        Route::get('managecourses', ['uses' => 'LecturersController@showCourses', 'as' => 'showCourses']);
        Route::delete('managecourses/delete/{id}', ['uses' => 'LecturersController@destroy', 'as' => 'deleteCourse']);

        Route::get('registeredstudents',['uses' => 'LecturersController@showStudent','as' => 'showStudent']);


        Route::get('generatecode', 'LecturersController@showcodeform')->name('showQrcode');
        Route::post('generatecode',['uses'=> 'LecturersController@generateCode', 'as' => 'qrCode']);

        Route::get('qr-codes', 'LecturersController@listQrCodes')->name('qrcodes.list');

        Route::get('qr-codes/{id}', 'LecturersController@showStudents')->name('qrcode.show');

        Route::get('qr-code', 'LecturersController@showGeneratedCode');


        ///////test
        // Route::post('/testdelete/{id}', 'LecturersController@destroy');

    });

});

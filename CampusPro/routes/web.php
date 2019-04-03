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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('tutor')->group(function(){

    Route::get('/login', 'Auth\TutorLoginController@showLoginForm')->name('tutor.login');
    Route::post('/login', 'Auth\TutorLoginController@login')->name('tutor.login.submit');
    Route::get('/register', 'Auth\TutorRegisterController@showRegisterForm')->name('tutor.register');
    Route::post('/register', 'Auth\TutorRegisterController@create')->name('tutor.register.submit');
    Route::get('/', 'TutorController@index')->name('tutor');

});
Route::get('/course', 'CourseController@index');
//Route::get('/channel-page{id}', 'ChannelController@show')->name('channel.page');

Route::post('/create-channel', 'ChannelController@store');
Route::post('/create-course', 'CourseController@store');

/*
Route::get('tutor/login', 'Auth\TutorLoginController@showLoginForm');
Route::get('tutor/register', 'Auth\TutorRegisterController@showRegistrationForm');
Route::post('/tutor/login', 'Auth\TutorLoginController@tutorLogin');
Route::post('/tutor/register', 'Auth\TutorRegisterController@createTutor');*/

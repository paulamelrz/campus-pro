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
Route::get('/student', 'StudentController@index')->name('student');
Route::prefix('tutor')->group(function(){
    Route::get('/login', 'Auth\TutorLoginController@showLoginForm')->name('tutor.login');
    Route::post('/login', 'Auth\TutorLoginController@login')->name('tutor.login.submit');
    Route::get('/register', 'Auth\TutorRegisterController@showRegisterForm')->name('tutor.register');
    Route::post('/register', 'Auth\TutorRegisterController@create')->name('tutor.register.submit');
    Route::get('/', 'TutorController@index')->name('tutor');
});
//channel routes
Route::get('/channel-page{id}', 'ChannelController@channelPage')->name('channel.page');
Route::resource('channels','ChannelController');
//courses routes
Route::get('/course', 'CourseController@index');
Route::post('/create-course', 'CourseController@store');
//channel topic routes
Route::resource('topics','ChannelTopicController');

//File routes
Route::post('/store', 'FileController@store')->name('file.store');

//Channel Topic routes
Route::resource('topics', 'ChannelTopicController');
//Route::put('/topicText{id}', 'ChannelTopicController@saveText')->name('topics.text');

//Topic Uploads route
Route::resource('topic_uploads', 'TopicUploadController');


//reviews
Route::resource('channel_reviews', 'ChannelReviewController');



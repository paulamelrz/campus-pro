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
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('tutor')->group(function(){
    Route::get('/login', 'Auth\TutorLoginController@showLoginForm')->name('tutor.login');
    Route::post('/login', 'Auth\TutorLoginController@login')->name('tutor.login.submit');
    Route::get('/register', 'Auth\TutorRegisterController@showRegisterForm')->name('tutor.register');
    Route::post('/register', 'Auth\TutorRegisterController@create')->name('tutor.register.submit');
    Route::get('/', 'TutorController@index')->name('tutor');
});
//channel routes
    //both tutor and student can view channel pages
    Route::get('/channel-page{id}', 'ChannelController@channelPage')->name('channel.page')->middleware('auth:tutor,web');
    
    //only tutors can CRUD channels
    Route::resource('channels','ChannelController')->middleware('auth:tutor');

    //all users can view list of channels
    Route::get('/channels', 'ChannelController@index')->middleware('guest');
    Route::get('/stuChannels', 'ChannelController@index')->middleware('auth:web');
    

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
Route::put('/editText{id}', 'ChannelTopicController@editText')->name('topictext.edit');

//reviews
Route::resource('channel_reviews', 'ChannelReviewController');

//enrollments
Route::post('/enroll', 'EnrollmentController@enroll')->name('enroll.create');
Route::resource('enrollments', 'EnrollmentController');

//autocomplete
Route::get('/autocomplete', 'AutocompleteController@index');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

//tutor thread
Route::resource('discussion_thread_tutors', 'DiscussionController');

//student thread
Route::resource('discussion_thread', 'DiscussionController');

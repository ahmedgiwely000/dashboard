<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/courses/{slug}', 'CourseController@index');
Route::post('/courses/{slug}', 'CourseController@enroll');

Route::get('/courses/{slug}/quizzes/{name}', 'QuizController@index');
Route::post('/courses/{slug}/quizzes/{name}', 'QuizController@submit');

Route::get('/search','SearchController@index');

Route::get('/tracks/{name}','TrackController@index');
Route::get('/mycourses','MyCoursesController@index');

Route::get('/profile','MyProfileController@index');
Route::post('/profile','MyProfileController@update');

Route::get('/allcourses','AllCoursesController@index');

Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@sendEmail');

//********logout*******//

Route::get('/logout', function(){
    if(\Auth::check()){
        \Auth::logout();
        return redirect('/home');
    }else{
        return redirect('/');
    }
})->name('logout');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('admin', function (){
       return  redirect('admin/dashboard');
    });

    Route::get('admin/dashboard', 'Admin\HomeController@index')->name('home');

    //Admins
    Route::resource('admin/Admins', 'Admin\AdminController', ['except' => ['show']]);
    //users
    Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);
    //courses
    Route::resource('admin/courses', 'Admin\CourseController');
    //coursevideo
    Route::resource('admin/courses.videos', 'Admin\CourseVideoController');
    //videos
    Route::resource('admin/videos', 'Admin\videoController');
    //tracks
    Route::resource('admin/tracks', 'Admin\TrackController');
    //trackscourse
    Route::resource('admin/tracks.courses', 'Admin\TrackCourseController');
    //Question
    Route::resource('admin/Questions', 'Admin\QuestionController',['except' => ['show']]);
    //quizzes
    Route::resource('admin/Quizzes', 'Admin\QuizController');
    //quizzesquestions
    Route::resource('admin/Quizzes.questions', 'Admin\QuizQuestionController');
    //coursequizzes
    Route::resource('admin/courses.quizzes', 'Admin\CourseQuizController');

    Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);

    Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);

    Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);

});


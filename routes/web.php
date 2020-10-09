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
    return view('components.backend');
});


Route::group(['middleware' => ['role:admin']], function () {
    //


Route::resource('/courses','CourseController');

Route::resource('/lessons','LessonController');


});



Route::get('/','FrontendController@index')->name('index');

Route::get('/fcourses','FrontendController@courses')->name('fcourses');

Route::get('/contact','ContactController@contact')->name('contact');

Route::get('/about','AboutController@about')->name('about');

Route::get('/detailcourse/{id}','FrontendController@detailcourse')->name('detailcourse');

/*Route::group(['middleware' => ['role:user']], function () {*/
    //
Route::get('/detaillesson/{id}','FrontendController@detaillesson')->name('detaillesson');

Route::get('/enroll/{id}','FrontendController@enroll')->name('enroll');

//Route::resource('users','UserController');

/*});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::resource('/courses','CourseController');

Route::resource('/lessons','LessonController');

Route::get('/','FrontendController@index')->name('index');

Route::get('/fcourses','FrontendController@courses')->name('fcourses');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact',function(){
	return view('frontend.contact');
});

Route::get('/about',function(){
	return view('frontend.about');
});

Route::get('/detailcourse/{id}','FrontendController@detailcourse')->name('detailcourse');
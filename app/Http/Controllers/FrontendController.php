<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lesson;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function courses()
    {
    	$courses = Course::all();
        return view('frontend.courses',compact('courses'));
    }

    public function detailcourse($id){
        $course = Course::find($id);
        $detailcourse =Lesson::where('course_id',$id)->get();

        //dd($detailcourse);
        return view('frontend.detailcourse',compact('detailcourse'));
    }

}

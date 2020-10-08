<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lesson;
use Auth;

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

    public function detaillesson($id)
    {
       $course = Course::find($id);
       $detaillesson = Lesson::where('course_id',$id)->get();

       if(Auth::user())
       {
        return view('frontend.detaillesson',compact('detaillesson'));
       }
       else{
        return view('auth.register');
       }

       
    }

}

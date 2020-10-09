<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lesson;
use Auth;
use App\Enroll;
use Carbon\Carbon;
use DB;
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
        $courses = Course::find($id);
        $detailcourse =Lesson::where('course_id',$id)->get();
        //dd($detailcourse);
        return view('frontend.detailcourse',compact('detailcourse','courses'));
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
  

    public function enroll($id)
    {

      $course = DB::table('courses')->where('id',$id);
      //$course_id = Course::find($id);
      //$detailcourse =Lesson::where('course_id',$id)->get();
      //$detaillesson = Lesson::where('course_id',$id)->get();
      $auth = Auth::user();
      //$userid = $auth->id;
      $enroll_date = Carbon::now();
      //dd($enroll_date);

      $course = new course();
      $course->users()->attach($id,['user_id'=>$auth->id,'enroll_date'=>$enroll_date]);

     return response()->json([
            'status' => 'Successfully enrolled!'
        ]); 
  
    }

  }



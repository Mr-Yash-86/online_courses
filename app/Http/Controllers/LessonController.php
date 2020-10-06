<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\Course;
/*use FFMpeg\FFProbe as FFMpegFFProbe;
use FFMpeg\FFMpeg; */
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        $courses = Course::all();
        return view('lessons.lists',compact('lessons','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('lessons.new',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'  => ['required', 'string' ],
            'video'  => 'mimes:mp4,mov,ogg | max:20000'
        ]);

        if ($validator) {
            $title = $request->title;
            $video = $request->video;
            $courseid = $request->courseid;
            $duration = $request->duration;
            
            // FILE UPLOAD

            if ($request->hasfile('video')) 
            {
                  $videoname = time().'.'.$video->extension();
                    $video->move(public_path('videos/lessons'), $videoname);  
                    $filepath = 'videos/lessons/'.$videoname;      
            }


            /*$ffprobe = ffprobe::create();
            $duration=$ffprobe
                     ->format($this->getCorrectPathOnServerAndLocal('videos/lessons').$filepath)
                     ->get('duration');*/
            

            $lesson= new Lesson();
            $lesson->title = $title;
            $lesson->video = $filepath;
            $lesson->duration = $duration;
            $lesson->course_id = $courseid;
            $lesson->save();

            return redirect()->route('lessons.index')->with("successMsg", "New Lesson is ADDED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $lessons = Lesson::find($id);

        return view('lessons.edit',compact('lessons','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title'  => ['required', 'string', 'max:255'],
            'video'  => 'mimes:mp4,mov,ogg | max:20000',
        ]);

        if ($validator) {
            $title = $request->title;
            $course_id = $request->courseid;
            $oldvideo= $request->oldvideo;
            $newvideo=$request->video;
            $duration = $request->duration;

            // FILE UPLOAD

           if ($request->hasFile('video')) {
            # File Upload
            $videoName = time().'.'.$newvideo->extension();

            $newvideo->move(public_path('videos/lessons'),$videoName);

            $filepath = 'videos/lessons/'.$videoName;

            if (\File::exists(public_path($oldvideo))) {
                \File::delete(public_path($oldvideo));
            }
        }
        else{
            $filepath = $oldvideo;
        }
            // $photoString = implode(',', $data);

            $lesson= Lesson::find($id);
            $lesson->title = $title;
            $lesson->course_id = $course_id;
            $lesson->video = $filepath;           
            $lesson->duration = $duration;
            $lesson->save();

            return redirect()->route('lessons.index')->with("successMsg", "New Lesson is UPDATED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect()->route('lessons.index')->with('successMsg','Existing Lesson is DELETED in your data');
    }
}

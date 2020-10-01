<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Category;
use App\Level;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.lists',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();
        return view('courses.new',compact('categories','levels'));
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
        ]);

        if ($validator) {
            $title = $request->title;
            $photo = $request->photo;
            $price = $request->price;
            $categoryid = $request->categoryid;
            $lecture = $request->lecture;
            $levelid = $request->levelid;
            
            // FILE UPLOAD

            if ($request->hasfile('photo')) 
            {
                  $imagename = time().'.'.$photo->extension();
                    $photo->move(public_path('images/courses'), $imagename);  
                    $filepath = 'images/courses/'.$imagename;      
            }
            


            $course= new Course();
            $course->title = $title;
            $course->category_id = $categoryid;
            $course->price = $price;
            $course->photo = $filepath;
            $course->lecture = $lecture;
            $course->level_id = $levelid;
            $course->save();

            return redirect()->route('courses.index')->with("successMsg", "New Course is ADDED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::find($id);

        return view('courses.edit',compact('categories','levels','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title'  => ['required', 'string', 'max:255'],
        ]);

        if ($validator) {
            $title = $request->title;
            $categoryid = $request->categoryid;
            $price = $request->price;
            $oldphoto= $request->oldphoto;
            $newphoto=$request->photo;
            $lecture = $request->lecture;
            $levelid = $request->levelid;
            

            // FILE UPLOAD

           if ($request->hasFile('photo')) {
            # File Upload
            $imageName = time().'.'.$newphoto->extension();

            $newphoto->move(public_path('images/courses'),$imageName);

            $filepath = 'images/courses/'.$imageName;

            if (\File::exists(public_path($oldphoto))) {
                \File::delete(public_path($oldphoto));
            }
        }
        else{
            $filepath = $oldphoto;
        }
            // $photoString = implode(',', $data);

            $course= Course::find($id);
            $course->title = $title;
            $course->category_id = $categoryid;
            $course->price = $price;
            $course->photo = $filepath;           
            $course->lecture = $lecture;
            $course->level_id = $levelid;
            $course->save();

            return redirect()->route('courses.index')->with("successMsg", "New Course is UPDATED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('courses.index')->with('successMsg','Existing Course is DELETED in your data');
    }
}

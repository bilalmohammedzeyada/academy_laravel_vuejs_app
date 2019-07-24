<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Teacher;
use App\Field;
use App\Course;
use App\Http\Resources\Course as CourseResource;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::paginate(10);

        return CourseResource::collection($courses);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // verify  teacher exists
        $teacher=Teacher::findOrFail($request->input('teacher_id'));
        // verify field exists
        $user=Field::findOrFail($request->input('field_id'));

        /* $courses=$request->isMethod('put')?Field::findOrFail
        ($request->field_id):new Field; */
        $course=new Course;
        $course->title=$request->input('title');
        $course->field_id=$request->input('field_id');
        $course->teacher_id=$request->input('teacher_id');
        $course->description=$request->input('description');
        
        // the course is not approved when storing
        $course->is_approved=false;
    
        // todo this is a file to be uploaded and stored
        $course->cover_image="no_image.jpg";

        if($course->save()){
            return new CourseResource($course);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::findOrFail($id);

        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course=Course::findOrFail($id);
        $course->title=$request->input('title');
        $course->field_id=$request->input('field_id');
        $course->teacher_id=$request->input('teacher_id');
        $course->description=$request->input('description');
        $course->is_approved=false;
    
        $course->cover_image="no_image.jpg";

        if($course->save()){
            return new CourseResource($course);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::findOrFail($id);
        if($course->delete()){
            return new CourseResource($course);
        }
    }
}

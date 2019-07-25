<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Lesson;
use App\Http\Resources\Lesson as LessonResource;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons=Lesson::paginate(10);

        return LessonResource::collection($lessons);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // verify course exists
        $course=Course::findOrFail($request->input('course_id'));


        $lesson=new Lesson;
        $lesson->course_id=$request->input('course_id');
        $lesson->order=$request->input('order');
        $lesson->title=$request->input('title');
        $lesson->description=$request->input('description');

        // todo this is a file to be uploaded and stored
        $lesson->thumbnail_image=$request->input('thumbnail_image');
        // todo this is a file to be uploaded and stored
        $lesson->video_file=$request->input('video_file');

        if($lesson->save()){
            return new LessonResource($lesson);
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
        $lesson=Lesson::findOrFail($id);

        return new LessonResource($lesson);
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
        $lesson=Lesson::findOrFail($id);

        // verify course exists
        $course=Course::findOrFail($request->input('course_id'));

        $lesson->course_id=$request->input('course_id');
        $lesson->order=$request->input('order');
        $lesson->title=$request->input('title');
        $lesson->description=$request->input('description');

        // todo this is a file to be uploaded and stored
        $lesson->thumbnail_image=$request->input('thumbnail_image');
        // todo this is a file to be uploaded and stored
        $lesson->video_file=$request->input('video_file');

        if($lesson->save()){
            return new LessonResource($lesson);
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
        $lesson=Lesson::findOrFail($id);
        if($lesson->delete()){
            return new LessonResource($lesson);
        }
    }
}

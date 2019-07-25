<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Field;
use App\Http\Resources\Field as FieldResource;
use App\Http\Resources\Course as CourseResource;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields=Field::paginate(10);

        return FieldResource::collection($fields);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $field=new Field;
        $field->title=$request->input('title');

        // todo this is a file to be uploaded and stored
        $field->cover_image=$request->input('cover_image');
        if($field->save()){
            return new FieldResource($field);
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
        $field=Field::findOrFail($id);

        return new FieldResource($field);
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
        $field=Field::findOrFail($id);
        $field->title=$request->input('title');

        // todo this is a file to be uploaded and stored
        $field->cover_image=$request->input('cover_image');
        if($field->save()){
            return new FieldResource($field);
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
        $field=Field::findOrFail($id);
        if($field->delete()){
            return new FieldResource($field);
        }
        
    }

    // ---------------- additional methods ------------------------


    /**
     * Display field courses.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCoursesByField($id)
    {
        $field=Field::findOrFail($id);
        $courses=$field->courses;
        return CourseResource::collection($courses);
    }

}

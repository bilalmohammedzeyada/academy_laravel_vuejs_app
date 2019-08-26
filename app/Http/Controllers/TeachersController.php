<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Teacher;
use App\User;
use App\Http\Resources\Teacher as TeacherResource;
use App\Http\Resources\Course as CourseResource;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::paginate(10);

        return TeacherResource::collection($teachers);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // verify user exists
        $user=User::findOrFail($request->input('user_id'));

        
        // Check if the user is already a teacher
        if($user->teacher!=null){
            return abort(400,"the user is already a teacher");
        }

        $teacher=new Teacher;
        $teacher->user_id=$user->id;
        $teacher->about_me=$request->input('about_me');
        
        // the Teacher is not approved when storing
        $teacher->is_approved=false;
    
        // todo this is a file to be uploaded and stored
        $teacher->profile_image="no_profile_image.jpg";

        if($teacher->save()){
            return new TeacherResource($teacher);
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
        $teacher=Teacher::findOrFail($id);

        return new TeacherResource($teacher);
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
        $teacher=Teacher::findOrFail($id);
        $teacher->about_me=$request->input('about_me');
        
        // the Teacher is a approved by admin only
        if(auth()->user()->is_admin==1){
            $teacher->is_approved=input('is_approved');
        }
        
    
        // todo this is a file to be uploaded and stored
        $teacher->profile_image="no_profile_image.jpg";

        if($teacher->save()){
            return new TeacherResource($teacher);
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
        $teacher=Teacher::findOrFail($id);
        if($teacher->delete()){
            return new TeacherResource($teacher);
        }
    }

    // ---------------- additional methods ------------------------


     /**
     * Display teacher courses.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCoursesByTeacher($id)
    {
        $teacher=Teacher::findOrFail($id);
        $courses=$teacher->courses;
        return CourseResource::collection($courses);
    }
    
}

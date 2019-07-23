<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Field;
use App\Http\Resources\Field as FieldResource;

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

        $field=$request->isMethod('put')?Field::findOrFail
        ($request->field_id):new Field;
        $field->title=$request->input('title');
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
}

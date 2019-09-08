<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    /**
     * register a new user
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData=$request->validate([
            "username"=>"required|max:192|unique:users",
            "email"=>"email:filter|required|max:192|unique:users",
            "password"=>"required|max:192",
            "first_name"=>"required|max:192",     
            "last_name"=>"required|max:192",
        ]);

        $validatedData["password"]=bcrypt($request->password);

        $user=new User;
        $user->first_name= $validatedData["first_name"];
        $user->last_name= $validatedData["last_name"];
        $user->username= $validatedData["username"];
        $user->email= $validatedData["email"];
        $user->password= $validatedData["password"];
        
        $user->save();

        //$user=User::create($validatedData);
        

        $access_token=$user->createToken('authToken')->accessToken;

        return response([
            "user"=>$user,
            "accessToken"=> $access_token
        ]);
    
    }


    /**
     * login using email and password
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $loginData=$request->validate([
            "email"=>"email:filter|required",
            "password"=>"required",
        ]);

      if(!auth()->attempt($loginData)){
          return response([
              'message'=>'Invalid credentials'
          ],201);
      }

        

        $access_token=auth()->user()->createToken('authToken')->accessToken;

        return response([
            "user"=>auth()->user(),
            "accessToken"=> $access_token
        ]);
    
    }
}

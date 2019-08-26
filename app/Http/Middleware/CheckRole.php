<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permitted_roles)
    {
        $roles = explode('|', $permitted_roles);
 
        if(count($roles)>0){
            foreach ($roles as $role_key => $role_value) {
                if(strtoupper($role_value) =="ADMIN"){
                   
                    if(auth()->user()->is_admin==1){
                       
                       return $next($request);
                    }
                }
                if(strtoupper($role_value) =="TEACHER"){
                    if(auth()->user()->teacher!=null)return $next($request);
                }
            }
        }

         return response()->json([
            'message' => 'Your Are Not Authorized'], 401);
    }

}

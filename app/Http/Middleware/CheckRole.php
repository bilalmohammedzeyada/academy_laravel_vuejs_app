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
        if(checkCurrentUserRoles($permitted_roles)){
            return $next($request);
        }else{
            return response()->json([
                'message' => 'Your Are Not Authorized'], 401);
        }   
    }

    public static function checkCurrentUserRoles($permitted_roles){
        // check if auth middleware already used otherwise check access token
        $user=auth()->user();
        if($user==null ){// check if auth middleware not already used 
            $user=auth('api')->user();
            if($user==null){ //check access token not provided
                return false;
            }
        }
    
        $roles = explode('|', $permitted_roles);
 
        if(count($roles)>0){
            foreach ($roles as $role_key => $role_value) {
                if(strtoupper($role_value) =="ADMIN"){
                   
                    if( $user->is_admin==1){
                       
                       return true;
                    }
                }
                if(strtoupper($role_value) =="TEACHER"){
                    if( $user->teacher!=null)return true;
                }
            }
        }
        return false;
    }

}

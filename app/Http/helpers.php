<?php




  function checkPermission($permissions){

    
    $userAccesses = getMyPermission(auth()->user());

    foreach ($permissions as $permissionKey => $permissionValue) {
      foreach ($userAccesses as $accessKey => $accessValue) {
        if($permissionValue == $accessValue){

          return true;
  
        }
      }
    }

    return false;
  }




  function getMyPermission($user)

  {

    $accesses=[];

    if($user->is_admin){
      $accesses[]="admin";
    }
    if($user->teacher!=null){
      $accesses[]="teacher";
    }
    
    return $accesses;

  }




?>
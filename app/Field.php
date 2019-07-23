<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    public $timestamps=false;
    
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * this is sated  to null to make laravel don't use this coz we need only created at
     */
    const UPDATED_AT = null;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function courses()
    {
        return $this->hasMany("\App\Course");
    }
}

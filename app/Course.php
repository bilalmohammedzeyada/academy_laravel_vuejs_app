<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    /**
     * this is sated  to null to make laravel don't use this coz we need only created at
     */
    const UPDATED_AT = null;
    
    public function teacher()
    {
        return $this->belongsTo('\App\User');
    }

    public function field()
    {
        return $this->belongsTo('\App\Field');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
}

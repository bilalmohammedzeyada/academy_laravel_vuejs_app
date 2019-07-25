<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * this is sated  to null to make laravel don't use this coz we need only created at
     */
    const UPDATED_AT = null;
    
    public function course()
    {
        return $this->belongsTo('\App\Course');
    }


}

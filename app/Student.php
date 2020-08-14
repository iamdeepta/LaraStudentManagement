<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function images(){

    	return $this->hasMany('App\StudentImage');
    }

    public function degrees(){

    	return $this->hasMany('App\Degree');
    }

    public function points(){

    	return $this->hasMany('App\Degree');
    }
}

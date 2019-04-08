<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
   public $table = 'university';

   public function course(){
       return $this->hasMany('App\Courses');
   }

   public function country(){
       return $this->belongsTo('App\Country');
   }

//    public function tutor(){
//        return $this->hasMany('App\Tutor');
//    }

//    public function student(){
//        return $this->hasMany('App\User');
//    }


}

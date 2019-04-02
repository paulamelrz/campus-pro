<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'courses';
    public $fillable = ['course_code', 'uni_id', 'course_name', 'course_description'];

    public function channel(){
        return $this->hasMany('App\Channel');
    }

    public function university(){
        return $this->belongsTo(App\University);
    }
}

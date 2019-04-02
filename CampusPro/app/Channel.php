<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public $table='channels';
    
    //specify attributes that can be updated by user
    public $fillable = ['tutor_id', 'channel_name','course_id', 'description', 'banner'];

    protected $primarykey = 'channel_id';

    public function tutor(){
        return $this->belongsTo('App\Tutor');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    

}

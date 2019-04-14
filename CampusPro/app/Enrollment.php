<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public $table = "enrollments";

    public $fillable = ['channels_id', 'stu_id'];

    public function channel(){
        return $this->belongsTo('App\Channel');
    }

}

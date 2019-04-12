<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorProfilePic extends Model
{
    public $table = 'tutor_profile_pics';

    public $fillable = ['filename','src','size', 'tutor_id', 'created_at'];

    public function tutor()
    {
        return $this->belongsTo('App\Tutor');
    }
}

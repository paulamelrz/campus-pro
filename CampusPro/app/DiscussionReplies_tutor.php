<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionReplies_tutor extends Model
{


    public function topic(){
        return $this->belongsto('App\DiscussionThread_tutor');
    }
}

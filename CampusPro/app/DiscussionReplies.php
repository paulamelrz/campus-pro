<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionReplies extends Model
{


    public function topic(){
        return $this->belongsto('App\DiscussionThread');
    }
}

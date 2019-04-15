<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionThread extends Model
{
    //
    public function topic(){
        return $this->belongsto('App\ChannelTopic');
    }
}


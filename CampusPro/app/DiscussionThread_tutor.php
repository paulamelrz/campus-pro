<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionThread_tutor extends Model
{

    public function topic(){
        return $this->belongsto('App\ChannelTopic');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionThread extends Model
{
    public $table = 'discussion_thread';
    public $fillable = ['channel_id','replies_count','title', 'body', 'best_reply_id', 'flag'];

    public function topic(){
        return $this->belongsto('App\Channel');
    }
}


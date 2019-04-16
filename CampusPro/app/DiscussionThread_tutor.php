<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionThread_tutor extends Model
{
    public $table = 'discussion_thread_tutors';
    public $fillable = ['tutor_id','channel_id','replies_count','title', 'body', 'best_reply_id', 'flag'];

    public function topic(){
        return $this->belongsto('App\Tutor');
    }
    public function topic_1(){
        return $this->belongsto('App\Channel');
    }
    public function topic_2(){
        return $this->hasMany('App\DiscussionReplies');
    }
}

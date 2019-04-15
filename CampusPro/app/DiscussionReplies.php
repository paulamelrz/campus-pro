<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionReplies extends Model
{

    public $table = 'discussion_replies';
    public $fillable = ['thread_id','tutor_id','body'];


    public function topic(){
        return $this->belongsto('App\DiscussionThread');
    }
}

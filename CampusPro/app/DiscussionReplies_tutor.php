<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionReplies_tutor extends Model
{
    public $table = 'discussion_replies_tutors';
    public $fillable = ['thread_id','tutor_id','body'];

    public function topic(){
        return $this->belongsto('App\DiscussionThread_tutor');
    }
}

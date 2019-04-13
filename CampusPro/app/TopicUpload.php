<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicUpload extends Model
{
    public $table = 'topic_uploads';
    
    public $fillable = ['topic_id','src','filename', 'size', 'description'];
//
    public function topic(){
        return $this->belongsto('App\ChannelTopic');
    }
}

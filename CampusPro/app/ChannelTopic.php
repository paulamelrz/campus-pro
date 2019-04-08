<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelTopic extends Model
{
    public $table = 'topics';

    public $fillable = ['title', 'textarea'];

    public function topicUpload(){
        return $this->hasMany('App\TopicUpload');
    }
}

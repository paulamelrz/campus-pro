<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelReview extends Model
{
    public $table='channel_reviews';

    public $fillable = ['channels_id', 'stu_id', 'title', 'comment', 'stars', 'likes'];

    //relatinships
    public function channel(){
        return $this->belongsTo('App\Channel');
    }
}
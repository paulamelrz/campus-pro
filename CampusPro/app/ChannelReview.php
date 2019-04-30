<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class ChannelReview extends Model
{

    public $table='channel_reviews';

    public $fillable = ['channels_id', 'stu_id', 'title', 'comment', 'stars', 'likes'];

    //relationships
    public function channel(){
        return $this->belongsTo('App\Channel');
    }
}

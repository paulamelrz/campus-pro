<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tutor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'tutor';
    public $timestamps = false;
    public $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio', 'img_url', 'country', 'university',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function channel(){
        return $this->hasMany('App\Channel');
    }
    public function tutorprofilepic()
    {
        return $this->belongsTo('App\TutorProfilePic');
    }
}

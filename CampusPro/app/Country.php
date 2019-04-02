<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = 'country';
    public $primaryKey = 'country_code';

    public function university(){
        return $this->hasMany(App\University);
    }
}

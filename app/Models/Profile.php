<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    public function getUser (){
        return $this->hasOne('App\User', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';

    public function getUser () {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getProfile () {
        return $this->hasOne('App\Models\Profile', 'id', 'user_id');
    }
}

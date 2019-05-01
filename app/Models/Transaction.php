<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction_db';
    
    public function getWallet () {
        return $this->belongsTo('App\Models\Wallet', 'wallet_id', 'wallet_number');
    }
}

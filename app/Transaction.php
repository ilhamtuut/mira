<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'txid',
        'amount',
    	'receive',
    	'destination',
    	'type',
    	'status',
    	'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StakingEarn extends Model
{
    protected $fillable = [
        'user_id',
        'staking_id',
        'amount',
        'earn',
    	'status',
    	'date_expired',
        'address',
        'txid',
        'last_staking'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stakings()
    {
        return $this->belongsTo(Staking::class, 'staking_id');
    }

    public function earns()
    {
        return $this->hasMany(EarnDay::class, 'staking_earn_id');
    }
}

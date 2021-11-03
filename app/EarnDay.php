<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EarnDay extends Model
{
    protected $fillable = [
        'staking_earn_id',
        'earn',
    	'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stakingEarn()
    {
        return $this->belongsTo(StakingEarn::class, 'staking_earn_id');
    }
}

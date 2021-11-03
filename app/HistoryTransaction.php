<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryTransaction extends Model
{
    protected $fillable = [
        'balance_id',
        'amount',
    	'description',
    	'status',
    	'type'
    ];

    public function balance()
    {
        return $this->belongsTo(User::class, 'balance_id');
    }
}

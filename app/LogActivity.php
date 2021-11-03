<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
	protected $table = 'log_activitys';
    protected $fillable = [
        'user_id',
        'activity',
    	'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

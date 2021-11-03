<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogGenerate extends Model
{
    protected $fillable = [
        'activity',
    	'status'
    ];
}

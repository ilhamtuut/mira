<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'value',
        'currency',
        'status'
    ]; 
}

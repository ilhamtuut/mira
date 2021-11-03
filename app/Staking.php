<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staking extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'annualized_yield',
        'min_deposit',
        'status',
    ]; 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'country',
        'state',
        'Month',
        'Day',
        'Year',
        'avg_temperature',
    ];

    public $timestamps = false;


}

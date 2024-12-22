<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'region',
        'country',
        'state',
        'city',
        'avg_temperature',
    ];

    public $timestamps = false;


}

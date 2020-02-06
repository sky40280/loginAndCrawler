<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fortune extends Model
{
    protected $fillable = [
        'date',
        'name',
        'all',
        'love',
        'job',
        'money',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $fillable = [
        'name','age','address','img','gender','infected_id','date'
    ];
}
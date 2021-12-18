<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    protected  $fillable = [
        'name','age','address','img','gender','infected_id','date'
    ];
}

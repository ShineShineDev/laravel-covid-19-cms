<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected  $fillable = [
        'name','phone','phone','text','browser','device','ip','referer','lat_long'
    ];
}

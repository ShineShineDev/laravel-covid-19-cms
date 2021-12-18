<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetectVisitor extends Model
{
    protected  $fillable = ['ip','device','browser','referer','date','lat_and_long'];
}

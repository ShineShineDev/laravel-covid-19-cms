<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected  $fillable = ['title','description','source_link','frame'];
}

<?php

namespace App\Http\Controllers;


use App\Level;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public  function level(Request $request){
        $level = Level::find(1);
        $level->value = $request->input( 'value' );
        $level->level = $request->input( 'level' );
        $level->bg = $request->input( 'bg');
        $level->width = $request->input( 'width' );
        $level->save();
    }
}

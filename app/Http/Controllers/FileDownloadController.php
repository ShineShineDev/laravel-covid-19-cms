<?php

namespace App\Http\Controllers;


use http\Env\Request;
use Illuminate\Support\Facades\Response;

class FileDownloadController extends Controller
{
    public function download($dir,$name)
    {
        $file= public_path().'/'.$dir.'/'.$name;
        $headers = array(
            'Content-Type: application/octet-stream',
        );
        return Response::download($file, $name, $headers);
    }
    public function aj(Request $request){
        return 'ok';
    }
}

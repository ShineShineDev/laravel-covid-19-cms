<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos = Knowledge::orderBy('id','asc')->take(6)->get();
        $recents = Knowledge::orderBy('id','desc')->take(4)->get();
        $paginate = 1;
        $has_previous_page = false;

        //collection array
        $videos_array = [];
        foreach ($videos as $video){
            array_push($videos_array,$video->id);
        }
        //detach min number
        if (!$videos){
            $paginate = max($videos_array);
        }

        return view('guest.knowledge.index',compact('videos','paginate','recents','has_previous_page'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Knowledge::find($id);
        //1 => 11
        // 11 => 1
        //fetch sibling data
        $sibling =  DB::select('SELECT * FROM knowledge WHERE id <   ? ORDER BY id desc limit 1',[$id]);

        // if id is smallest ,fetch late data from knowledge table
        if (!$sibling){
            $sibling  = Knowledge::orderBy('id','desc')->take(1)->get();
        }

        $recents = Knowledge::orderBy('id','desc')->take(4)->get();

        return view('guest.knowledge.detail',compact('video','recents','sibling'));
    }



    public function page($id)
    {
        $videos = DB::select('SELECT * FROM knowledge WHERE id >   ? ORDER BY id desc limit 6',[$id]);
        $recents = Knowledge::orderBy('id','desc')->take(4)->get();
        $paginate = 1;
        $has_previous_page = true;

        if(!$videos){
            return redirect('knowledge');
        }
        $ary = [];
        foreach ($videos as $video){
            array_push($ary,$video->id);
        }

        if($videos){
            $paginate = max($ary);
        }


        return view('guest.knowledge.index',compact('videos','paginate','recents','has_previous_page'));
    }
}

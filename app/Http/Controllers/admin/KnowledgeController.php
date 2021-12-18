<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Knowledge;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Knowledge::orderBy('id','desc')->take(6)->get();

        $videos_array = [];
        foreach ($videos as $video){
            array_push($videos_array,$video->id);
        }
        $paginate = 1;
        if (!$videos){
            $paginate = min($videos_array);
        }


        return view("admin.knowledge.index",compact('videos','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'frame'=>'required'
        ]);

        $status = Knowledge::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'source_link'=>$request->source_link,
            'frame'=>$request->frame
        ]);
        return $status ?
            back()->with('status','Successfully Added'):
            back()->with('status','Fail');
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
        return view('admin.knowledge.detail',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Knowledge::Find($id);

        return view('admin.knowledge.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'frame'=>'required'
        ]);

        $status = Knowledge::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'source_link'=>$request->source_link,
            'frame'=>$request->frame
        ]);
        return $status ?
            redirect('admin/knowledge')->with('status','Successfully Edit') :
            redirect('admin/knowledge')->with('status','Fail') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Knowledge::destroy($id);
        return $status ?
            redirect('admin/knowledge')->with('status','Successfully Destroy') :
            redirect('admin/knowledge')->with('status','Fail') ;

    }

    public function page($id){

        $videos = DB::select('SELECT * FROM knowledge WHERE id <   ? ORDER BY id desc limit 6',[$id]);


        if(!$videos){
            return redirect('admin/knowledge');
        }

        $ary = [];
        foreach ($videos as $video){
            array_push($ary,$video->id);
        }
        $paginate = 1;
        if($videos){
            $paginate = min($ary);
        }
        return view("admin.knowledge.index",compact('videos','paginate'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $paginate  = 1;

       $news = News::orderBy('id','desc')->take(6)->get();

        $news_array = [];
        foreach ($news as $item){
            array_push($news_array,$item->id);
        }

        if (!$news){
            $paginate = min($news_array);
        }



        return view('admin.news.index',compact('news','paginate'));
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
           'text'=>'required',
            'file' =>'max:2048',
            'file.*'=>'mimes:jpg,png,,jpeg,pdf',
        ]);

        $file_ary = [];
        if($request->file('file')){
            foreach ($request->file('file') as $item) {
                 $file_name = 'MMCOVID_'.uniqid().'.'.$item->getClientOriginalExtension();
                 $item->move(public_path().'/news_files/',$file_name);
                 array_push($file_ary,$file_name);
            }
        }

        $status = News::create([
            'title' =>$request->title,
            'text'=>$request->text,
            'file'=>serialize($file_ary),
            'date'=>$request->date,
        ]);

        return $status ?
            back()->with('status','Successfully added'):
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
        $news = News::find($id);
        return view('admin.news.detail',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = News::find($id);
        return view('admin.news.edit',compact('item'));
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
           'title'=>'required',
           'text'=>'required',
            'file' =>'max:2048',
        ]);
        $news = News::find($id);


        if ($request->file('file')){

            foreach (unserialize($news->file) as $item){
                \File::delete(public_path('news_files/'.$item));
            }


            $file_ary = [];
            if($request->file('file')){
                foreach ($request->file('file') as $item) {
                    $file_name = 'MMCOVID_'.uniqid().'.'.$item->getClientOriginalExtension();
                    $item->move(public_path().'/news_files/',$file_name);
                    array_push($file_ary,$file_name);
                }
            }

            $news->title = $request->title;
            $news->text = $request->text;
            $news->file = serialize($file_ary);
            $news->date = $request->date;
            $news->save();
            return redirect('admin/admin_news')->with('status','Successfully Edited');

        }else{
            $news->title = $request->title;
            $news->text = $request->text;
            $news->date = $request->date;
            $news->save();
            return redirect('admin/admin_news')->with('status','Successfully Edited');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $news = News::find($id);
        $status = News::destroy($id);

        //if deleted
        if($status){
            foreach (unserialize($news->file) as $item){
                \File::delete(public_path('news_files/'.$item));
            }
            return back()->with('status','Successfully');
        }

        return back()->with('status','Fail');

    }

    public function page($id){
        $paginate  = 1;

        $news = DB::select('SELECT * FROM news WHERE id <   ? ORDER BY id desc limit 6',[$id]);
        if (!$news){
           return redirect('admin/admin_news');
        }
        $news_array = [];
        foreach ($news as $item){
            array_push($news_array,$item->id);
        }

        if ($news){
            $paginate = min($news_array);
        }
        return view('admin.news.index',compact('news','paginate'));
    }
}

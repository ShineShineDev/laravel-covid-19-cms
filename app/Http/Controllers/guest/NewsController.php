<?php

namespace App\Http\Controllers\guest;

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
        $news = News::orderBy('id','asc')->take(6)->get();


        $recents = News::orderBy('id','desc')->take(3)->get();

        $paginate = 1;

        $has_previous_page = false;

        $news_array = [];
        foreach ($news as $item){
            array_push($news_array,$item->id);
        }

        if (count($news) > 0){
            $paginate = max($news_array);
        }

        return view('guest.news.index',compact('news','recents','paginate','has_previous_page'));
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
        if (!$news){
           return redirect('news');
        }
        //1 => 11
        // 11 => 1
        //fetch sibling data
        $sibling =  DB::select('SELECT * FROM news WHERE id <   ? ORDER BY id desc limit 1',[$id]);

        // if id is smallest ,fetch late data from knowledge table
        if (!$sibling){
            $sibling  = News::orderBy('id','desc')->take(1)->get();
        }

        $recents = News::orderBy('id','desc')->take(3)->get();


        return view('guest.news.detail',compact('news','sibling','recents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function page($id)
    {
        $news = DB::Select('SELECT * FROM news where  id > ? ORDER BY id desc limit 6',[$id]);
        if(!$news){
            return redirect('news');
        }
        $recents = News::orderBy('id','desc')->take(3)->get();
        $paginate = 1;
        $has_previous_page = true;

        $news_array = [];
        foreach ($news as $item){
            array_push($news_array,$item->id);
        }
        if ($news){
            $paginate = max($news_array);
        }
        return view('guest.news.index',compact('news','recents','paginate','has_previous_page'));
    }


}

<?php

namespace App\Http\Controllers\guest;

use App\CustomHelper\DetectVisitors;
use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.feedback');
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
             "name"=>"required",
             "phone"=>"required",
         ]);

        //'name','phone','phone','text','browser','device','ip','referer','lat_long'
        $browser = DetectVisitors::browser();
        $device = DetectVisitors::device();
        $ip  = DetectVisitors::ip();
        $referer = DetectVisitors::referer();
        
        $geolocation = $request->geolocation;

        $fail_or_success = Feedback::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'text'=>$request->text,
            'browser'=>$browser,
            'device'=>$device,
            'ip'=>$ip,
            'referer'=>$referer,
            'lat_long'=>$geolocation
        ]);
        return $fail_or_success ?  back()->with('status','Successfully Send') :
            back()->with('status','Fail')
            ;



    }


}

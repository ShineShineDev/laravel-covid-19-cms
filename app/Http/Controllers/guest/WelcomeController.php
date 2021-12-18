<?php

namespace App\Http\Controllers\guest;

use App\Active;
use App\CustomHelper\DetectVisitors;
use App\Death;
use App\DetectVisitor;
use App\Http\Controllers\Controller;
use App\Level;
use App\Recovered;
use Illuminate\Http\Request;
use stdClass;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        // Detect Visitor
        // website ကို၀င်ရောက်သွားတဲ့ user တွေရဲ့ ipနဲ့တကွ ခြားသောအချက်အလက်များကို DetectVisitor:: create ဖြင့် DB ထည့် ခြင်း
        if(!isset($_COOKIE['visitor'])){
            DetectVisitor::create([
                'ip' =>  DetectVisitors::ip(),
                'device' => DetectVisitors::device(),
                'browser' => DetectVisitors::browser(),
                'referer'=>DetectVisitors::referer(),
                'date' => date('y/m/d'),
                'lat_and_long'=>''
            ]);
            setcookie('visitor','True',time()+86400);
        }


        // covid situation level (ကိုဗစ်အဆင့်သတ်မှတ်ချတ်)
        /* ကိုဗစ်အဆင့်သတ်မှတ်ချက်တွင် လေးဆင့်သတ်မှတ်ထားပါသည်
         * level 1(color = bg-primary, value = 10, width = 25)
         * level 2 (color = bg-info, value = 20, width = 50)
         * level 3 (color = bg-warning, value = 30, width = 75)
         * level 4 (color = bg-danger, value = 40, width = 100)
         * */
        /* {
               "id": 1,
               "value": "25",
               "level": "1",
               "bg": "primary",
               "width": "25",
               "created_at": null,
               "updated_at": null
           }
         **/
        $level = Level::find(1);

        // admin မှ Level သတ်မှတ်ထားတာ မရှိလျှင် Level သတ်မှတ်ခြင်း

        if(empty($level)){
            Level::create([
                'value' => 10,
                'level'=> 1,
                'bg'=> "bg-primary",
                'width'=>25
            ]);
        }
        $level = Level::find(1);



        //current covid partient (လက်ရှိလူနာများ)
        $actives = Active::all()->count();

        //deaths (သေဆုံးလူနာများ)
        $deaths = Death::all()->count();

        //recovered (ပြန်ကောင်းလာသော လူနာများ)
        $recovered = Recovered::all()->count();

        // အာလုံးပေါင်း
        $all = $actives+$recovered+$deaths;

        //သေဆုံးတဲ့ရာခိုင်နှုန်း
        $deaths_rate =   $deaths / 3 * 100 ;

        return view('guest.welcome',compact('level','actives','deaths','recovered','deaths_rate'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


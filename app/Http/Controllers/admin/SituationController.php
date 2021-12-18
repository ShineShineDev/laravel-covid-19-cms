<?php

namespace App\Http\Controllers\admin;

use App\Active;
use App\Death;
use App\Http\Controllers\Controller;
use App\Level;
use App\Recovered;
use Illuminate\Http\Request;

class SituationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // Default level is 1 ,color = primary,width = 25
        // level color 1  = primary
        // level color  2 = info
        // level color  3 = warning
        // level color 4 = danger

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

        $actives = Active::all()->count();
        $deaths = Death::all()->count();
        $recovered = Recovered::all()->count();
        $all = $actives + $deaths + $deaths;

        if($all != 0){
            $death_rate = $deaths / $all * 100;
            $recovered_rate = $recovered / $all * 100;
        }else{
            $death_rate = 0;
            $recovered_rate = 0;
        }

        return view('admin.situation.index',compact('actives','deaths','recovered','level','death_rate','recovered_rate'));
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

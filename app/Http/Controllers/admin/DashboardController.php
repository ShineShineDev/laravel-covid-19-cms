<?php

namespace App\Http\Controllers\admin;

use App\Active;
use App\Death;
use App\DetectVisitor;
use App\Http\Controllers\Controller;
use App\Level;
use App\Recovered;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = DetectVisitor::all()->count();

        $to_day = DetectVisitor::where('date',date('y/m/d'))->take(20)->get();

        $count_to_day = DetectVisitor::where('date',date('y/m/d'))->count();

        $level = Level::find(1);
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

        $recovered  = Recovered::all()->count();
        $all = $actives + $deaths + $recovered;

        if($all != 0){
            $death_rate = $deaths / $all * 100;
            $recovered_rate  = $recovered / $all * 100;
        } else{
            $death_rate = 0;
            $recovered_rate  = 0;
        }

        return view('admin.dashboard',
            compact('actives','deaths','recovered','to_day','count_to_day','visitors','level','death_rate','recovered_rate')
        );
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

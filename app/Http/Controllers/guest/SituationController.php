<?php

namespace App\Http\Controllers\guest;

use App\Active;
use App\Death;
use App\Http\Controllers\Controller;
use App\Level;
use App\News;
use App\Recovered;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use phpDocumentor\Reflection\Types\Null_;

class SituationController extends Controller{
    
	private
        $actives_count,
        $deaths_count,
        $recovered_count,
        $deaths_rate,
        $level,$date;

    public  function __construct()
    {
        $this->date = date('d/m/Y');

        $this->actives_count = Active::all()->count();
        $this->deaths_count = Death::all()->count();
        $this->recovered_count = Recovered::all()->count();
		
        $all = $this->actives_count + $this->deaths_count + $this->recovered_count;

        //$this->deaths_rate =  $this->deaths_count / 229 * 100 ;
        if($all != 0)
            $this->deaths_rate =  $this->deaths_count / $all * 100 ;
        else
            $this->deaths_rate = 0;

        $this->level = Level::find(1);
    }

    public function active()
    {
        $what_table = explode('::', __METHOD__)[1];

        $actives_count = $this->actives_count;
        $deaths_count = $this->deaths_count;
        $recovered_count = $this->recovered_count;
        $patient_info = Active::all();
        $deaths_rate = $this->deaths_rate;
        $level = $this->level;
        $to_day = Active::where('date',$this->date)->get();

        return view('guest.situation.index',compact(
            'what_table',
            'actives_count',
            'deaths_count',
            'recovered_count',
            'patient_info',
            'deaths_rate',
            'level',
            'to_day'));

    }

    public function death(){

        $what_table = explode('::', __METHOD__)[1];

        $actives_count = $this->actives_count;
        $deaths_count = $this->deaths_count;
        $recovered_count = $this->recovered_count;
        $patient_info = Death::all();
        $deaths_rate = $this->deaths_rate;
        $level = $this->level;
        $to_day = $to_day = Death::where('date',$this->date)->get();
        return view('guest.situation.index',compact(
            'what_table',
            'actives_count',
            'deaths_count',
            'recovered_count',
            'patient_info',
            'deaths_rate',
            'level',
            'to_day'));
    }

    public function recovered(){

        $what_table = explode('::', __METHOD__)[1];

        $actives_count = $this->actives_count;
        $deaths_count = $this->deaths_count;
        $recovered_count = $this->recovered_count;
        $patient_info = Recovered::all();
        $deaths_rate = $this->deaths_rate;
        $level = $this->level;
        $to_day = Recovered::where('date',$this->date)->get();
        return view('guest.situation.index',compact(
            'what_table',
            'actives_count',
            'deaths_count',
            'recovered_count',
            'patient_info',
            'deaths_rate',
            'level',
            'to_day'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($table,$id)
    {
        $table = ucfirst($table);

        $patient_info = null;

        $actives_count = $this->actives_count;
        $deaths_count = $this->deaths_count;
        $recovered_count = $this->recovered_count;

        if ($table == 'Active'){
            $patient_info = Active::find($id);
        }elseif ($table == 'Death'){
            $patient_info = Death::find($id);
        }else{
            $patient_info = Recovered::find($id);
        }
        return view('guest.situation.detail',compact('what_table','actives_count','deaths_count','recovered_count','patient_info'));





    }


}

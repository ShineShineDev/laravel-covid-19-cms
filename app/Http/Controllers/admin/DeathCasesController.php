<?php

namespace App\Http\Controllers\admin;

use App\Active;
use App\Death;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeathCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actives = Active::all();
        $deaths = Death::all();
        $numbers = Death::all()->count();
        return view('admin.situation.death.index',compact('deaths','numbers','actives'));
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

        $this->validate($request,['active_id'=>'required']);

        //fetch data from active table
        $info = Active::find($request->active_id);

        //if fetching data fail
        if (!$info){
            return back()->with('status','This Patient is not listed') ;
        }

        //store patient at death table
        $status = Death::create([
            'name'=>$info->name,
            'age'=>$info->age,
            'address'=>$info->address,
            'img'=>$info->img,
            'gender'=>$info->gender,
            'infected_id'=>$info->infected_id,
            'date'=>date('d/m/Y')
        ]);

        if ($status){
            return Active::destroy($request->active_id) ?
                back()->with('status','Successfully') :
                back()->with('status','Fail') ;
        }else{
            return back()->with('status','Fail');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Death::find($id);
        return view('admin.situation.detail',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Death::find($id);
        $actives = Active::all();
        return view('admin.situation.death.edit',compact('patient','actives'));
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

        if ($request->file('photo')){

            //take photo from client photo
            $client_photo = $request->file('photo');

            //set unique photo name
            $img_name = 'mmcovid_19_'.uniqid().'.'.$client_photo->getClientOriginalExtension();

            //move photo to patient_photos folder
            $client_photo->move(public_path().'/patient_photos/',$img_name);

            //fetch data
            $patient = Death::find($id);

            //delete exiting photo
            \File::delete(public_path('patient_photos/'.$patient->img));

            $this->validate($request,['name'=>'required']);
            $patient = Death::find($id);
            $patient->name = $request->name;
            $patient->age = $request->age;
            $patient->address = $request->address;
            $patient->img = $img_name;
            $patient->gender = $request->gender;
            $patient->infected_id = $request->infected;
            $patient->save();

        }else{
            $this->validate($request,['name'=>'required']);
            $patient = Death::find($id);
            $patient->name = $request->name;
            $patient->age = $request->age;
            $patient->address = $request->address;
            $patient->gender = $request->gender;
            $patient->infected_id = $request->infected;
            $patient->save();
        }
        return redirect(url('admin/death'))->with('status','Successfully !  Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Death::find($id);


        \File::delete(public_path('patient_photos/'.$info->img));

        Death::destroy($id);

        return back()->with('status',$info->name.'Successfully Destroy');
    }
}

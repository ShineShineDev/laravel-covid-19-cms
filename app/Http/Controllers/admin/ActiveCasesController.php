<?php

namespace App\Http\Controllers\admin;

use App\Active;
use App\Death;
use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;

class ActiveCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actives = Active::all();
        $numbers = Active::all()->count();
        return view('admin.situation.active.index',compact('actives','numbers'));

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
            'name'=>'required',
            'photo' =>'max:2048'
        ]);
        $image = $request->file('photo');
        $image_name = null;

        if ($request->file('photo')){
            $image_name = 'mmcovid-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/patient_photos/',$image_name);
        }


        Active::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'address'=>$request->address,
            'img'=>$image_name,
            'gender'=>$request->gender,
            'infected_id'=>$request->infected,
            'date'=>date('d/m/Y')
        ]);
        return back()->with('status',$request->name.' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Active::find($id);
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
        $patient = Active::find($id);
        $actives = Active::all();
        return view('admin.situation.active.edit',compact('patient','actives'));
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
            $patient = Active::find($id);

            //delete exiting photo
            \File::delete(public_path('patient_photos/'.$patient->img));

            $this->validate($request,['name'=>'required']);
            $patient = Active::find($id);
            $patient->name = $request->name;
            $patient->age = $request->age;
            $patient->address = $request->address;
            $patient->img = $img_name;
            $patient->gender = $request->gender;
            $patient->infected_id = $request->infected_id;
            $patient->save();

        }else{
            $this->validate($request,['name'=>'required']);
            $patient = Active::find($id);
            $patient->name = $request->name;
            $patient->age = $request->age;
            $patient->address = $request->address;
            $patient->gender = $request->gender;
            $patient->infected_id = $request->infected;
            $patient->save();
        }
        return redirect(url('admin/active'))->with('status','Successfully !  Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Active::find($id);


        \File::delete(public_path('patient_photos/'.$info->img));

        Active::destroy($id);

        return back()->with('status',$info->name.'Successfully Destroy');

    }
}

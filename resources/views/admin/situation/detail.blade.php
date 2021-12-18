@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9 ">
        <div class="row p-md-3 p-2 no-gutters login-box bg-dark">
            <div class="col-12">
                <i class="material-icons text-info float-right go-previous-page" style="font-size: 18px;cursor: pointer;">cancel</i>
            </div>
            <div class="col-md-4 mt-1 p-2">
                <img src="{{ asset('patient_photos/'.$patient->img) }}" class="img-fluid">
            </div>
            <div class="col-md-8 p-2 mt-2 text-info">
                Name <h4 class="border-bottom">{{ $patient->name }}</h4>
                Age <h4 class="border-bottom">{{ $patient->age }}</h4>
                Gender <h4 class="border-bottom">{{ $patient->gender }}</h4>
                Address <h4 class="border-bottom">{{ $patient->address }}</h4>
                From Infected <h4 class="border-bottom">{{ $patient->infected_id }}</h4>
            </div>
        </div>
    </div>
@endsection

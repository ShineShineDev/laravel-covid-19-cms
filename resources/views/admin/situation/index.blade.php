@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        <h5 class="text-info">Covid-19 Situation</h5>
        <div class="bg-dark login-box h-100">
            <div class="row no-gutters p-md-5">

                <!--Level-->
                <div class="col-md-12 mb-3 animated zoomInUp rounded pb-3 prevention-card" style="background-color: rgba(255,255,255,0.2);animation-duration: 1s;">
                    <div class="p-1">
                        <h4 class="text-dark">Level <strong class="badge badge-secondary" id="level">{{$level->level}}</strong></h4>
                        <h4 class="p-1">
                            <div class="progress btn-at-white" style="height: 25px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated {{$level->bg}} show-line " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">Level {{$level->level}}</div>
                            </div>
                            <div class="p-md-4 mt-4">
                                <input type="range" id="slider1" class="w-100 btn-at-white" min="10"  value="{{$level->value}}"  max="45" value="10" step="1" />
                            </div>
                        </h4>
                        <span class="text-warning mt-0 pl-4">Drag and Drop</span>
                    </div>
                </div>

                <!--Rate-->
                <div class="col-md-8 offset-md-2   row no-gutters justify-content-around">
                    <div class="p-2 p-md-3 mt-5 animated login-box rounded zoomInUp" style="border: 2px solid #d9534f;animation-duration: 2s;">
                        <h5 class="text-white">Death Rate
                            {{ substr($death_rate,0,4) }} %
                        </h5>
                    </div>
                    <div class="p-2 p-md-3 mt-5 animated login-box rounded zoomInUp" style="border: 2px solid #f0ad4e;animation-duration: 2s;">
                        <h5 class="text-white">Recovered Rate
                            {{ substr($recovered_rate,0,4) }} %
                        </h5>
                    </div>
                </div>

                <!--Active Case-->
                <div class="col-md-4 p-4 toup mt-md-5">
                    <div class="card  bg-dark login-box" >
                        <div class="card-body">
                            <h4 class="text-center text-warning">
                                {{ $actives  }}
                                <i class="material-icons text-warning">people</i>
                            </h4>
                            <h5 class="text-center text-warning">Actives Cases</h5>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-dark login-box text-info">
                                <a href="{{ route('active.index') }}" style="text-decoration: none;">See Detail</a>
                            </button>
                        </div>
                    </div>
                </div>

                <!--Death-->
                <div class="col-md-4 p-4 toup mt-md-5 ">
                    <div class="card bg-dark login-box" >
                        <div class="card-body">
                            <h4 class="text-center text-danger">
                                {{ $deaths  }}
                                <i class="material-icons text-danger">people</i>
                            </h4>
                            <h5 class="text-center text-danger">Death Cases</h5>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-dark login-box text-info">
                                <a href="{{ route('death.index') }}" style="text-decoration: none;">See Detail</a>
                            </button>
                        </div>
                    </div>
                </div>

                <!--Recovered-->
                <div class="col-md-4 p-4 toup mt-md-5 ">
                    <div class="card bg-dark login-box" >
                        <div class="card-body ">
                            <h4 class="text-center text-success">
                                {{ $recovered  }}
                                <i class="material-icons text-success">people</i>
                            </h4>
                            <h5 class="text-center text-success">Recovered Cases</h5>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-dark login-box text-info">
                                <a href="{{ route('recovered.index') }}" style="text-decoration: none;">See Detail</a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



@extends('layouts.app')
@section('title', 'Situation')
@include('guest.navi.navi')
@section('content')
    <div class="container">
        <div class="row no-gutters mt-5">
            <div class="col-12 mt-5">
                <div class="d-flex   justify-content-around">
                    <div>
                        <a href="{{ url("situation/active") }}" class="btn  btn-sm  btn-at-white text-white rounded" style="background-color:inherit;">
                            <strong class="badge badge-warning">{{ $actives_count }}</strong>
                            &nbsp;Actives
                        </a>
                    </div>
                    <div>
                        <a href="{{ url('situation/death') }}" class="btn btn-sm  btn-at-white text-white rounded"  style="background-color:inherit;">
                            <strong class="badge badge-danger">{{ $deaths_count }}</strong>
                            &nbsp;Deaths
                        </a>
                    </div>
                    <div>
                        <a href="{{ url('situation/recovered') }}" class="btn  btn-sm btn-at-white text-white rounded"  style="background-color:inherit;">
                            <strong class="badge badge-info">{{ $recovered_count }}</strong>
                            &nbsp;Recovered
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-md-8  offset-md-2  mt-md-5 mt-3  p-1 p-md-4 btn-at-white login-box rounded" style="background: rgba(255,255,255,0.1);">
            <div class="row p-md-3 p-2 no-gutters">
                <div class="col-12">
                    <i class="material-icons text-info float-right go-previous-page" style="font-size: 18px;cursor: pointer;">cancel</i>
                </div>
                <div class="col-md-4 mt-1 animated zoomIn p-2" style="animation-duration: 1s;">
                    @if(empty($patient_info->img))
                        <img src="{{ asset('patient_photos/patient.svg') }}" class="img-fluid">
                        @else
                        <img src="{{ asset('patient_photos/'.$patient_info->img) }}" class="img-fluid">
                        @endif

                </div>
                <div class="col-md-8 p-2 mt-2 text-info">
                    <h6 class="text-white"> Name &nbsp;: &nbsp;&nbsp;{{ $patient_info->name }}</h6>
                    <h6 class="text-white mt-3"> Age &nbsp;: &nbsp;&nbsp;{{ $patient_info->age }}</h6>
                    <h6 class="text-white mt-3"> Gender &nbsp;: &nbsp;&nbsp;{{ $patient_info->gender }}</h6>
                    <h6 class="text-white mt-3"> Address &nbsp;: &nbsp;&nbsp;{{ $patient_info->address }}</h6>
                    <h6 class="text-white mt-3"> From Infected &nbsp;: &nbsp;&nbsp;{{ $patient_info->infected_id }}</h6>
                </div>
            </div>

        </div>
    </div>
    <!--Footer-->
    <div class="mt-md-5 login-box" style="background: inherit;">
        @include('guest.navi.footer')
    </div>
@endsection

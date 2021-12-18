@extends('layouts.app')
@section('title',$what_table)
@include('guest.navi.navi')
@section('content')

    <!--count-->
    <div class="container mt-5">
        <div class="row no-gutters mt-5">
            <div class="col-12 mt-5">
                <!--level-->
                @include('layouts.covid_level_situation')
                <h5 class="text-white text-center animated flash " id="show-date" style="animation-duration: 2s;"></h5>
                    <div class="d-flex  justify-content-around mt-1">

                        <!--Active-->
                        <div>
                            <a href="{{ url("situation/active") }}" class="btn  btn-sm  btn-at-white text-white rounded" style="background-color:inherit;">
                                <strong class="badge badge-warning">{{ $actives_count }}</strong>
                                &nbsp;Actives
                            </a>
                        </div>

                        <!--Deaths-->
                        <div>
                            <a href="{{ url('situation/death') }}" class="btn btn-sm  btn-at-white text-white rounded"  style="background-color:inherit;">
                                <strong class="badge badge-danger">{{ $deaths_count }}</strong>
                                &nbsp;Deaths
                            </a>
                        </div>

                        <!--Recovered-->
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

    <!--listing-->
    <div class="row no-gutters" style="height: 100%;">

        <div class="col-md-8 animated zoomInDown offset-md-2  mt-5 p-1 p-md-4 btn-at-white login-box rounded" style="background: inherit;animation-duration: 1s;">

           <div class="border-bottom pb-1">
               <!--Current listing-->
               <button class="btn btn-sm text-white bg-warning  login-box">
                   {{ ucfirst($what_table)  }}
                   <strong class="badge badge-danger">
                       @if($what_table == 'active')
                           {{$actives_count}}
                       @elseif($what_table == 'death')
                           {{$deaths_count}}
                       @elseif($what_table == 'recovered')
                           {{$recovered_count}}
                       @endif
                   </strong>

                   <!--Death rate-->
                   <button class="btn btn-sm p-1 bg-danger login-box text-white ml-1">
                       Death Rate
                       <strong class="badge bg-warning">{{substr($deaths_rate,0,4)}} %</strong>
                   </button>
                   <!--go previous page-->
                   <i class="material-icons go-previous-page text-info float-right" style="font-size: 20px;cursor:pointer;">cancel</i>
               </button>
           </div>

            <!-- To Day Patient-->
            <h6 class="text-white mt-4">
                To Day &nbsp;
                @if(count($to_day) > 0)
                    <strong class="badge badge-info">&nbsp;{{count($to_day)}}&nbsp;</strong>
                    @else
                    <strong class="badge badge-warning text-dark">Empty</strong>
                @endif
            </h6>
            <table class="table table-striped   table-hover mt-1 pb-5 mb-5 rounded text-info" >
                <thead class="transparent_bg">
                <tr class="text-white">
                    <th scope="col" class="hide_moblie">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>
                <tbody>
                @foreach($to_day as $key=>$patient)
                   <tr class="toup">
                       <th scope="row" class="hide_moblie">{{$key+1}}</th>
                       <td><a href="{{ url('situation/show/'.$what_table,$patient->id) }}" style="cursor: pointer;text-decoration: none;">{{$patient->name}}</a></td>
                       <td class="text-info">{{$patient->age}}</td>
                       <td class="text-info">{{$patient->address}}</td>
                   </tr>
               @endforeach
                </tbody>
            </table>

            <!-- All Patient-->
            <h6 class="text-white  mt-3">
                All {{ucfirst($what_table)}}
                &nbsp;
                @if(count($patient_info) > 0)
                    <strong class="badge badge-warning">&nbsp;{{count($patient_info)}}&nbsp;</strong>
                @else
                    <strong class="badge badge-warning text-dark">Empty</strong>
                @endif
            </h6>
            <table class="table table-striped  table-hover mt-1 pb-5 mb-5 rounded text-info" >
                <thead class="transparent_bg">
                <tr class="text-white">
                    <th scope="col" class="hide_moblie">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patient_info as $key=>$patient)
                        <tr class="toup">
                            <th scope="row" class="hide_moblie">{{$key+1}}</th>
                            <td><a href="{{ url('situation/show/'.$what_table,$patient->id) }}" style="cursor: pointer;text-decoration: none;">{{$patient->name}}</a></td>
                            <td class="text-info">{{$patient->age}}</td>
                            <td class="text-info">{{$patient->address}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <!--Footer-->
    <div class="mt-md-5 login-box" style="background: inherit;">
        @include('guest.navi.footer')
    </div>
@endsection

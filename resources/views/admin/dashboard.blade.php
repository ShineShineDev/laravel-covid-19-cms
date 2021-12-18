@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')

    <div class="col-md-9">
        <h5 class="text-info border-bottom">Admin Dashboard</h5>
        <div class="row no-gutters mt-4">

            <!--count Visitors-->
            <div class="col-md-12 toup">
                <h5 class="text-info">Visitors</h5>
                <div class="row no-gutters bg-dark login-box p-md-3 p-2 rounded justify-content-around">
                    <div class="count-visitor   prevention-card rounded  p-1 text-info">
                        <h3 class="text-center mt-3 text-secondary">
                            {{ $count_to_day  }}
                        </h3>
                        <h5 class="text-center text-info">To Day</h5>
                    </div>
                    <div class="prevention-card rounded count-visitor p-1 text-info">
                        <h3 class="text-center mt-3 text-secondary">
                            {{ $visitors  }}
                        </h3>
                        <h5 class="text-center text-info">Total Views</h5>
                    </div>
                </div>
            </div>

            <!--listing to day visitor-->
            <div class="col-md-12 mt-4 toup">
                <h5 class="ml-1 text-info">To Day View</h5>
               <div class="login-box bg-dark rounded p-md-3">
                   <table class="table table-hover  text-info">
                       <thead class="transparent_bg text-white">
                       <tr>
                           <td>#</td>
                           <td>Drive</td>
                           <td>Browser</td>
                           <td>Ip</td>
                       </tr>
                       </thead>
                       <tbody class="text-success">
                       @foreach($to_day as $key=> $visitor)
                           <tr>
                               <td>{{$key+1}}</td>
                               <td>{{ $visitor->device }}</td>
                               <td>{{ $visitor->browser }}</td>
                               <td>{{ $visitor->ip }}</td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>
            </div>

            <div class="col-12 mt-3 todown">
                <h4 class="ml-1 text-info">Situation</h4>
            </div>

            <div class="col-12 mt-4 p-md-3 pb-md-5 p-2 pb-4 toup prevention-card">
                <h6>Level <strong class="badge badge-warning">{{$level->level}}</strong></h6>
                   <div class="progress  btn-at-white" style="height: 25px;">
                       <div class="progress-bar progress-bar-striped progress-bar-animated {{$level->bg}} show-line " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">Level {{$level->level}}</div>
                   </div>
            </div>

            <!--count Active-->
            <div class="col-md-4 mt-5 toup">
                <div class="card bg-dark login-box" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="text-center text-warning">
                            {{ $actives  }}
                            <i class="material-icons text-warning">people</i>
                        </h1>
                        <h4 class="text-center text-warning">Actives Cases</h4>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-dark login-box text-info">
                            <a href="{{ route('active.index') }}" style="text-decoration: none;">See Detail</a>
                        </button>
                    </div>
                </div>
            </div>

            <!--count Death-->
            <div class="col-md-4 mt-5 ">
                <div class="card bg-dark login-box" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="text-center text-danger">
                            {{ $deaths  }}
                            <i class="material-icons text-danger">people</i>
                        </h1>
                        <h4 class="text-center text-danger">Death Cases</h4>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-dark login-box text-info">
                            <a href="{{ route('death.index') }}" style="text-decoration: none;">See Detail</a>
                        </button>
                    </div>
                </div>
            </div>

            <!--count Recovered-->
            <div class="col-md-4  mt-5 toup ">
                <div class="card bg-dark login-box" style="width: 18rem;">
                    <div class="card-body ">
                        <h1 class="text-center text-success">
                            {{ $recovered  }}
                            <i class="material-icons text-success">people</i>
                        </h1>
                        <h4 class="text-center text-success">Recovered Cases</h4>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-dark login-box text-info">
                            <a href="{{ route('recovered.index') }}" style="text-decoration: none;">See Detail</a>
                        </button>
                    </div>
                </div>
            </div>


            <!--Rate-->
            <div class="col-md-8 offset-md-2   row no-gutters justify-content-around">
                <div class="p-2 p-md-3 mt-5 toup  login-box rounded " style="border: 2px solid #d9534f;animation-duration: 2s;">
                    <h5 class="text-white">Death Rate
                        {{ substr($death_rate,0,4) }}
                    </h5>
                </div>
                <div class="p-2 p-md-3 mt-5 toup  login-box rounded " style="border: 2px solid #f0ad4e;animation-duration: 2s;">
                    <h5 class="text-white">Recovered Rate
                        {{ substr($recovered_rate,0,4) }}
                    </h5>
                </div>
            </div>

        </div>
    </div>
@endsection


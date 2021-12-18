@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        <h5 class="text-info border-bottom">Detect Visitor </h5>
        <div class="bg-dark login-box h-100 p-md-3 p-1">
            <div class="row mt-2">
                <!--count Visitors-->
                <div class="col-md-12">
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
                <div class="col-md-12 mt-4">
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
            </div>
        </div>
    </div>
@endsection

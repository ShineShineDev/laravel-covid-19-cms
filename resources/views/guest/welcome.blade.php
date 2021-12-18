@extends('layouts.app')
@section('title', 'Welcome')
@include('guest.navi.navi')
@section('content')
    <div class="row m-0 mb-4   w-100 pb-4 no-gutters" style="position: fixed;">
        <!-- intro and level -->
        <div class="col-md-6 mt-md-5 mt-1">
            <!-- intro -->
            <div class="mt-md-5 mb-0">
                <h3 class="text-center mt-md-3 mt-2 todown" style="color: yellow;">
                    Myanmar
                    <img class="animated zoomIn" style="animation-duration: 2s;" src="{{ asset('imgs/myanmar.svg') }}" width="40px;">
                </h3>
                <h6 class="text-center mt-2  text-white">Covid-19 Situation
                </h6>
                <img src="{{ asset('tip-imgs/mask.svg') }}" width="20" class="" style="transform: rotate(20deg)">
            </div>
            <!-- level -->
            @include('layouts.covid_level_situation')

        </div>
        <!--status-->
        <div class="col-md-6 p-1 pl-md-4 mt-md-5">

            <!--hand wash icon-->
            <img src="{{ asset('tip-imgs/hand-wash.svg') }}" width="20" class="float-right" style="transform: rotate(80deg)">

            <!-- Death ,active , recovered-->
            <div class="mt-md-4 ml-md-3 mt-3 container">

                <!-- Death -->
                <div class="animated slideInRight" style="animation-duration: 1s;animation-delay: 1s;">
                    <i class="material-icons text-danger float-left mt-1" style="font-size: 15px;">lens</i>
                    <h6 class="text-white d-inline ml-3 ">
                        Deaths
                        <strong class="ml-5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;
                            {{ $deaths }}</strong>
                        <small style="position: relative;top:3px;"><i class="material-icons  text-info" style="font-size: 18px;">people</i>
                        </small>
                    </h6>
                </div>

                <!-- Active -->
                <div class="mt-3 animated slideInLeft" style="animation-duration:1s;">
                    <i class="material-icons text-warning float-left mt-1" style="font-size: 15px;">lens</i>
                    <h6 class="text-white d-inline ml-3">
                        Current Actives
                        <strong class="ml-5">
                            {{ $actives }}
                            <small style="position: relative;top:3px;"><i class="material-icons  text-info" style="font-size: 18px;">people</i>
                            </small>
                        </strong>
                    </h6>
                </div>

                <!-- Recovered -->
                <div class="mt-3 animated slideInDown" style="animation-duration: 1s;">
                    <i class="material-icons text-success float-left mt-1" style="font-size: 15px;">lens</i>
                    <h6 class="text-white d-inline ml-3">
                        Recoveries
                        <strong class="ml-5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $recovered }}
                        </strong>
                        <small style="position: relative;top:3px;"><i class="material-icons  text-info" style="font-size: 18px;">people</i>
                        </small>
                    </h6>
                </div>

                <!-- Total  -->
                <div class="animated flash mt-3 border-top w-100" style="animation-duration:2s;animation-delay: 2s; ">
                    <strong class="p-1 text-warning rounded d-inline ml-4">
                        Total Case
                        <strong class="ml-5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$deaths+$actives+$recovered}}
                        </strong>

                    </strong>
                    </small>
                </div>

                <!-- death rate -->
                <div class="animated flash pt-1" style="animation-duration:2s;animation-delay: 2s; ">
                    <strong class=" text-warning rounded d-inline ml-4">
                        &nbsp;Deaths Rate
                        <strong class="ml-5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ substr($deaths_rate,0,4) }} %
                        </strong>
                    </strong>
                    </small>
                </div>

                <a href="{{ url('situation') }}" class="btn btn-sm go-situation-btn btn-outline-info text-white mt-md-4 login-box mt-3 pl-3 pr-3 ml-4">
                    See More &nbsp;
                    <i class="material-icons float-right situation-arrow" style="font-size: 20px;display: none;">forward</i>
                </a>

                <img src="{{ asset('imgs/covid-and-world.png') }}" width="200px;" class="float-right round">
            </div>
            <br>
        </div>
    </div>

    <!-- knowledge , news and posts -->
    <div class="pb-5 m-0 p-0 btn-at-white second-div " style="background-image: url('{{ asset('imgs/service-bg.jpg') }}');background-size: cover;">

        <div class="row mt-5 no-gutters">

            <!--Knowledge,News and Posts -->
            <div class="col-md-12" style="background-image: url('{{ asset('imgs/service-bg.jpg') }}');background-size: cover;">
                <div class="container mt-3">
                    <div class="card-columns">
                        <!--knowledge-->
                        <div class="card toup p-1 mt-4 prevention-card login-box  border-0 " >
                            <div class="card-body p-3 login-box">
                                <h5 class="card-title text-info border-bottom">Knowledge <span class="material-icons text-primary float-right">video_library</span> </h5>
                                <img  src="{{ asset('imgs/biology.svg') }}" class="info" width="100%" height="150px;">

                                <a href="{{ url('knowledge') }}"  class="btn btn-info mt-3 btn-block go-situation-btn  p-box border md-24 go-page">
                                    See More &nbsp;<i class="material-icons float-right text-dark situation-arrow" style="display: none;"  width="20px">forward</i>
                                </a>
                            </div>
                        </div>
                        <!--news-->
                        <div class="card toup p-1 mt-4 prevention-card  login-box  border-0 " >
                            <div class="card-body p-3  login-box  ">
                                <h5 class="card-title text-info  border-bottom">News <span class="material-icons float-right text-primary">menu_book</span></h5>
                                <img  src="{{ asset('imgs/newspaper.svg') }}" width="100%" height="150px;">

                                <a href="{{ route('news.index') }}"  class="btn btn-info mt-3 btn-block go-situation-btn p-box border md-24 go-page">
                                    See More &nbsp;<i class="material-icons float-right text-dark situation-arrow" style="display: none;" width="20px">forward</i>
                                </a>
                            </div>
                        </div>
                        <!--Situation-->
                        <div class="card todown p-1 mt-4 prevention-card login-box  border-0" >
                            <div class="card-body p-3 login-box  ">
                                <h5 class="card-title text-info border-bottom ">Situation<span class="material-icons float-right text-primary">near_me</span></h5>
                                <img  src="{{ asset('imgs/mes.svg') }}" width="100%" height="150px;">

                                <a href="{{ url('situation') }}"  class="btn btn-info mt-3 btn-block go-situation-btn p-box border md-24 go-page">
                                    See More &nbsp;<i class="material-icons float-right text-dark situation-arrow" style="display: none;"  style="display: none;"  width="20px">forward</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--prevention tips-->
            <div class="col-md-12 mt-4">
                <div class="container">
                    <h5  class="text-center text-white mt-3 " style="border-bottom: 2px solid #6610f2;">Be Safe from covid,simple tips</h5>
                </div>

                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="p-0" id="card_counts">
                            <div class="row m-0 p-0">
                                <!--wash your hand-->
                                <div class="col-sm-3 todown">
                                    <div class="card card-inverse border-0   p-3 h-100 text-center" style="background: inherit;">
                                        <div class="card-block card-title  prevention btn-at-white  rounded p-4">
                                            <img  src="{{ asset('tip-imgs/hand-wash.svg') }}" width="100%" height="100px;">
                                            <h6 class="text-info mt-2 font-weight-bold">Wash your hand</h6>
                                        </div>
                                    </div>
                                </div>

                                <!--mask-->
                                <div class="col-sm-3 toup">
                                    <div class="card card-inverse border-0   p-3 h-100 text-center" style="background: inherit;">
                                        <div class="card-block card-title  prevention  btn-at-white rounded p-4">
                                            <img  src="{{ asset('tip-imgs/mask.svg') }}" width="100%" height="100px;">
                                            <h6 class="text-info mt-2 font-weight-bold">Wear a surgical mask</h6>
                                        </div>
                                    </div>
                                </div>

                                <!--stay home-->
                                <div class="col-sm-3 toup">
                                    <div class="card card-inverse border-0   p-3 h-100 text-center" style="background: inherit;">
                                        <div class="card-block card-title  prevention  btn-at-white rounded p-4">
                                            <img  src="{{ asset('tip-imgs/stay-home.svg') }}" width="100%" height="100px;">
                                            <h6 class="text-info font-weight-bold mt-2">Stay at home,Save Lies</h6>
                                        </div>
                                    </div>
                                </div>

                                <!--avouid crowded places-->
                                <div class="col-sm-3 todown">
                                    <div class="card card-inverse border-0   p-3 h-100 text-center" style="background: inherit;">
                                        <div class="card-block card-title  prevention  btn-at-white rounded p-4">
                                            <img  src="{{ asset('tip-imgs/avoid.svg') }}" width="100%" height="100px;">
                                            <h6 class="text-info font-weight-bold mt-2">Avoid crowded places</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <!--Footer-->
    <div class="mt-md-5 " style="background: inherit;border-top: 1px solid blue;">
        @include('guest.navi.footer')
    </div>

@endsection



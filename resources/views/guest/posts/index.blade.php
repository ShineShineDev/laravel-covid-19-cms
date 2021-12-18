@extends('layouts.app')
@section('title', 'Posts')
@include('guest.navi.navi')
@section('content')
    <div class="container font-eng mt-md-5 mt-3 ">
        <h5 class="text-center text-white">posts</h5>
        <div class="row">
            <!--knowledge--->
            <div class="col-md-9 mb-4">
                <div class="card-columns">
                    <div class="card p-1 toup ">
                        <p class="text-dark p-0 m-0 border-bottom ">title</p>
                        <div class="card-body p-1">
                            <a  href="" style="text-decoration: none;">
                                <img  src="{{ asset('imgs/biology.svg') }}" class="info" width="100%" height="150px;">
                                <p class="m-0 p-0 text-primary">As a designer and developer, I understand the perfect user interface should ... </p>
                            </a>
                        </div>
                        <div class="card-footer mt-1 m-0 p-0">
                            <button class="btn btn-sm mt-1 transparent_bg ">
                                crd : something
                            </button>
                            <button class="btn btn-sm mt-1 transparent_bg float-right">
                                <span class="material-icons text-dark" style="font-size: 20px;">cancel</span>
                            </button>
                            <button class="btn btn-sm mr-1 mt-1 float-right ">
                                <a class="text-dark" href="" style="text-decoration: none;">
                                    Read More
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                <a href="" class="btn  btn-sm btn-dark float-right"> Next Page </a>
            </div>
            <!--Search  && Recent--->
            <div class="col-md-3">
                <!--Search-->
                <form class="form-inline ">
                    <input style="background-color: transparent;" class="form-control border-bottom p-1 ml-1" type="search" placeholder="Search here" aria-label="Search">
                    &nbsp;<input  class="btn ml-md-1 btn-sm btn-outline-primary mt-1 mr-2"  disabled type="submit">
                </form>

                <!--recent Posts-->
                <button class="text-info p-1 mt-3 btn btn-sm rounded btn-dark font-weight-bold">Recent <i class="fa fa-photo"></i></button>

                <div class="transparent_bg mt-1 rounded pl-2 p-1">
                    <a class="text-white " href="">
                        <p class="card-text p-0"></p>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!--Footer-->
    <div class="mt-md-5 border-top" style="background: inherit;">
        @include('guest.navi.footer')
    </div>
@endsection
@extends('layouts.app')
@section('title', 'About')
@include('guest.navi.navi')
@section('content')
    <div class="container mt-5">
        <div class="row no-gutters mt-5">
            <!--count-->
            <div class="col-12 mt-5">
                <h4 class="text-primary text-center">About Us</h4>
                <img src="{{asset('imgs/bg3.jpg')}}" class="img-fluid">
            </div>
        </div>
    </div>
    <!--Footer-->
    <div class="mt-md-5 login-box" style="background: inherit;">
        @include('guest.navi.footer')
    </div>
@endsection

@extends('layouts.app')
@section('title', 'FeedBack')
@include('guest.navi.navi')
@section('content')
    <!--msg send and info and gMap -->
   
    <div class="p-md-1">
        <div class="container p-md-5 mt-5">
            <!--error message-->
            @include('layouts.error-message')
            <!--status message-->
            @include('layouts.status-message')
            <div class="row  rounded login-box ">
                <!--form-->
                <div class="col-md-5  offset-md-1">
                    <h5 class="ml-3 mt-5  text-info">Send Us A Message</h5>
                    <form class="p-2 p-md-3" method="POST" action="{{ url('feedback/store') }}">
                        @csrf
                        <div class="form-group">
                            <small class="text-warning">required</small>
                            <input  type="text" name="name" class="form-control text-secondary name-at-contact" placeholder="name">
                            <i style="float:right;position: relative;top: -28px;" class="material-icons mr-2  text-info">person</i>
                        </div>
                        <div class="form-group">
                            <small class="text-warning">required</small>
                            <input type="number" name="phone" class="form-control text-secondary phone-at-contact" placeholder="phone">
                            <i style="float:right;position: relative;top: -28px;" class="material-icons mr-2 text-info">phone</i>
                        </div>
                        <div class="form-group">
                            <input type="email" name="mail" class="form-control text-secondary" placeholder="mail">
                            <i style="float:right;position: relative;top: -28px;" class="material-icons mr-2 text-info">mail</i>
                        </div>

                        <input type="hidden" name="geolocation" id="geo">

                        <div class="form-group">
                            <textarea type="text" name="text" class="form-control text-secondary text-at-contact" placeholder="message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-sm btn-outline-info send-at-contact border-0 rounded pl-3 pr-3 login-box">
                        </div>
                    </form>
                </div>

                <!--Contact us-->
                <div class="col-md-5">
                    <h5 class="ml-3 mt-5  text-info">Contact Us</h5>
                    <ul class="list-group p-2 p-md-3">
                        <li class="list-group-item ">
                            <a href="tel: 09799990088" style="text-decoration: none;">
                                <i class="material-icons float-left ml-0" style="font-size: 20px;">phone</i>&nbsp;&nbsp;
                                :&nbsp;&nbsp; 09787796698
                            </a>
                        </li>
                        <li class="list-group-item mt-1">
                            <a href="mailto: augshine194@gmail.com" style="text-decoration: none;">
                                <i class="material-icons float-left ml-0" style="font-size: 20px;">mail</i>&nbsp;&nbsp;
                                :&nbsp;&nbsp; mmcovid@gmail.com
                            </a>
                        </li>
                        <li class="list-group-item mt-1">
                            <a href="#" style="text-decoration: none;">
                                <i class="material-icons float-left ml-0" style="font-size: 20px;">map</i>&nbsp;&nbsp;
                                :&nbsp;&nbsp; Myanmar
                            </a>
                        </li>
                        <li class="list-group-item mt-1">
                            <a href="#" style="text-decoration: none;">&nbsp;&nbsp; Facebook</a>
                            <a href="#" style="text-decoration: none;">&nbsp;&nbsp; Youtube</a>
                            <a href="#" style="text-decoration: none;">&nbsp;&nbsp; Twitter</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-md-5 login-box" style="background: inherit;">
        @include('guest.navi.footer')
    </div>
@endsection





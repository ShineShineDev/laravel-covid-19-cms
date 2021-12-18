@extends('layouts.app')
@section('title', 'knowledge')
@include('guest.navi.navi')
@section('content')
    <div class="bg-dark ">
        <div class="container pb-5  mt-md-5 mt-3 ">
        <div class="row p-m-3 row mt-2">
            <!--listing videos-->
            <div class="col-md-9">
                <h5 class="mt-5 border-bottom text-info">Knowledge</h5>
                <div class="row">
                    @foreach($videos as $video)
                        <div class="col-md-6 mt-3">
                            <div class="bg-dark login-box rounded rounded">
                                <h5 class="card-title pl-2 pt-1 text-info" style="font-size: 15px;">
                                    {{$video->title}}
                                </h5>
                                <div class="frame-pare pl-2 pr-2">
                                    @php
                                        echo $video->frame
                                    @endphp
                                </div>
                                <p class="card-text text-info p-1">
                                    <a href="{{ $video->source_link }}" style="text-decoration:none;">
                                        {{ $video->source_link }}
                                    </a>
                                </p>
                                <div class="p-2 mt-0 pt-0">
                                    <a  class="btn btn-sm bth-dark login-box text-white" href="{{ route('knowledge.show',$video->id)}}">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($has_previous_page)
                    <a  class="btn btn-sm  btn-dark login-box float-left go-previous-page mt-2 text-white">Previous Page</a>
                    @endif
                <a href="{{ url('knowledge/page/'.$paginate) }}"  class="btn btn-sm  btn-dark login-box float-right mt-2 text-white">Next Page</a>
            </div>

            <!--recent video-->
            <div class="col-md-3">
                <h5 class="mt-5 border-bottom text-info">Recent</h5>
                <ul class="list-group pl-2">
                    @foreach($recents as $recent)
                        <li class="list-group-item pl-0 border-left-0 border-right-0 text-info" style="background-color:inherit;">
                            <a class="text-info" style="font-size: 15px;" href="{{ route('knowledge.show',$recent->id) }}">{{$recent->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
        <!--Footer-->
        <div class="mt-md-5 login-box border-top" style="background: inherit;">
            @include('guest.navi.footer')
        </div>
    </div>
@endsection
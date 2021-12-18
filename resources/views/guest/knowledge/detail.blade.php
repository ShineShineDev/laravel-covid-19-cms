@extends('layouts.app')
@section('title', 'knowledge')
@include('guest.navi.navi')
@section('content')
    <div class="bg-dark pb-5">
        <div class="container mt-md-5 mt-3 ">
            <div class="row p-m-3 row mt-2">

                <div class="col-md-8">
                    <h5 class="mt-5 border-bottom text-info">Knowledge</h5>

                    <div class="card mb-3 login-box rounded rounded" style="background-color: inherit">
                        <h5 class="card-title pl-2 pt-1 text-info">
                            {{ucfirst($video->title)}}
                        </h5>
                        <div class="frame-pare pl-2 pr-2" >
                            @php
                                echo $video->frame
                            @endphp
                        </div>
                        <p class="card-text text-info p-1">
                            {{$video->description}}<br>
                            <a href="{{ $video->source_link }}" style="text-decoration:none;">
                                {{ $video->source_link }}
                            </a>
                        </p>
                    </div>
                    <a  class="btn pl-3 go-previous-page pr-3 btn-sm bg-dark  login-box text-info">
                        <span class="material-icons float-right" style="font-size: 20px;">arrow_back</span>
                    </a>
                    <h5 class="mt-3 border-bottom text-info">Next Link</h5>
                    <a  href="{{ route('knowledge.show',$sibling[0]->id) }}" class="btn pl-1 btn-sm bg-dark  login-box text-info">
                        {{ $sibling[0]->title }} &nbsp;
                        <span class="material-icons float-right" style="font-size: 20px;">arrow_forward</span>
                    </a>

                </div>

                <div class="col-md-4 mb-5">
                    <h5 class="mt-5 border-bottom text-info">Recent</h5>
                    <div class="login-box rounded p-2" style="background-color: inherit;">
                        <ul class="list-group pl-1">
                            @foreach($recents as $recent)
                                <li class="list-group-item pl-0 border-left-0 border-right-0 text-info" style="background-color:inherit;">
                                    <a class="text-info" href="{{ route('knowledge.show',$recent->id) }}">{{$recent->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-->
        <div class="mt-md-5 border-top" style="background: inherit;">
            @include('guest.navi.footer')
        </div>
    </div>
@endsection
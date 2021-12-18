@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')

    <div class="col-md-9 mt-2">
        <div class="row no-gutters rounded pb-5 bg-dark login-box">
            <!--detail btn & go back btn-->
            <div class="col-12 p-1">
                <button class="btn btn-sm btn-dark text-info login-box">detail</button>
                <span class="material-icons text-warning float-right   go-previous-page" style="cursor: pointer;">cancel</span>
            </div>

            <!--showing news-->
            <div class="col-md-9 p-md-3 rounded p-md-2  offset-md-1 bg-dark login-box">
                <div class="card bg-dark border-0">
                    <!--title-->
                    <h6 class="card-title pl-1 pt-3 text-white ">
                        {{$news->title}}
                    </h6>

                    <!--text-->
                    <div class="card-body border-top p-2">
                        <p class="card-text text-info" style="font-size: 14px;"> {{$news->text}}<br></p>
                    </div>

                    <!--img-->
                    <div class="row pb-4">
                        <!--img-->

                        @foreach(unserialize($news->file) as $file)
                            @if(explode('.',$file)[1] == 'pdf')
                                <a href="{{url('download/news_files/'.$file)}}" class="btn btn-sm bg-white btn-at-white ml-3 pl-3 pr-3 btn-at-white text-info">Download Pdf</a>
                                @else
                                <div class="col-md-4 mt-1">
                                    <img class="card-img-top img-fluid" src="{{ asset('news_files/'.$file) }}" data-toggle="modal" data-target="#{{explode('.',$file)[0]}}" alt="{{$file}}" style="cursor: pointer;">
                                </div>
                                <div id="{{explode('.',$file)[0]}}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header p-2">
                                                <a href="{{url('download/news_files/'.$file)}}" class="btn btn-sm bg-white pl-3 pr-3 btn-at-white text-info">Download</a>
                                                <button  class="btn btn-sm bg-white pl-3 pr-3 btn-at-white text-info" data-dismiss="modal" aria-label="Close">
                                                    <span class="material-icons" style="font-size: 20px;">cancel</span>
                                                </button>
                                            </div>
                                            <img class="card-img-top w-100" src="{{ asset('news_files/'.$file) }}" >
                                        </div>
                                    </div>
                                @endif
                        </div>
                            @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

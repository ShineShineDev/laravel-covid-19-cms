@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        <div class="row">
                <div class="col-md-12">
                    <button class="btn bth-sm btn-dark float-right login-box go-previous-page"><i class="material-icons" style="font-size: 20px;">cancel</i></button>
                    <div class="bg-dark ">
                        <h5 class="card-title pl-2 pt-1 text-info">
                            {{$video->title}}
                        </h5>
                        <div class="frame-pare pl-2 pr-2">
                            @php
                                echo $video->frame
                            @endphp
                            <p class="card-text text-info p-1">
                                {{$video->description}}<br>
                                <a href="{{ $video->source_link }}" style="text-decoration:none;">
                                    {{ $video->source_link }}
                                </a>
                            </p>
                        </div>
                        <div class="p-2">
                            <a class="btn bth-sm bth-dark login-box" href="{{ url('admin/knowledge/edit/'.$video->id) }}">
                                <i class="material-icons float-left text-white pl-1" style="font-size: 18px;">edit</i>
                            </a>
                            &nbsp;
                            <a class="btn bth-sm bth-dark login-box" href="{{ url('admin/knowledge/destroy/'.$video->id) }}">
                                <i class="material-icons float-left text-white pl-1" style="font-size: 18px;">delete</i>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </div>


@endsection

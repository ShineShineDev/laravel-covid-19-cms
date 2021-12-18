@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        <button class="btn  btn-dark login-box text-info">Knowledge</button>
        @include('admin.knowledge.create')
        <button class="btn  btn-dark login-box" data-toggle="modal" data-target="#knowledge"><span class="material-icons">add_circle</span></button>
        <a href="{{ url('admin/knowledge/page/'.$paginate) }}" class="btn  btn-dark login-box float-right text-white">Next Page</a>
        <div class="row row mt-2">
               @foreach($videos as $video)
                   <div class="col-md-6 mt-3">

                       <div class="bg-dark login-box rounded rounded">
                       <h5 class="card-title pl-2 pt-1 text-info">
                           {{ucfirst($video->title)}}
                       </h5>
                           <div class="frame-pare pl-2 pr-2">
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

                           <div class="p-2">
                               <a  class="btn btn-sm bth-dark login-box" href="{{ url('admin/knowledge/edit/'.$video->id) }}">
                                   <i class="material-icons float-left text-white pl-1" style="font-size: 18px;">edit</i>
                               </a>
                               &nbsp;
                               <a  class="btn btn-sm bth-dark login-box" href="{{ url('admin/knowledge/destroy/'.$video->id) }}">
                                   <i class="material-icons float-left text-white pl-1" style="font-size: 18px;">delete</i>
                               </a>
                               <a  class="btn btn-sm bth-dark login-box text-white" href="{{ url('admin/knowledge/show/'.$video->id) }}">
                                   Detail
                               </a>
                           </div>
                       </div>

                   </div>
               @endforeach
        </div>
        <a href="{{ url('admin/knowledge/page/'.$paginate) }}"  class="btn  btn-dark login-box float-right mt-2 text-white">Next Page</a>
       </div>


@endsection

@extends('layouts.app')
@section('title', 'News')
@include('guest.navi.navi')
@section('content')
  <div class="bg-dark">
      <div class="container mt-5">
          <div class="row">
              <div class="col-md-8  p-1 pt-m mt-2 ">
                  <!--title-->
                  <h6 class="card-title pt-3 text-white">{{$news->title}}</h6>

                  <!--text-->
                  <div class="card-body border-top p-2">
                      <p class="card-text text-info" style="font-size: 15px;"> {{$news->text}}<br></p>
                  </div>

                  <!--img-->
                  <div class="card-columns no-gutters  pb-2">
                      @foreach(unserialize($news->file) as $file)
                          @if(explode('.',$file)[1] != 'pdf')
                              <div class="card mt-1">
                                  <img class="card-img-top img-fluid" src="{{ asset('news_files/'.$file) }}" data-toggle="modal" data-target="#{{explode('.',$file)[0]}}" alt="{{$file}}" style="cursor: pointer;">
                              </div>
                              <div id="{{explode('.',$file)[0]}}" class="modal fade" tabindex="-1" role="dialog">
                                  <div class="modal-dialog " role="document">
                                      <div class="modal-content">
                                          <div class="modal-header border-0 bg-dark p-2">
                                              <a href="{{url('download/news_files/'.$file)}}" class="btn btn-sm bg-dark login-box pl-3 pr-3 btn-at-white text-info">Download</a>
                                              <button  class="btn btn-sm bg-dark pl-3 pr-3 login-box text-info" data-dismiss="modal">
                                                  <span class="material-icons" style="font-size: 20px;">cancel</span>
                                              </button>
                                          </div>
                                          <img class="card-img-top rounded-0 border-0  w-100" src="{{ asset('news_files/'.$file) }}" >
                                      </div>
                                  </div>
                              </div>
                          @else
                              <a href="{{url('download/news_files/'.$file)}}" class="btn btn-sm bg-dark login-box pl-3 pr-3 btn-at-white text-info">Download Pdf</a>
                          @endif
                      @endforeach
                  </div>
                  <!--go previous page -->
                  <button class="btn btn-sm btn-dark login-box go-previous-page">
                      <span class="material-icons pl-2 pr-2" style="font-size: 20px;">arrow_back</span>
                  </button>

                  <h5 class="mt-3 border-bottom text-info">Next Link</h5>
                  <a style="font-size: 15px;"  href="{{ route('news.show',$sibling[0]->id) }}" class="btn pl-1 btn-sm bg-dark  login-box text-info">
                      {{ $sibling[0]->title }} &nbsp;
                      <span class="material-icons float-right" style="font-size: 20px;">arrow_forward</span>
                  </a>

              </div>
              <!--recent-->
              <div class="col-md-4  pt-3 mt-2">
                  <h5 class="border-bottom text-white mt-2">Recent</h5>
                  @foreach($recents as $recent)
                      <a class="text-info" href="{{ route('news.show',$recent->id) }}">
                          <p class="border-bottom p-1" style="font-size: 15px;">{{$recent->title}}</p>
                      </a>
                  @endforeach
              </div>

          </div>
      </div>
      <div class="mt-md-5  login-box" style="background: inherit;">

          @include('guest.navi.footer')
      </div>
  </div>
@endsection

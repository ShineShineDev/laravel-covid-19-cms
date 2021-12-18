@extends('layouts.app')
@section('title', 'News')
@include('guest.navi.navi')
@section('content')
    <div class="p-md-4 bg-dark font-eng mt-md-5 p-1 pt-5">
        <div class="row no-gutters">
            <!--news--->
            <div class="col-md-9 mb-4">
                <h5 class="text-info pt-4 mb-3 ml-2" style="border-bottom: 1px solid #202227;">News</h5>

                <div class="card-columns">
                   @foreach($news as $item)
                        <div class="card p-1 toup bg-dark login-box rounded-0 ">
                            <div class="card-header  border-0 pl-2 pr-2 pb-0">
                               <h6 class="text-info" style="font-size: 15px;">{{$item->title}}</h6>
                           </div>
                            @if(count(unserialize($item->file)) >= 1)
                                <div class="card-body pl-2 pr-2 pb-0 pt-0">
                                    <a  href="{{ route('news.show',$item->id) }}" style="text-decoration: none;">
                                    <!--img-->
                                        @if(explode('.',unserialize($item->file)[0])[1] == 'pdf')
                                            <a href="{{url('download/news_files/'.unserialize($item->file)[0])}}" class="btn btn-sm login-box mt-1 mb-1 text-info bg-dark">Download Pdf</a>
                                        @else
                                            <img class="card-img-top p-1 img-fluid" src="{{ asset('news_files/'.unserialize($item->file)[0]) }}" alt="{{unserialize($item->file)[0]}}">
                                        @endif
                                    </a>
                                </div>
                            @endif
                            <div class="card-footer mt-1 pl-2 pr-2 pb-0 pt-0">
                                <button class="btn btn-sm mr-1 mt-1">
                                    <a  href="{{ route('news.show',$item->id) }}" style="text-decoration: none;">
                                        Read More
                                    </a>
                                </button>
                                <button class="btn btn-sm mt-1 del-parent-parent-el login-box float-right">
                                    <span class="material-icons text-info" style="font-size: 20px;">cancel</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($has_previous_page)
                <a href="#" class="btn  btn-sm btn-dark login-box go-previous-page">Previous Page</a>
                @endif
                <a href="{{url('news/page/'.$paginate)}}" class="btn  btn-sm btn-dark login-box float-right"> Next Page </a>
            </div>

            <!--Search  && Recent--->
            <div class="col-md-3">
                <!--recent Posts-->
                <h5 class="text-info pt-4 mb-3 ml-2" style="border-bottom: 1px solid #202227;">Recent</h5>
                <ul class="list-group pl-2">
                    @foreach($recents as $recent)
                        <li class="list-group-item pl-0 border-left-0 border-right-0 " style="background-color:inherit;">
                            <a style="text-decoration: none;font-size: 15px;" class="text-info" href="{{ route('knowledge.show',$recent->id) }}">{{$recent->title}}</a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    <!--Footer-->
    <div class="bg-dark border-top login-box">
        @include('guest.navi.footer')
    </div>
@endsection
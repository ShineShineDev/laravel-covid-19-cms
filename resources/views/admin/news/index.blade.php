@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">

        <!--page title-->
        <button class="btn btn-sm btn-dark login-box text-info">News &nbsp;&nbsp;<i class="material-icons float-right text-primary" style="font-size: 20px;">menu_book</i></button>
        <!--add modal box-->
        @include('admin.news.create')
        <!--add btn-->
        <button class="btn btn-sm btn-dark login-box" data-toggle="modal" data-target="#news"><span class="material-icons text-info">add_circle</span></button>

        <!--paginate btn-->
        <a href="{{ url('admin/admin_news/page/'.$paginate) }}" class="btn btn-sm btn-dark login-box float-right text-white">Next Page</a>

        <!--news-->
        <div class="p-md-3 bg-dark mt-2 login-box">
            <div class="card-columns mt-2 border-0">
                @foreach($news as $item)
                    <div class="card bg-dark login-box" style="100%;">
                        <!--title-->
                        <p class="card-title pl-2 pt-2 text-info border-bottom" style="font-size: 14px;">
                            <a  class="text-primary" href="{{ route('admin_news.show',$item->id) }}">
                                {{$item->title}}
                            </a>
                        </p>
                        <!--img-->
                        @if(count(unserialize($item->file)) >= 1)
                            @if(explode('.',unserialize($item->file)[0])[1] == 'pdf')
                                <img class="card-img-top p-1 " style="width: 150px;" src="{{ asset('imgs/pdf.svg') }}" alt="Pdf">
                            @else
                                <img class="card-img-top p-1 img-fluid" src="{{ asset('news_files/'.unserialize($item->file)[0]) }}" alt="{{unserialize($item->file)[0]}}">
                                @endif
                        @endif
                        <!--edit & delete & detail btn-->
                        <div class="card-footer border-top-0 p-2">
                            <!--edit-->
                            <a  class="btn btn-sm  text-info panel-box" href="{{ route('admin_news.edit',$item->id) }}">edit</a>
                            <!--delete-->
                            <form class="d-inline m-0 p-0" method="post" action="{{ route('admin_news.destroy',$item->id) }}">
                                @method('DELETE')@csrf
                                <input type="submit" class="btn btn-sm  panel-box  text-info" value="delete">
                            </form>
                            <!--detail-->
                            <a  class="btn btn-sm panel-box  text-info" href="{{ route('admin_news.show',$item->id) }}">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--paginate btn-->
        <a href="{{ url('admin/admin_news/page/'.$paginate) }}"  class="btn btn-sm  btn-dark login-box float-right mt-2 text-white">Next Page</a>
    </div>


@endsection

@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')

    <div class="col-md-9">
        <form class="form-inline" method="post" action="{{ url('admin/feedback/search') }}">
            @csrf
            <input class="form-control mr-sm-2 bg-dark login-box text-info border-0" name="value" type="date" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark login-box my-2 my-sm-0 text-primary" type="submit">Search</button>
        </form>

        <div class="row no-gutters">
            <div class="col-md-8 offset-md-2 bg-dark login-box">
                <span class="material-icons text-warning float-right mt-1 mr-2 go-previous-page" style="cursor: pointer;">cancel</span>
                <div class="card p-0 bg-dark border-0">
                    <div class="card-body">
                        <div class="card-header bg-dark text-info pl-0 pt-1 pb-1">
                            {{$feedback->name}}
                            <span class="float-right">{{$feedback->phone}}</span>
                        </div>
                        <div class="card-body pl-0 pt-1 pb-1">
                            <p class="card-text text-info">
                                {{$feedback->text}}
                            </p>
                        </div>
                        <div class="card-footer pl-0 pr-0 pt-1 pb-0 bg-dark mt-1">
                            <form class="d-inline m-0 p-0" method="post" action="{{ route('feedback.destroy',$feedback->id)  }}">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-sm m-0 text-info bg-dark login-box" value="Delete">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

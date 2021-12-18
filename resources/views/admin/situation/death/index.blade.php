@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        @include('admin.situation.death.add-death')
        <div class="login-box p-md-3 bg-dark rounded-0">
            <button class="btn btn-sm text-white  btn-at-white">Death &nbsp;&nbsp;<strong class="badge badge-danger badge-pill"> {{ $numbers }}</strong></button>
            <button class="btn btn-sm  text-white btn-at-white" data-toggle="modal" data-target="#death">
                <i class="material-icons text-white" style="font-size: 22px;">add</i>
            </button>
            <button class="btn btn-sm text-white btn-at-white float-right close">
                <span class="material-icons text-white close-death-table">remove_circle</span>
            </button>
            <table class="table table-hover mt-2 text-info death-table">
                <thead class="transparent_bg text-white">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($deaths as $death)
                    <tr>
                        <td>1</td>
                        <td>
                            <a href="{{ route('death.show',$death->id) }}" class="text-info">  {{ $death->name }}</td>
                        </a>
                        <td>{{$death->age}}</td>
                        <td>
                            <a href="{{ route('death.edit',$death->id) }}">
                                <i class="material-icons float-left text-primary" style="font-size: 18px;">edit</i>
                            </a>
                            &nbsp;|
                            <form class="d-inline m-0 p-0" method="post" action="{{ route('death.destroy',$death->id)  }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-dark border-0 m-0 p-0 bg-dark" style="background: white;">
                                    <i class="material-icons text-danger  bg-dark float-left" style="font-size:20px">delete</i>
                                    <input type="submit" class="btn btn-sm m-0 p-0 text-dark bg-dark" value="">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

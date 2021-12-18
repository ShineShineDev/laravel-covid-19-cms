@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9 ">
        <!--Active cases-->
        @include('admin.situation.active.add-active-cases')
        <div class="login-box p-md-3 rounded-0 bg-dark">
            <button class="btn btn-sm btn-dark btn-at-white">Active cases <strong class="badge badge-danger badge-pill"> {{ $numbers }}</strong></button>
            <button class="btn btn-sm btn-dark btn-at-white" data-toggle="modal" data-target="#activeCases">
                <i class="material-icons text-white" style="font-size: 22px;">add_circle</i>
            </button>
            <button class="btn btn-sm text-white btn-at-white float-right active-close-btn">
                <span class="material-icons ">remove_circle</span>
            </button>
            <table class="table table-hover mt-2 text-white active-table">
                <thead class="transparent_bg">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($actives as $active)
                    <tr>
                        <td class="text-info">{{ $active->id }}</td>
                        <td>
                            <a class="text-info" href="{{ route('active.show',$active->id) }}">{{ $active->name }}</a>
                        </td>
                        <td class="text-info">{{ $active->age }}</td>
                        <td>
                            <a href="{{ route('active.edit',$active->id) }}">
                                <i class="material-icons float-left text-info" style="font-size: 18px;">edit</i>
                            </a>
                            &nbsp;|
                            <form class="d-inline m-0 p-0" method="post" action="{{ route('active.destroy',$active->id)  }}">
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

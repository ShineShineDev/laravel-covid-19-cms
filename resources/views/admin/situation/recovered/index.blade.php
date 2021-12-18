@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        <!--Recovered cases -->
        @include('admin.situation.recovered.add-recovered-cases')
        <div class="login-box p-md-3 rounded-0 bg-dark">
            <button class="btn btn-sm login-box text-white">Recovered cases &nbsp;&nbsp;<strong class="badge badge-danger badge-pill"> 20</strong></button>
            <button class="btn btn-sm login-box" data-toggle="modal" data-target="#recoveredCases">
                <i class="material-icons text-white"  style="font-size: 22px;">add</i>
            </button>
            <button class="btn btn-sm text-white btn-at-white float-right close">
                <span class="material-icons text-white close-recovered-table">remove_circle</span>
            </button>
            <table class="table mt-2 table-hover text-info recovered-table">
                <thead class="transparent_bg">
                <tr class="text-white">
                    <td>#</td>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($recovered as $lucky_patient)
                    <tr>
                        <td>1</td>
                        <td>
                            <a href="{{ route('recovered.show',$lucky_patient->id) }}" class="text-info">  {{ $lucky_patient->name }}</td>
                        </a>
                        <td>{{ $lucky_patient->age }}</td>
                        <td>
                            <a href="{{ route('recovered.edit',$lucky_patient->id) }}">
                                <i class="material-icons float-left text-info text-primary" style="font-size: 18px;">edit</i>
                            </a>
                            &nbsp;|
                            <form class="d-inline m-0 p-0" method="post" action="{{ route('recovered.destroy',$lucky_patient->id)  }}">
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


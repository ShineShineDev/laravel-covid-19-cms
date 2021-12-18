@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-8  offset-md-2 p-md-3 bg-dark btn-at-white">
                <h3 class="text-info border-bottom">Edit {{$patient->name}}</h3>
                <form method="post" action="{{ route('death.update',$patient->id) }}" enctype="multipart/form-data" class="text-info mt-3">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name* <small class="text-warning">required</small></label>
                        <input type="text" name="name" value="{{ $patient->name }}" class="form-control" placeholder="Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age*</label>
                        <input type="number" name="age" value="{{$patient->age}}" class="form-control" placeholder="Age" id="age">
                    </div>
                    <div class="form-group">
                        <label for="address">Address*</label>
                        <input type="text" name="address" value="{{$patient->address}}" class="form-control" placeholder="Address" id="address">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender*</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="infected">From Infected*</label>
                        <input list="browsers" class="form-control" name="infected" value="{{$patient->infected_id}}" id="infected" autocomplete="off">
                        <datalist id="browsers" autocapitalize="off">
                            <option value="0">Patient Zero</option>
                            @foreach($actives as $active)
                                <option value="{{$active->id}}">{{ $active->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="photo">
                            <span class="material-icons text-primary float-left">photo</span>
                            Maximum size 2M ,reduced size
                        </label>
                        <input type="file" name="photo" class="form-control" placeholder="Address" id="photo" style="display: none;">
                    </div>
                    <button type="button" class="btn btn-sm border text-info pl-3 pr-3 btn-at-white go-previous-page" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-sm border text-info pl-3 pr-3 btn-at-white" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection
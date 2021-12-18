@extends('layouts.admin-app')
@include('admin.navbar')
@section('content')
    <div class="col-md-9 m-0 p-0">
        <h4 class="text-info ml-3 mt-0 pt-0">All Users</h4>
       <div class="p-md-3">
           <div class="bg-dark login-box p-1 p-md-3">
               <table class="table text-info table-hover">
                   <thead class="transparent_bg text-white">
                   <tr>
                       <td>#</td>
                       <td>Name</td>
                       <td>Email</td>
                   </tr>
                   </thead>

                   <tbody>
                   @foreach($users as $key=> $user)
                       <tr>
                           <td>{{$key+1}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                       </tr>
                   @endforeach
                   </tbody>

               </table>
           </div>
       </div>
    </div>
@endsection

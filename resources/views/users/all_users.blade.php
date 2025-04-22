@extends('layouts.fe_layout')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<h3 class="mt-5">All Users</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($usersFromDB as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @auth
                @if(Auth::user()->email == 'admin@gmail.com')
                    <td> <a href="{{route('usersView', $user->id )}}" class="btn btn-info">View/Edit</a> </td>
                    <td><a href="{{route('deleteUser', $user->id )}}" class="btn btn-danger">Delete</a></td>
                @endif
            @endauth
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
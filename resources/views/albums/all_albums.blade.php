@extends('layouts.fe_layout')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<h3 class="mt-5">All Albums</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Band</th>
            <th scope="col">Album's Name</th>
            <th scope="col">Release date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($allAlbums as $albums)
        <tr>
            <th scope="row">{{$albums->id}}</th>
            <td>
                <img
                    style="width: 40px; height:40px;"
                    src="{{ $albums->photo ? asset('storage/' . $albums->photo) : asset('images/no_photo.jpg') }}"
                    alt="{{ $albums->name }}"
                >
            </td>
            <td>{{$albums->band_name}}</td>
            <td>{{$albums->name}}</td>
            <td>{{$albums->releaseDate}}</td>

            @auth
            @if(Auth::user()->email == 'userAuth@gmail.com')
            <td><a href="{{route('albumsView', $albums->id )}}" class="btn btn-info">View/Edit</a></td>
            @endif
            @if(Auth::user()->email == 'admin@gmail.com')
            <td><a href="{{route('albumsView', $albums->id )}}" class="btn btn-info">View/Edit</a></td>
            <td><a href="{{route('deleteAlbum', $albums->id )}}" class="btn btn-danger">Delete</a></td>
            @endif
        @endauth

        </tr>
        @endforeach

    </tbody>
</table>

@endsection

@extends('layouts.fe_layout')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<h3 class="mt-5">All Bands</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Albums</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($allBands as $bands)
        <tr>
            <th scope="row">{{$bands->id}}</th>
            <td>
                <img
                    style="width: 40px; height:40px;"
                    src="{{ $bands->photo ? asset('storage/' . $bands->photo) : asset('images/no_photo.jpg') }}"
                    alt="{{ $bands->name }}"
                >
            </td>
            <td>{{$bands->name}}</td>
            <td>{{$bands->albums}}</td>

            @auth
                @if(Auth::user()->email == 'userAuth@gmail.com')
                <td><a href="{{ route('bands.albums', $bands->id) }}" class="btn btn-info">View Albums</a></td>
                <td><a href="{{route('bandsView', $bands->id )}}" class="btn btn-info">View/Edit</a></td>
                @endif
                @if(Auth::user()->email == 'admin@gmail.com')
                <td><a href="{{ route('bands.albums', $bands->id) }}" class="btn btn-info">View Albums</a></td>
                <td><a href="{{route('bandsView', $bands->id )}}" class="btn btn-info">View/Edit</a></td>
                <td><a href="{{route('deleteBand', $bands->id )}}" class="btn btn-danger">Delete</a></td>
                @endif

            @endauth

        </tr>
        @endforeach

    </tbody>
</table>

@endsection
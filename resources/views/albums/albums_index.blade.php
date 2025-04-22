@extends('layouts.fe_layout')

@section('content')

<h2 class="mt-5 mx-5">Albums of {{ $band->name }}</h2>

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
            @foreach ($albums as $albums)
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

            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@extends('layouts.fe_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success">
        {{session('message')}}
</div>
@endif

    <h1 class="mt-5 mb-5">Hello! Here you can add bands</h1>

<form method="POST" action="{{ route('bands.create') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-2 mt-2">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" accept="image/*" name="photo" id="photo" class="form-control">
            @error('photo')
            Please enter a correct photo.
            @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Band's name</label>
        <input required name="name" type="text" class="form-control" id="name">
            @error('name')
            Please enter a correct band name.
            @enderror
    </div>

    <div class="mb-3">
        <label for="albums" class="form-label">Albums</label>
        <input required name="albums" type="text" class="form-control" id="albums">
            @error('albums')
            Please enter a correct number of albums.
            @enderror
    </div>

    <button type="submit" class="btn btn-primary">Insert</button>
</form>
@endsection

@extends('layouts.fe_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success">
        {{session('message')}}
</div>
@endif

    <h1 class="mt-5 mb-5">Hello! Here you can add albums</h1>

<form method="POST" action="{{ route('albums.create') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-2 mt-2">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" accept="image/*" name="photo" id="photo" class="form-control">
            @error('photp')
            Please enter a correct photo.
            @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Album's name</label>
        <input required name="name" type="text" class="form-control" id="name">
            @error('name')
            Please enter a correct album name.
            @enderror
    </div>

    <div class="mb-3">
        <label>Band</label>
        <select name="band" required>
            @foreach($bands as $band)
                <option value="{{ $band->name }}">{{ $band->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="releaseDate" class="form-label">Release Date</label>
        <input required name="releaseDate" type="text" class="form-control" id="releaseDate">
            @error('releaseDate')
            Please enter a correct release date.
            @enderror
    </div>

    <button type="submit" class="btn btn-primary">Insert</button>
</form>
@endsection

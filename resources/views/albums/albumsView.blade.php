@extends('layouts.fe_layout')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5>Album Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updateAlbum') }}" enctype="multipart/form-data" class="my-2">
        @csrf
        <input type="hidden" name="id" value="{{$ourAlbum->id}}">

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input required name="name" type="text" class="form-control" value="{{ $ourAlbum->name }}"
                aria-describedby="emailHelp">
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
            <input required name="releaseDate" type="text" class="form-control" value="{{ $ourAlbum->releaseDate }}">
                @error('releaseDate')
                 Please enter a correct release date.
                @enderror
        </div>

                @if($ourAlbum->photo)
                    <img src="{{ asset('storage/'.$ourAlbum->photo) }}" alt="{{ $ourAlbum->name }}" class="img-fluid mt-3" style="max-width: 300px;">
                @else
                    <p>No photo available</p>
                @endif
                <div class="mb-2 mt-2">
                    <input type="file" name="photo" id="">
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>



@endsection
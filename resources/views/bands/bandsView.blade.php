@extends('layouts.fe_layout')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5>Band Details</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updateBand') }}" enctype="multipart/form-data" class="my-2">
        @csrf
        <input type="hidden" name="id" value="{{$ourBand->id}}">

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input required name="name" type="text" class="form-control" value="{{ $ourBand->name }}"
                aria-describedby="emailHelp">
                @error('name')
                Please enter a correct band name.
                @enderror
        </div>
        <div class="mb-3">
            <label for="albums" class="form-label">Albums</label>
            <input required name="albums" type="number" class="form-control" value="{{ $ourBand->albums }}">
                @error('albums')
                 Please enter a correct number of albums.
                @enderror
        </div>

                @if($ourBand->photo)
                <img style="width: 40px; height:40px" src="{{ $ourBand->photo ? asset('storage/' . $ourBand->photo) : asset('images/no_photo.jpg') }}"alt="band_photo">
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
@extends('layouts.fe_layout')

@section('content')

<h1 class="mt-5 mb-5">Hello! Here you can add users</h1>

<form method="POST" action="{{ route('users.create') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
            @error('name')
            Please enter a correct name.
            @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input name="email" required type="email" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
            @error('email')
            Please enter a correct email.
            @enderror
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
            Please enter a correct password.
            @enderror
    </div>

    <button type="submit" class="btn btn-primary">Insert</button>
</form>


  @endsection

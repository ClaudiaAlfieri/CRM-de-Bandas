@extends('layouts.fe_layout')

@section('content')
    <!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bem-vindo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <div class="jumbotron text-center">
                <h1>
                    Hello
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Guest
                    @endauth
                    welcome to our system
                </h1>
                <p class="lead">Here you can</p>
                <hr class="my-4">

                <div class="d-flex justify-content-center">
                    @auth
                     <!-- Botões visíveis para admin -->
                        @if(Auth::user()->email == 'admin@gmail.com')
                            <a href="{{ route('add_users') }}" class="btn btn-primary me-2">Add Users</a>
                            <a href="{{ route('add_albums') }}" class="btn btn-primary me-2">Add Albums</a>
                            <a href="{{ route('add_bands') }}" class="btn btn-primary me-2">Add Bands</a>
                            <a href="{{ route('bands') }}" class="btn btn-primary me-2">View/Edit Bands</a>
                            <a href="{{ route('albums') }}" class="btn btn-primary me-2">View/Edit Albums</a>
                             <!-- Botões visíveis para users autenticados -->
                        @elseif(Auth::user()->email == 'userAuth@gmail.com')
                            <a href="{{ route('bands') }}" class="btn btn-primary me-2">View/Edit Bands</a>
                            <a href="{{ route('albums') }}" class="btn btn-primary me-2">View/Edit Albums</a>
                        @endif
                    @endauth
                    <!-- Botões visíveis para guests -->
                    @guest
                        <a href="{{ route('bands') }}" class="btn btn-primary me-2">View Bands</a>
                        <a href="{{ route('albums') }}" class="btn btn-primary me-2">View Albums</a>
                    @endguest
                </div>

            </div>
        </div>
    </body>
    </html>
@endsection

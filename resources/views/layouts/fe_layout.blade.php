<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users')}}">All Users</a>
                    </li>
                    @auth
                        @if(Auth::user()->email == 'admin@gmail.com')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add_users')}}">Add Users</a>
                            </li>
                         @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('bands')}}">All Bands</a>
                    </li>
                    @auth
                        @if(Auth::user()->email == 'admin@gmail.com')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add_bands')}}">Add Bands</a>
                            </li>
                         @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('albums')}}">All Albums</a>
                    </li>
                    @auth
                        @if(Auth::user()->email == 'admin@gmail.com')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add_albums')}}">Add Albums</a>
                            </li>
                         @endif
                    @endauth
                </ul>
            </div>
        </div>

        @if (Route::has('login'))
            <nav class="mx-4 flex flex-1 justify-end">
                 @auth

                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-1 mx-3">Logout</button>
                </form>

                        @else
                             <a
                                href="{{ route('login') }}"
                                class="mx-4 my-2 btn btn-primary text-nowrap"
                            >
                             Log in
                            </a>

                             @if (Route::has('users.add'))
                                <a
                                href="{{ route('users.add') }}"
                                    class="btn btn-primary mt-1"
                                >
                                 Register
                             </a>
                         @endif
                 @endauth
             </nav>
        @endif
    </nav>

<div class="container">


      @yield('content')

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

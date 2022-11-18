<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content={{ $description ?? '' }}>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <h1 class="title"><a class="navbar-brand" href="{{url('/')}}">{{ config('app.name') }}</a></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/students') }}">Student</a>
                </li>
                @guest <!--Cas ou l'utilisateur n'est pas connecté-->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Inscription</a>
                </li>
                @endguest

                @auth <!--Cas ou l'utilisateur est connecté-->

                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.create')}}">Ajouter un utilisateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Deconnexion</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
<!-- /.container -->

<!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>

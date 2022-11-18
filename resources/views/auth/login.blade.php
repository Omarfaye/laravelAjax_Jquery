@extends('layouts.main')

@section('content')
    <div class="row">

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <!-- /.card -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Connexion
                <div class="card-body">
            
                    <form action="{{route('post.login')}}" method="post">

                        @csrf <!--permet d'eviter les Files de securite-->

                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control" value="{{ old('login') }}">
                            @error('login')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </form></br>
                    <p><a href="">J'ai oublié mon mot de passe</a></p>
            
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
@stop
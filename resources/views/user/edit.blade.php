@extends('layouts.main')

@section('content')
    <div class="row">

        <!--<div class="col-lg-3">
            @//include('includes.sidebar')
        </div>-->
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <!-- /.card -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Modifier {{$user->name}}
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', ['user'=>$user->id])}}" method="post"> 

                        @method('PUT')

                        @csrf <!--permet d'eviter les Files de securite-->

                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $user->prenom) }}">
                            @error('prenom')
                             <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom', $user->nom) }}">
                            @error('nom')
                             <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control" value="{{ old('login', $user->login) }}">
                            @error('login')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password', $user->password) }}">
                            @error('password')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form></div>
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

    </div>
@stop
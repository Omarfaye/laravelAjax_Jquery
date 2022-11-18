@extends('layouts.main')

@section('content')
    <div class="row">


        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <!-- /.card -->
        
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Inscription
                </div>
                <div class="card-body">
                
                    <form action="{{route('post.register')}}" method="post">
                        @csrf 

                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
                            @error('prenom')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                            @error('nom')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

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

                        <button type="submit" class="btn btn-primary">Inscription</button>
                    </form>
                </div>
            
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

    </div>
@stop
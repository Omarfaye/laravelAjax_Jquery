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
                            <label for="title">Nom</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                             <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="context">Description</label>
                            <textarea class="form-control" name="description" cols="30", rows="5" placeholder="description">{{ old('description', $user->description) }}</textarea>
                            @error('description')
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
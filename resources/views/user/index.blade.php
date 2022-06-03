@extends('layouts.main')

@section('content')
    <div class="row">

        <!-- <div class="col-lg-3">
             @//include('layouts.sidebar')
         </div>-->
        <!-- /.col-lg-3 -->

        <div class="col-lg-9"> &nbsp;
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            {{-- début du post --}}

            <table class="table">
        
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)  
                            <tr>
                            <th scope="row">#</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->description}}</td>
                            <td></td>
                            <td>
                            <div class="auhtor" style="display: flex">
                                <p><a href="{{route('users.edit', ['user'=>$user->id])}}" class="btn btn-primary">Modifier</a></p>
                                <form action="{{route('users.destroy', ['user'=>$user->id])}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                <p><a href="{{route('users.show', ['user'=>$user->id])}}" class="btn btn-warning">Detail</a></p>
                            </div>
                            </td>
                        </tr>
                        @endforeach      
                        </tbody>
    
                </table>


            {{-- fin du post --}}

            <!--Pagination-->
            <div class="pagination mt-4">
                {{ $users->links() }}
            </div>

        </div>
        <!-- /.col-lg-9 -->
    </div>
@stop
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        $data= [
            'title' =>'Inscription - '.config('app.name'),
            'description' => 'Inscription sur le site ' .config('app.name'),
        ];
        return view('auth.register', $data);
    }

    public function register(){
        request()->validate([
            'prenom' =>'required|min:3|max:20',
            'nom' =>'required|min:2|max:20',
            'login'=>'required|min:3|max:20|unique:users',
            'password'=>'required|between:5,20',
        ]);

        $user = new User();
        $user->prenom = request('prenom');
        $user->nom = request('nom');
        $user->login = request('login');
        $user->password = bcrypt(request('password'));

        $user->save();

        $success = 'Inscription Terminer.';
        return back()->withSuccess($success);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   public function __construct(){
      $this->middleware('guest');
  }
    public function index() //formulaire de connexion
    {
        $data = [
            'title' => 'Login - '.config('app.name'),
            'description' => 'Connexion à votre compte - '.config('app.name'),
        ];
        return view('auth.login', $data);
    }

    public function login() //traitement de connexion
     {
        request()->validate([
           'login' => 'required',
           'password'=>'required'
        ]);
         $remember = request()->has('remember');
        // dd($remember);
        if(Auth::attempt(['login'=>request('login'), 'password'=>request('password')], $remember)) {
           return redirect('/');
        }
        return back()->withError('Mauvais identifiants.')->withInput();
     }
   }    

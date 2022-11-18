<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view ('user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  //  public function store(UserRequest $request)
   public function store()
    {
        //Reuperer les données d'entrées  valides
       // $validData = $request->validated();
      //  Auth::User()->create($validData);
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

        $success = 'Utilisateur Ajouter';
        return back()->withSuccess($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user){
            $user->update([
               'prenom'=>$request->input('prenom'),
               'nom'=>$request->input('nom'),
               'login'=>$request->input('login'),
               'password'=>bcrypt($request->input('password'))
            ]);
        }
        $success = 'Utilisateur Modifier';
        return redirect()->route('users.edit', ['user'=>$user->id])->withSuccess($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }

        $success = 'Utilisateur Supprimer';
        return back()->withSuccess($success);

    }
}

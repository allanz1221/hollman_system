<?php

namespace App\Http\Controllers;

//use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\User;
use App\Rol;
use App\Empresa;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }

    public function index()
    {
        //
        $users = User::with('rol')->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::pluck('id', 'nombre');
        $user = new User();
        return view('dashboard.users.create', compact('empresas', 'user'));
        //return view('dashboard.users.create', ['user' => new User()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        $usuarios = User::all()->count();
        if($usuarios == 0){
            $rol1 = Rol::create(
                [
                    'name' => 'admin'
                ]
            );
            $rol2 = Rol::create(
                [
                    'name' => 'regular'
                ]
            );
            $rol = 1;  //rol de admin
        } else {
            $rol = 2;
        }
        $user = User::create(
            [
                'name' => $request['name'],
                'rol_id' => $rol,
                'email' => $request['email'],
                'empresa_id' => $request['empresa_id'],
                'password' => Hash::make($request['password']),
            ]
        );
        //event(new UserCreated($user));

        return back()->with('status', 'Usuario creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 
        return view('dashboard.users.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $this->authorize('edit', $user);
     
        $empresas = Empresa::pluck('id', 'nombre');
        return view('dashboard.users.edit', compact('user', 'empresas'));
        //return view('dashboard.users.edit', ["user" => $user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        // $this->authorize('edit', $user);
        $user->update(
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'empresa_id' => $request['empresa_id'],
            ]
        );
        return back()->with('status', 'Usuario actualizado con exito');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'Usuario eliminado con exito');
        //
    }
}

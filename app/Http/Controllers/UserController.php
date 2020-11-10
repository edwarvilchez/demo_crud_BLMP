<?php

namespace App\Http\Controllers;

use App\User;# invocamos el archivo para usar la tabla user y los comandos SQL

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

	# listamos todos los usuarios
    public function index(){
    	$users = User::latest()->get();
    	# retornamos los registros en la vista
    	return view('users.index', [
    		'users' => $users
    	]);
    }

    # almacenamos los registros
    public function store(Request $request){

        // agregamos el método validate de Laravel
        /*
            donde name, email, password son obligatorios
            donde el email debe ser tipo email y único
            donde password tendrá minimo 8 caracteres
        */
        $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8']
        ]);
    	User::create([
    		'name' 		=> $request->name,
    		'email' 	=> $request->email,
    		'password' 	=> bcrypt($request->password)
    	]);

    	# retormanos a la vista
    	return back();
    }

    # borramos el usuario
    public function destroy(User $user){
    	$user->delete();

    	# retornamos a la vista
    	return back();
    }
}

<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function person(){
        $person = User::all();
        return response()->json($person, 202);
    }

    public function getMessage()
    {     

         $user=User::create ([
            'name' => 'Andres',
            'last_name' => 'Marcano',
            'email' => 'MarcaA12@gmail.com',
            'telefono' => '04140259632',
            'password' => Hash::make('password'),
        ]);
        /*
        $vr='last name';
        $user=User::find(7);
        $user->$vr='Alas';
        $user->save();
        */

        // $user =User::where('last name','Alas')->get(); //get para buscar todos los registros con ese apellido

        /*crear usuario
         $user=User::create ([
            'name' => 'Carlos Eduardo',
            'email' => 'Eduardo1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        /*
        para actualizar
        ubicamos a la victma
        $user=User::find(2);
        $user->name='Wilmarys Milagros';
        $user->email='Wilm27@gmail.com';
        
        $user->save(); //guardamos cambios

        */

        /* buscar parametro especifico
        $user =User::where('name','Asiel')->first(); //solo sale el primer resultado con first
        la busqueda es muy especifica
        */
       
        // $user =User::where('last_name','Alas')->first(); //solo sale el primer resultado con first

        //buscar por id
        // $user = User::find(1);

        /*
        'user'=>is_null($user) ? 'El usuario no existe' : $user
        'user'=>!is_null($user) ? 'El usuario si existe' : $user
        */
        return response()->json([
            'message' => 'Usuario creado correctamente',
            'usuario' => $user,
        ], 201);
    }  
};

/*
public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => Hash::make('required|min:6'),
        ]);

        $rvt = 

        $user=User::created([
            'name' => $request->name,
            'name' => $request->last_name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message'=>'Usuario Creado con exito', 'user' => $user], 202);
    }:
*/

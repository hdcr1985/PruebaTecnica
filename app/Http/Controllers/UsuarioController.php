<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){

        $usuario = Usuario::all();
        return view('usuarios',['usuario' => $usuario]);
    }
    public function store(Request $request){

        //return $request->all();

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero = $request->genero;

        if ($usuario->save()){
            return 'success';
        }else{
            return 'error';
        }

        
    }
}

<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Habitacione;
use App\Reservacione;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
{

    public function index(){
        $usuario = Usuario::all();
        $reservaciones = Reservacione::all();
        $habitacione = Habitacione::all(); 

        $result = Reservacione::join('usuarios', 'usuarios.id',   '=', 'reservaciones.id_usuario') 
        ->join('habitaciones', 'habitaciones.id', '=', 'reservaciones.id_h') 
        ->select('*') 
        ->get();

        return view('reservaciones',['usuario' => $usuario, 'habitacione' => $habitacione, 'reservaciones' => $reservaciones, 'result' => $result]);
    }
    public function store(Request $request){

        $query = Reservacione::where('disponibilidad', $request->fecha)->first();    

        if ($query === NULL){

            $reservaciones = new Reservacione();
            $reservaciones->id_usuario = $request->usuario;
            $reservaciones->id_h = $request->habitacion;
            $reservaciones->disponibilidad = $request->fecha;

            if ($reservaciones->save()){
                return 'success';
            }else{
                return 'error';
            }
        }else{
            return 'reserved';
        }
        
    }

}

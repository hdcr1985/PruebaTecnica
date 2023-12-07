<?php

namespace App\Http\Controllers;

use App\Habitacione;
use Illuminate\Http\Request;

class HabitacionesController extends Controller
{


    public function index(){
        $habitacione = Habitacione::all();
        return view('habitaciones',['habitacione' => $habitacione]);
    }

    public function store(Request $request){

        //return $request->all();

        $habitacion = new Habitacione();
        $habitacion->nro_h = $request->nro;
        $habitacion->nombre_h = $request->nombre;
        $habitacion->precio_h = $request->precio;

        if ($habitacion->save()){
            return 'success';
        }else{
            return 'error';
        }

        
    }


}

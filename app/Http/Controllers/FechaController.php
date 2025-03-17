<?php

namespace App\Http\Controllers;
use App\Models\Day;
use App\Models\Hour;

use Illuminate\Http\Request;

class FechaController extends Controller
{

    public function fechas(){
        $consultas = Day::with(['hora'])->get();
    
        return response()->json($consultas);
    }

    public function horas(){
        $consultas = Hour::All();
    
        return response()->json($consultas);
    }
}

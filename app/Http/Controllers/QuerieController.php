<?php

namespace App\Http\Controllers;
use App\Models\Querie;
use Illuminate\Http\Request;


class QuerieController extends Controller
{

public function obtenerConsultas()
{
    $consultas = Querie::with(['cliente', 'doctor', 'consulta', 'fecha', 'hora', 'estado'])->get();

    return response()->json($consultas);
}

}

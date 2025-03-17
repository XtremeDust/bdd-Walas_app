<?php

namespace App\Http\Controllers;
use App\Models\Querie;
use Illuminate\Http\Request;


class QuerieController extends Controller
{

public function obtenerConsultas()
{
    $consultas = Querie::with(['cliente.user', 'doctor.user', 'consulta', 'fecha', 'fecha.hora', 'estado'])->get();

    return response()->json($consultas);
}

}

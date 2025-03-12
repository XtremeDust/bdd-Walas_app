<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Day;
use App\Models\Doctor;
use App\Models\Hour;
use App\Models\Querie;
use App\Models\Type;
use App\Models\Statu;

class RegisterController extends Controller
{
    public function customer(){
        $customer = Customer::with('consulta')->get();
        return response()->json($customer);
    }

    public function doctor(){
        $doc = Doctor::with('consulta')->get();
        return response()->json($doc);
    }
    
    public function fecha(){
     
            $fecha = Day::with('consulta')->get();
            return response()->json($fecha); // 200 significa respuesta exitosa
        
    }
    public function hora(){
      
            $hora = Hour::with('consulta')->get();
            return response()->json($hora); // 200 significa respuesta exitosa
       
    }

    public function index()
    {
        $queries = Querie::with(['doctorUser', 'customerUser'])->get();
        return response()->json($queries);
    }

    public function consulta(){
      
            $cita = Querie::with('consulta')->get();
            return response()->json($cita); // 200 significa respuesta exitosa
       
    }

    public function tipo(){
       
            $tipo = Type::with('consulta')->get();
            return response()->json($tipo); // 200 significa respuesta exitosa
       

    }

    public function estado(){
        
            $estado = Statu::with('consulta')->get();
            return response()->json($estado); // 200 significa respuesta exitosa
        

    }
}

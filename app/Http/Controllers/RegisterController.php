<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Day;
use App\Models\Doctor;
use App\Models\Hour;
use App\Models\Querie;
use App\Models\User;
use App\Models\Type;
use App\Models\Statu;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{    
    public function registerUser(Request $request)
    {
        try {
            $validate = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'telefono' => 'required|string|max:255',
                'servicio' => 'required|string',
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i:s',
            ]);
    
            // Lógica de creación...
            $user = User::create([
                'name' => $validate['nombre'],
                'last_name' => $validate['apellido'],
                'email' => $validate['email'],
                'telefono' => $validate['telefono'],
                'password' => Hash::make('password'),
            ]);
    
            $customer = Customer::create([
                'fk_user_id' => $user->id,
            ]);
    
            $day = Day::firstOrCreate([
                'day' => $validate['fecha'],
            ]);
    
            $hour = Hour::firstOrCreate([
                'hour' => $validate['hora'],
            ]);
    
            $type = Type::where('servicio', $validate['servicio'])->first();
            if (!$type) {
                return response()->json(['error' => 'Servicio no válido'], 400);
            }
    
            $doctor = $this->asignarDoctor($type->id);
    
            $status = Statu::firstOrCreate([
                'Estado' => 'Reservado',
            ]);
    
            $query = Querie::create([
                'Cliente' => $customer->id_customer,
                'Consulta' => $type->id,
                'Doctor' => $doctor ? $doctor->id_doctor : null,
                'Fecha' => $day->id,
                'Estado_fk' => $status->id,
                'Precio' => $type->precio_actual,
            ]);
    
            return response()->json([
                'message' => 'Reserva creada correctamente',
                'usuario' => $user,
                'cliente' => $customer,
                'consulta' => $query,
            ], 201);
    
        } catch (\Exception $e) {
           
            return response()->json([
                'error' => 'Error interno en el servidor',
                'detalle' => $e->getMessage(),
            ], 500);
        }
    }
    

    private function asignarDoctor($tipoServicioId)
    {
        switch ($tipoServicioId) {
            case 2:
                return Doctor::where('especialidad', 'like', '%Odontologia%')->first();
            case 3:
                return Doctor::where('especialidad', 'like', '%Estetica%')->first();
            default:
                throw new \Exception("No hay doctores disponibles para el servicio solicitado");
        }
    }
    
}


    /*
    public function customer(){
        $customer = Customer::with('cliente.user')->get();
        return response()->json($customer);
    }

    public function doctor(){
        $doc = Doctor::with('consulta.user')->get();
        return response()->json($doc);
    }
    
    public function fecha(){
     
            $fecha = Day::with('consulta')->get();
            return response()->json($fecha); // 200 significa respuesta exitosa
        
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
    */

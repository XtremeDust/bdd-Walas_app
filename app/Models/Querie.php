<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Querie extends Model
{
    
    
        protected $table = 'queries';
    
        // Relación con el cliente
        public function cliente()
        {
            return $this->belongsTo(Customer::class, 'Cliente', 'id_customer'); // FK en queries, PK en customers
        }
    
        // Relación con el doctor
        public function doctor()
        {
            return $this->belongsTo(Doctor::class, 'Doctor', 'id_doctor'); // FK en queries, PK en doctors
        }
    
        // Relación con el tipo de consulta
        public function consulta()
        {
            return $this->belongsTo(Type::class, 'Consulta', 'id'); // FK en queries, PK en Type_queries
        }
    
        // Relación con la fecha (día)
        public function fecha()
        {
            return $this->belongsTo(Day::class, 'Fecha', 'id'); // FK en queries, PK en day
        }
    
        // Relación con la hora
        public function hora()
        {
            return $this->belongsTo(Hour::class, 'Hora', 'id'); // FK en queries, PK en hours
        }
    
        // Relación con el estado
        public function estado()
        {
            return $this->belongsTo(Statu::class, 'Estado_fk', 'id'); // FK en queries, PK en status
        }
    }
    



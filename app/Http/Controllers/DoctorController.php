<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function doctor(){
        $doctores = Doctor::with('user')->get();
        return response()->json($doctores);
    }
}

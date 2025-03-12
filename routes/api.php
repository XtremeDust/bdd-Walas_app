<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\QuerieController;
use App\Models\Querie;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Type;


Route::get('/message', [UserController::class, 'getMessage']);
Route::get('/person', [UserController::class, 'person']);
Route::get('/doctor', [DoctorController::class, 'doctor']);
Route::get('/customer', [CustomerController::class, 'customer']);


Route::get('/hora', [RegisterController::class, 'hora']);
Route::get('/fecha', [RegisterController::class, 'fecha']);
Route::get('/tipo', [RegisterController::class, 'tipo']);
//Route::get('/consulta', [RegisterController::class, 'consulta']);

//Route::get('/consulta', [RegisterController::class, 'consulta']);
Route::get('/estado', [RegisterController::class, 'estado']);

Route::get('/queries', [QuerieController::class, 'obtenerConsultas']);


Route::get('/consulta', function () {
    $consulta=Querie::get();
    return response()->json($consulta);
});






Route::get('/user', function () {
    $users=User::get();
    return response()->json($users);
});//->middleware('auth:sanctum');


/*
Route::get('/user', function (Request $request) {
    return $request->user();
});
*/


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alumnosController;
use App\Http\Controllers\profesoresController;
use App\Http\Controllers\materiasController;
use App\Http\Controllers\asistenciaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',function(Request $request){

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $arr = array('acceso' => "OK", 'error' => "", 'token' =>$user->createToken('MyApp')->accessToken);
        return json_encode($arr);
    }
    else{
        $arr = array('acceso' => "", 'error' => "No existe el usuario o contraseña", 'token' => "");
        
        return json_encode($arr);

        
    }
});


Route::post('alumno/guardar', [alumnosController::class,'guardar']);
Route::post('alumno/delete', [alumnosController::class,'eliminar']);
Route::get('alumnos',[alumnosController::class,'lista']);

Route::post('profesor/guardar', [profesoresController::class,'guardar']);
Route::post('profesor/delete', [profesoresController::class,'eliminar']);
Route::get('profesor',[profesoresController::class,'lista']);

Route::post('materias/guardar', [materiasController::class,'guardar']);
Route::post('materias/delete', [materiasController::class,'eliminar']);
Route::get('materias',[materiasController::class,'lista']);

Route::get('asistencia/{id_materia}', [asistenciaController::class,'alumnos']);
Route::post('asistencia/guardar', [asistenciaController::class,'guardar']);


//->middleware('auth:api'); para pedir la autenticacion al hacer el crud
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_materias;

class materiasController extends Controller
{
    public function guardar(Request $request){

        if($request->id > 0){
            $materias = m_materias::find($request->id);
        }else{
            $materias = new m_materias();
        }

        $materias->nombre = $request->nombre;
        $materias->horas_semana = $request->horas_semana;
        $materias->division = $request->division;

        $materias->save();

        return $materias;
    }

    public function eliminar(Request $request){
        $materias = m_materias::find($request->id);
        $materias->delete();
        return "materia eliminada";
    }
    public function lista(Request $request){
        $materias = m_materias::all();
        return $materias;

    }
}

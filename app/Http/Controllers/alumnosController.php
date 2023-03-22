<?php

namespace App\Http\Controllers;

use App\Models\m_alumnos;
use Illuminate\Http\Request;

class alumnosController extends Controller
{
    public function guardar(Request $request){

        if($request->id > 0){
            $alumno = m_alumnos::find($request->id);
        }else{
            $alumno = new m_alumnos();
        }

        $alumno->nombre = $request->nombre;
        $alumno->app = $request->app;
        $alumno->apm = $request->apm;
        $alumno->matricula = $request->matricula;
        $alumno->carrera = $request->carrera;
        $alumno->edad = $request->edad;

        $alumno->id_materia = $request->id_materia;

        $alumno->save();

        return $alumno;
    }

    public function eliminar(Request $request){
        $alumno = m_alumnos::find($request->id);
        $alumno->delete();
        return "alumno eliminado";
    }
    public function lista(Request $request){
        $alumnos = m_alumnos::all();
        return $alumnos;

    }
}

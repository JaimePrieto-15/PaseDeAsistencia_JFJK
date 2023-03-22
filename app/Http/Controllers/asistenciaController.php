<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_alumnos;
use App\Models\m_materias;
use App\Models\m_profesores;
use App\Models\m_asistencia;

class asistenciaController extends Controller
{
    public function alumnos($id_materia){
        $alumnos = $alumnos = m_alumnos::where('id_materia', '=', $id_materia)->get();

        return $alumnos;
    }
    public function guardar(Request $request){
        $asistencia = new m_asistencia();

        $asistencia->id_alumno = $request->id_alumno;
        $asistencia->id_materia = $request->id_materia;
        $asistencia->id_profesor = $request->id_profesor;
        $asistencia->asistio = $request->asistio;
        $asistencia->fecha_hora = now();

        $asistencia->save();

        return $asistencia;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_profesores;

class profesoresController extends Controller
{
    public function guardar(Request $request){

        if($request->id > 0){
            $profesor = m_profesores::find($request->id);
        }else{
            $profesor = new m_profesores();
        }

        $profesor->nombre = $request->nombre;
        $profesor->app = $request->app;
        $profesor->apm = $request->apm;
        $profesor->grado_estudio = $request->grado_estudio;

        $profesor->id_materia = $request->id_materia;

        $profesor->save();

        return $profesor;
    }

    public function eliminar(Request $request){
        $profesor = m_profesores::find($request->id);
        $profesor->delete();
        return "profesor eliminado";
    }
    public function lista(Request $request){
        $profesor = m_profesores::all();
        return $profesor;

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addPeticionAsesoriaController extends Controller
{
    /**
    * Agrega una peticion de asesoria del un alumno.
    * 
    * @param  int  $idAlumno
    * @param  string  $nomMateria
    * @param  string  $nomProfesor
    * 
    * @return Response
    *
    **/
    public function add(Request $request){
        if( !$request->has('idAlumno') || !$request->has('nomMateria') || !$request->has('nomProfesor')){
            return json_encode(array("error" => "datos faltantes"));
        }

        

        return json_encode(array("error" => ""));;
    }
}

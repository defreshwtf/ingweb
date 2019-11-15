<?php

namespace App\Http\Controllers;

use Auth;

use App\Materia;
use App\Profesor;
use App\User;
use App\Peticion;

use Illuminate\Http\Request;

class PeticionAsesoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->profesor;
        
        if(is_null($user)){
            $user = Auth::user()->alumno;
            // $peticions = Peticion::where("idAlumno",$user->id)->get();
            $peticions = $user->peticions;
            $info = [];
            foreach($peticions as $peticion){
                $infoTemp = [];
                $infoTemp["idPeticion"] = $peticion->id;
                // 
                // corregir
                // 
                // $infoTemp["materia"] = Materia::where("idMateria", $peticion->idMateria)->first();
                $infoTemp["materia"] = $peticion->materia->nombre;
                $infoTemp["profesor"] = $peticion->profesor->user->name;
                $infoTemp["estado"] = $peticion->estado;
                $infoTemp["tema"] = $peticion->tema;
                array_push($info, $infoTemp);
            }
        } else {
            // $peticions = Peticion::where("idProfesor",$user->id)->get();
            $info = [];
        }

        return response()->json($info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camposFaltantes = [];
        $error = false;
        if (!$request->has('idAlumno')) {
            array_push($camposFaltantes, "idAlumno");
            $error = true;
        }
        if (!$request->has('nomMateria')) {
            array_push($camposFaltantes, "nomMateria");
            $error = true;
        }
        if (!$request->has('nomProfesor')) {
            array_push($camposFaltantes, "nomProfesor");
            $error = true;
        }
        if ($error) {
            return response()->json(["error" => "campos faltantes", "campos" => $camposFaltantes], 500);
        }

        
        $nomMateria = $request->nomMateria;
        $nomProfesor = $request->nomProfesor;
        $tema = $request->tema;
        
        $materia = Materia::where("nombre", $nomMateria)->first();
        $profesor = User::where("name", $nomProfesor)->first()->profesor;
        $alumno = Auth::user()->alumno;
        
        $peticion = Peticion::create([
            "tema" => $tema,
            "idMateria" => $materia->id,
            "idProfesor" => $profesor->id,
            "idAlumno" => $alumno->id,
        ]);
        $peticion->materia()->associate($materia);
        $peticion->profesor()->associate($profesor);
        $peticion->alumno()->associate($alumno);

        return response()->json(["sucess" => true, "idPeticion" => $peticion->id, "estado" => "pendiente"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}

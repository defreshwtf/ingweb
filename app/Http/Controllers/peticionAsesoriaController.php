<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Materia;
use App\Profesor;
use App\Alumno;
use App\User;
use App\Asesoria;

class PeticionAsesoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if( !$request->has('idAlumno')){
            array_push($camposFaltantes, "idAlumno");
            $error = true;
        }
        if(!$request->has('nomMateria')){
            array_push($camposFaltantes, "nomMateria");
            $error = true;
        }
        if(!$request->has('nomProfesor')){
            array_push($camposFaltantes, "nomProfesor");
            $error = true;
        }
        if($error){
            return response()->json(["error" => "campos faltantes", "campos" => $camposFaltantes], 500);
        }

        $idAlumno = $request->idAlumno;
        $nomMateria = $request->nomMateria;
        $nomProfesor = $request->nomProfesor;

        $idMateria = Materia::where("nombre", $nomMateria)->value("id");
        $idProfesor = User::where("name", $nomProfesor)->first()->profesor()->value("id");

        $asesoria = Asesoria::create([
            "idMateria" => $idMateria,
            "idProfesor" => $idProfesor,
        ]);

        $asesoria->alumnos()->attach($idAlumno);

        return response()->json(["sucess" => true],200);
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

<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Peticion;
use App\Profesor;
use App\User;
use Auth;
use Carbon\Carbon;

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
        $profesor = Auth::user()->profesor;

        if (is_null($profesor)) {
            $alumno = Auth::user()->alumno;

            $peticions = $alumno->peticions->where("estado", "!=", "aceptada");
            $info = [];
            foreach ($peticions as $peticion) {
                $infoTemp = [];
                $infoTemp["idPeticion"] = $peticion->id;
                $infoTemp["profesor"] = $peticion->profesor->user->name;
                $infoTemp["materia"] = $peticion->materia->nombre;
                $infoTemp["estado"] = $peticion->estado;
                $infoTemp["tema"] = $peticion->tema;
                array_push($info, $infoTemp);
            }
        } else {
            $info = [];
            $peticions = $profesor->peticions->where("estado", "!=", "aceptada");
            foreach ($peticions as $peticion) {
                $infoTemp = [];
                $infoTemp["idPeticion"] = $peticion->id;
                $infoTemp["materia"] = $peticion->materia->nombre;
                $infoTemp["estado"] = $peticion->estado;
                $infoTemp["tema"] = $peticion->tema;
                array_push($info, $infoTemp);
            }
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
        $nomMateria = $request->nomMateria;
        $nomProfesor = $request->nomProfesor;
        $tema = $request->tema;

        $materia = Materia::where("nombre", $nomMateria)->first();
        $profesor = User::has("profesor")->where("name", $nomProfesor)->first()->profesor;
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

        return response()->json(["sucess" => true, "idPeticion" => $peticion->id], 200);
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
        $peticion = Peticion::where("id", $id)->first();
        $peticion->estado = "rechazada";
        $peticion->save();
        return response()->json($peticion, 200);
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
        $peticion = Peticion::where("id", $id)->first();
        $peticion->delete();
        return response()->json($peticion, 200);
    }
}

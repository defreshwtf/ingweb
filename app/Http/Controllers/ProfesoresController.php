<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();

        $responseData = [];
        foreach($profesores as $profesor){
            $profesorInfo = [];
            $profesorInfo["idProfesor"] = $profesor->id;
            $profesorInfo["nombre"] = $profesor->user->name;
            $profesorInfo["estado"] = $profesor->estado;
            $profesorInfo["materias"] = $profesor->materias;
            array_push($responseData, $profesorInfo);
        }

        return response()->json($responseData, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = Profesor::where("id", $id)->first();
        return response()->json( $profesor, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $newEstado = $request->estado;
        $profesor = Profesor::where("id", $id)->first();
        $profesor->estado = $newEstado;
        $profesor->save();
        return response()->json($profesor,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profesoresAceptados()
    {
        $profesores = Profesor::where("estado", "aceptado")->get();
        $responseData = [];
        foreach($profesores as $profesor){
            $nombreProfesor = $profesor->user->name;
            $responseData[$nombreProfesor] = [];
            $materias = $profesor->materias;
            foreach($materias as $materia) {
                array_push($responseData[$nombreProfesor], $materia->nombre);
            }
        }

        return response()->json($responseData, 200);
    }
}

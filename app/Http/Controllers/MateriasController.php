<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::all();
        $responseData = [];

        foreach ($materias as $materia) {
            $materiaInfo = [];
            $materiaInfo["id"] = $materia->id;
            $materiaInfo["nombre"] = $materia->nombre;
            $materiaInfo["profesors"] = $materia->profesors;
            array_push($responseData, $materiaInfo);
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
        //
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
        //
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

    public function materiasConProfesoresAceptados()
    {
        $materias = Materia::all();
        $responseData = [];

        foreach ($materias as $materia) {
            $profesors = $materia->profesors->where("estado", "aceptado")->all();
            if( count($profesors) > 0 ){

                $nombreMateria = $materia->nombre;
                $responseData[$nombreMateria] = [];
                foreach($profesors as $profesor) {

                    $nombreProfesor = $profesor->user->name;
                    array_push($responseData[$nombreMateria], $nombreProfesor);
                }
            }
        }

        return response()->json($responseData, 200);

    }
}

<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AsesoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor = Auth::user()->profesor;

        $dataResponse = [];
        if (is_null($profesor)) {
            $alumno = Auth::user()->alumno;

            $asesorias = $alumno->asesorias;
            foreach ($asesorias as $asesoria) {
                $info = [];
                $info["fecha_hora"] = $asesoria->fecha_hora;
                $info["lugar"] = $asesoria->lugar;
                $info["tema"] = $asesoria->tema;
                $info["materia"] = $asesoria->materia;
                array_push($dataResponse, $info);
            }
        } else {
            $asesorias = $profesor->asesorias;
            foreach ($asesorias as $asesoria) {
                $info = [];
                $info["fecha_hora"] = $asesoria->fecha_hora;
                $info["lugar"] = $asesoria->lugar;
                $info["tema"] = $asesoria->tema;
                $info["materia"] = $asesoria->materia;
                $info["alumnos"] = $asesoria->alumnos;
                array_push($dataResponse, $info);
            }
        }

        return response()->json($dataResponse);
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
}

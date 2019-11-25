<?php

namespace App\Http\Controllers;

use App\Asesoria;
use App\Peticion;
use App\Profesor;
use App\User;
use Auth;
use Carbon\Carbon;
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

            // $asesorias = $alumno->asesorias->where("fecha_hora",">",Carbon::now()->format("Y-m-d H:m:s"));
            $asesorias = $alumno->asesorias;
            foreach ($asesorias as $asesoria) {
                $info = [];
                $info["fecha_hora"] = $asesoria->fecha_hora;
                $info["lugar"] = $asesoria->lugar;
                $info["tema"] = $asesoria->tema;
                $info["materia"] = $asesoria->materia->nombre;
                array_push($dataResponse, $info);
            }
        } else {
            // $asesorias = $profesor->asesorias->where("fecha_hora",">",Carbon::now()->format("Y-m-d H:m:s"));
            $asesorias = $profesor->asesorias;
            foreach ($asesorias as $asesoria) {
                $info = [];
                $info["fecha_hora"] = $asesoria->fecha_hora;
                $info["lugar"] = $asesoria->lugar;
                $info["tema"] = $asesoria->tema;
                $info["materia"] = $asesoria->materia->nombre;
                $info["alumnos"] = $asesoria->alumnos;
                $info["idAsesoria"] = $asesoria->id;
                $info["numPeticiones"] = count($asesoria->peticions->where("estado", "!=", "rechazada"));
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
        $tema = $request->tema;
        $lugar = $request->lugar;
        $fechaSeleccionada = $request->fechaSeleccionada;
        $horaSeleccionada = $request->horaSeleccionada;
        $peticions = [];
        $profesor = Auth::user()->profesor;
        
        $peticiones = $request->peticionesSeleccionadas;
        foreach ($peticiones as $peticion) {
            $peticion_temp = Peticion::where("id", $peticion["idPeticion"])->first();
            array_push($peticions, $peticion_temp);
        }
        
        $materia = $peticions[0]->materia;
        $asesoria = Asesoria::create([
            "fecha_hora" => Carbon::parse($fechaSeleccionada . " " . $horaSeleccionada)->format("Y-m-d H:m:s"),
            "lugar" => $lugar,
            "tema" => $tema,
            "idProfesor" => $profesor->id,
            "idMateria" => $materia->id,
        ]);
        $asesoria->materia()->associate($materia);
        $asesoria->profesor()->associate($profesor);
        
        foreach($peticions as $peticion){
            $peticion->idAsesoria = $asesoria->id;
            $peticion->estado = "aceptada";
            $peticion->asesoria()->associate($asesoria);
            $peticion->save();

            $asesoria->alumnos()->attach($peticion->alumno);
        }
        
        return response()->json(["idAsesoria" => $asesoria->id, "materia" => $materia->nombre], 200);
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
        $asesoria = Asesoria::where("id", $id)->first();
        $asesoria->delete();

        return response()->json($asesoria,200);
    }


    /**
     * rechaza una peticion en una asesoria cuando la asesoira ya fue agendada
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarPeticion_en_Asesoria($id){

        $peticion = Peticion::where("id", $id)->first();
        $peticion->estado = "rechazada";
        $peticion->save();
        return response()->json("",200);
    }
        
    /**
     * muestra la informacion de las peticiones de una asesoria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInfoPeticiones_Asesoria(Request $request, $id){
        $peticiones = Asesoria::where("id",$id)->first()->peticions->where("estado","!=","rechazada");

        $responseData = [];

        foreach($peticiones as $peticion) {
            $peticionInfo = [];
            $peticionInfo["idPeticion"] = $peticion->id;
            $peticionInfo["idAlumno"] = $peticion->alumno->id;
            $peticionInfo["nombreAlumno"] = $peticion->alumno->user->name;
            $peticionInfo["tema"] = $peticion->tema;
            array_push($responseData, $peticionInfo);
        }

        
        return response()->json($responseData,200);
    }
}

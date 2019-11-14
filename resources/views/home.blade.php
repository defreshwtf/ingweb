@extends('layouts.app')

@section('content')
<home-component
	<?php
		
		$materias = Materia::all();
		$infoProfesores_by_Materia = [];
		foreach ($materias as $materia) {
			$nombreMateria = $materia->nombre;
			$infoProfesores_by_Materia[$nombreMateria] = [];
			$profesors = $materia->profesors;
			foreach ($profesors as $profesor) {
				$nombreProfesor = $profesor->user->name;
				array_push($infoProfesores_by_Materia[$nombreMateria], $nombreProfesor);
			}
		}

		$tipo_usuario = "Profesor";
		$id_tipo_usuario = "0";
		$idUser = Auth::id();

		$profesor = Profesor::where("idUser", $idUser);
		if($profesor->count() == 0){

			$tipo_usuario = "Alumno";
			$id_tipo_usuario = Alumno::where("idUser", $idUser)->value("id");
		} else{
			$id_tipo_usuario = $profesor->value("id");
		}

	?>
    :app_name="{{json_encode(config('app.name','No Name :v'))}}"
    :tipo_usuario="{{json_encode($tipo_usuario)}}"
    :id_tipo_usuario="{{json_encode($id_tipo_usuario)}}"
    :info_profesores_by_materia="{{json_encode($infoProfesores_by_Materia)}}"
>
</home-component>
@endsection

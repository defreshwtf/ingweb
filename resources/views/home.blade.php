@extends('layouts.app')

@section('content')
<?php

    $tipo_usuario = "Profesor";
    $info_tipo_usuario = [];

    $profesor = Auth::user()->profesor;
    if(is_null($profesor)){
        
        $tipo_usuario = "Alumno";
        $alumno = Auth::user()->alumno;
        if(is_null($alumno)){
            $tipo_usuario = "Administrador";
            $info_tipo_usuario = Auth::user()->administrador;
        } else {
            $info_tipo_usuario = $alumno;
        }
    } else{
        $info_tipo_usuario = $profesor;
    }
?>
<home-component
    :app_name="{{json_encode(config('app.name','No Name :v'))}}"
    :tipo_usuario="{{json_encode($tipo_usuario)}}"
    :info_tipo_usuario="{{json_encode($info_tipo_usuario)}}"
>
</home-component>
@endsection

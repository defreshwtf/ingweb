<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    //
    public function materia()
    {
        return $this->hasOne('App\Materia');
    }

    public function profesor()
    {
        return $this->hasOne('App\Profesor');
    }
    
    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno', "alumno_asesoria");
    }
}

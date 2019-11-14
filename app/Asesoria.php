<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    //
    public function materia()
    {
        $this->hasOne('App\Materia');
    }

    public function profesor()
    {
        $this->hasOne('App\Profesor');
    }
    
    public function alumnos()
    {
        $this->belongsToMany('App\Alumno', "alumno_asesoria");
    }
}

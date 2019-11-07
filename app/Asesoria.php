<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    //
    public function materia()
    {
        $this
            ->hasOne('App\Materia')
            ->withTimestamps();
    }

    public function profesor()
    {
        $this
            ->hasOne('App\Profesor')
            ->withTimestamps();
    }
    
    public function alumno()
    {
        $this
            ->hasOne('App\Alumno')
            ->withTimestamps();
    }
}

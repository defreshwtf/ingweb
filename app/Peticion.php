<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "estado",
        "tema",
        "idAlumno",
        "idProfesor",
        "idMateria",
        "idAsesoria",
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno',"idAlumno");
    }

    public function profesor()
    {
        return $this->belongsTo('App\Profesor',"idProfesor");
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia',"idMateria");
    }

    public function asesoria()
    {
        return $this->belongsTo('App\Asesoria', "idAsesoria");
    }
}

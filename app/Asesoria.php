<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_hora',
        "lugar",
        "tema",
        "idProfesor",
        "idAsesoria",
    ];

    public function peticions()
    {
        return $this->hasMany('App\Peticion', "idAsesoria");
    }

    public function profesor()
    {
        return $this->belongsTo("App\Profesor", "idProfesor");
    }

    public function materia()
    {
        return $this->belongsTo("App\Materia", "idMateria");
    }

    public function alumnos()
    {
        return $this->belongsToMany("App\Alumno", "alumno_asesoria", "idAsesoria", "idAlumno");
    }
}

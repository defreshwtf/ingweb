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
        'idMateria',
        'idProfesor',
        'fecha_hora',
    ];
    
    public function materia()
    {
        return $this->belongsTo('App\Materia',"idMateria");
    }

    public function profesor()
    {
        return $this->belongsTo('App\Profesor',"idProfesor");
    }
    
    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno', "alumno_asesoria","idAsesoria","idAlumno");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function asesorias()
    {
        return $this->hasMany("App\Asesoria", "idMateria");
    }

    public function profesors()
    {
        return $this->belongsToMany('App\Profesor', 'materia_profesor',"idMateria","idProfesor");
    }
}

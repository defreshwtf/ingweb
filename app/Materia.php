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
    
    public function peticions(){
        return $this->hasMany("App\Peticion", "idMateria");
    }

    public function profesors()
    {
        return $this->belongsToMany('App\Profesor', "materia_profesor","idMateria","idProfesor");
    }
}

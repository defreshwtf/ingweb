<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idUser'
    ];
    public function user()
    {
        return $this->belongsTo("App\User","idUser");
    }

    public function asesorias()
    {
        return $this->belongsToMany("App\Asesoria", "alumno_asesoria","idAlumno","idAsesoria");
    }

    public function peticions()
    {
        return $this->hasMany("App\Peticion","idAlumno");
    }
}

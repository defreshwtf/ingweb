<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public function asesorias()
    {
        return $this->hasMany("App\Asesoria");
    }

    public function profesors()
    {
        return $this->belongsToMany('App\Profesor', 'materia_profesor');

    }
}

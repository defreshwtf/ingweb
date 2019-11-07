<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public function asesoria()
    {
        return $this->hasOne("App\Asesoria")->withTimestamps();
    }

    public function profesor()
    {
        return $this
            ->belongsToMany('App\Profesor', 'materia_profesor')
            ->withTimestamps();

    }
}

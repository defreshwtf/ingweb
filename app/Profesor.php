<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
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
        return $this->hasOne("App\User");
    }

    public function materias()
    {
        return $this->belongsToMany('App\Materia', "materia_profesor");
    }

    public function asesoria(){
        return $this->hasMany("App\Asesoria");
    } 
}

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
        return $this->hasOne("App\User")->withTimestamps();
    }

    public function materia()
    {
        return $this
            ->belongsToMany('App\Materia')
            ->withTimestamps();
    }

    public function asesoria(){
        return $this->hasOne("App\Asesoria")->withTimestamps();
    } 
}

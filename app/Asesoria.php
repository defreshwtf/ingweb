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
    ];
    
    public function peticions()
    {
        return $this->hasMany('App\Peticion', "idAsesoria");
    }
}

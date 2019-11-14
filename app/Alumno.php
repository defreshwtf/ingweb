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
        return $this->hasOne("App\User");
    }

    public function asesorias()
    {
        return $this->belongsToMany("App\Asesoria", "alumno_asesoria");
    }
}

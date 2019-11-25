<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    
    protected $fillable = [
        'idUser'
    ];

    public function user()
    {
        return $this->belongsTo("App\User","idUser");
    }
}

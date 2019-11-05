<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp("fecha_hora");
            $table->timestamps();

            $table->bigInteger("idMateria");
            $table->bigInteger("idAlumno");
            $table->bigInteger("idProfesor");

            $table->foreign("idMateria")->references("id")->on("Materias");
            $table->foreign("idAlumno")->references("id")->on("Alumnos");
            $table->foreign("idProfesor")->references("id")->on("Profesors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesorias');
    }

    public function materia()
    {
        $this
            ->belongsToMany('App\Materia')
            ->withTimestamps();
    }

    public function profesor()
    {
        $this
            ->belongsToMany('App\Profesor')
            ->withTimestamps();
    }
    
    public function alumno()
    {
        $this
            ->belongsToMany('App\Alumno')
            ->withTimestamps();
    }
}

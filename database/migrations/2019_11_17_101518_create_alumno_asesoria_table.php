<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoAsesoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_asesoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger("idAlumno")->unsigned();
            $table->foreign("idAlumno")->references("id")->on("alumnos");

            $table->bigInteger("idAsesoria")->unsigned();
            $table->foreign("idAsesoria")->references("id")->on("asesorias");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_asesoria');
    }
}

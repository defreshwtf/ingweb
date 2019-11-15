<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("estado")->default("pendiente");
            $table->string("tema");
            $table->timestamps();

            $table->bigInteger("idAlumno")->unsigned();
            $table->foreign("idAlumno")->references("id")->on("alumnos");

            $table->bigInteger("idProfesor")->unsigned();
            $table->foreign("idProfesor")->references("id")->on("profesors");

            $table->bigInteger("idMateria")->unsigned();
            $table->foreign("idMateria")->references("id")->on("materias");

            $table->bigInteger("idAsesoria")->nullable()->unsigned();
            $table->foreign("idAsesoria")->references("id")->on("asesorias");
        });

        DB::update("ALTER TABLE peticions AUTO_INCREMENT = 20191121;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticions');
    }
}

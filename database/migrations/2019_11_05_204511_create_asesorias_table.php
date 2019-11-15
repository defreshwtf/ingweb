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
            $table->timestamp("fecha_hora")->nullable();
            $table->string("lugar")->default("-sin asignar-");
            $table->string("tema");
            $table->timestamps();

            $table->bigInteger("idMateria")->unsigned();
            $table->foreign("idMateria")->references("id")->on("materias");

            $table->bigInteger("idProfesor")->unsigned();
            $table->foreign("idProfesor")->references("id")->on("profesors");
        });

        DB::update("ALTER TABLE asesorias AUTO_INCREMENT = 20191121;");
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
}

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
            $table->string("lugar");
            $table->string("tema");
            $table->timestamps();

            $table->bigInteger("idProfesor")->unsigned();
            $table->foreign("idProfesor")->references("id")->on("profesors");

            $table->bigInteger("idMateria")->unsigned();
            $table->foreign("idMateria")->references("id")->on("materias");
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

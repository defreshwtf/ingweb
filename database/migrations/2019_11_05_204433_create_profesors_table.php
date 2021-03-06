<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado')->default("pendiente");
            $table->timestamps();

            $table->bigInteger("idUser")->unsigned();
            $table->foreign("idUser")->references("id")->on("users")->onDelete("cascade");
        });

        DB::update("ALTER TABLE profesors AUTO_INCREMENT = 20191121;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesors');
    }
}

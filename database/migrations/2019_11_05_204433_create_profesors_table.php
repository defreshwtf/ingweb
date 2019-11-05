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
            $table->timestamps();

            $table->bigInteger("idUser");

            $table->foreign("idUser")->references("id")->on("Users");
        });
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

    public function user()
    {
        return $this->hasOne("App\User");
    }

    public function materia()
    {
        return $this
            ->belongsToMany('App\Materia')
            ->withTimestamps();
    }

    public function asesoria(){
        return $this->hasOne("App\Asesoria");
    } 
}

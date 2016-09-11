<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporadas', function ($table) {
          $table->increments('id');
          $table->integer("temporada");
          $table->integer("nepisodios");
          $table->integer("asistido");
          $table->boolean("completa");
          $table->integer("serie_id");
          $table->foreign('serie_id')->references('id')->on('series');
          
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('series');
    }
}

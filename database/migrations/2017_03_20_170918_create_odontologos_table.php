<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdontologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontologos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('especialidad');
            $table->double('sueldo');
            $table->unsignedInteger('gabinete_id');
            $table->foreign('gabinete_id')->references('id')->on('gabinetes')->onDelete('cascade');
            $table->unsignedInteger('tratamiento_id');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');
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
        Schema::dropIfExists('odontologos');
    }
}

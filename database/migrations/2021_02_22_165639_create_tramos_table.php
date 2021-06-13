<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramos', function (Blueprint $table) {
            $table->id();
            $table->char('dia');
            $table->char('horainicio');
            $table->char('horafin');
            $table->foreignId('actividad_id')->references('id')->on('actividades');
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
        Schema::table('tramos', function (Blueprint $table) {
            Schema::dropIfExists('tramos');
        });
    }
}

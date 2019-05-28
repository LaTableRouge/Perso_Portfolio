<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabHorairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_horaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lundi')->nullable();
            $table->string('mardi')->nullable();
            $table->string('mercredi')->nullable();
            $table->string('jeudi')->nullable();
            $table->string('vendredi')->nullable();
            $table->string('samedi')->nullable();
            $table->string('dimanche')->nullable();

            $table->integer('magasin_id')->unsigned();
            $table->foreign('magasin_id')
                ->references('id')
                ->on('magasins');

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
        Schema::dropIfExists('tab_horaires');
    }
}

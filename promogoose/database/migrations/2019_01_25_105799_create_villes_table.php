<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ville_departement');
            $table->string('ville_slug');
            $table->string('ville_nom');
            $table->string('ville_nom_simple');
            $table->string('ville_nom_reel');
            $table->string('ville_nom_soundex');
            $table->string('ville_nom_metaphone');
            $table->string('ville_code_postal');
            $table->string('ville_commune');
            $table->string('ville_code_commune');
            $table->string('ville_arrondissement');
            $table->string('ville_canton');
            $table->string('ville_amdi');
            $table->string('ville_population_2010');
            $table->string('ville_population_1999');
            $table->string('ville_population_2012');
            $table->string('ville_densite_2010');
            $table->string('ville_surface');
            $table->float('ville_longitude_deg');
            $table->float('ville_latitude_deg');
            $table->float('ville_longitude_grd');
            $table->float('ville_latitude_grd');
            $table->float('ville_longitude_dms');
            $table->float('ville_latitude_dms');
            $table->integer('ville_zmin');
            $table->integer('ville_zmax');


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
        Schema::dropIfExists('villes');
    }
}

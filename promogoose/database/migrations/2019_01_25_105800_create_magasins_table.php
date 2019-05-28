<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagasinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('magasins', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nomMag');
                $table->string('ad1Mag');
                $table->string('ad2Mag')->nullable();
                $table->double('latMag', 15, 8);
                $table->double('longMag', 16, 8);
                $table->string('telMag')->nullable();
                $table->string('mailMag');
                $table->integer('siret');
                $table->string('photo1Mag');
                $table->string('photo2Mag')->nullable();
                $table->string('photo3Mag')->nullable();

                $table->integer('type_id')->unsigned();
                $table->foreign('type_id')->references('id')->on('types');

                /*$table->integer('categories_id')->unsigned()->nullable();;
                $table->foreign('categories_id')->references('id')->on('categories');*/
                $table->integer('categorie_id')->unsigned()->nullable();
                $table->foreign('categorie_id')->references('id')->on('categories');

                $table->integer('commercant_id')->unsigned();
                $table->foreign('commercant_id')->references('id')->on('users');

                /*$table->integer('villes_id')->unsigned();
                $table->foreign('villes_id')->references('ville_id')->on('villes');*/
                $table->integer('ville_id')->unsigned();
                $table->foreign('ville_id')->references('id')->on('villes');




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
        Schema::dropIfExists('magasins');
    }

    }
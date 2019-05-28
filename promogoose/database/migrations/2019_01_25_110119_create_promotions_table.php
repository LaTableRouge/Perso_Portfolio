<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('dateDebutPromo')->nullable();
            $table->timestamp('dateFinPromo')->nullable();
            $table->string('libPromo');
            $table->boolean('etatPromo');
            $table->integer('clickPromo')->default(0);
            $table->string('codePourPromo');
            $table->string('codePourAvis');
            $table->string('photo1Promo')->nullable();
            $table->string('photo2Promo')->nullable();
            $table->string('photo3Promo')->nullable();

            $table->integer('magasin_id')->unsigned();
            $table->foreign('magasin_id')->references('id')->on('magasins')->onDelete('cascade');

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
        Schema::dropIfExists('promotions');
    }
}

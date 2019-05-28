<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('provider_id')->nullable();
            $table->string('telUser')->nullable();
            $table->boolean('commercant')->default(0);
            $table->boolean('admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        // Schema::table("users", function (Blueprint $table) {

        //     $table->string('facebook_id');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        // Schema::table("users", function (Blueprint $table) {

        //     $table->dropColumn('facebook_id');

        // });
    }
}

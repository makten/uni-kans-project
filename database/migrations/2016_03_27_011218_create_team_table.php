<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


//        Schema::create('teams', function(Blueprint $table){
//            $table->increments('id');
//            $table->integer('owner_id')->index();
//            $table->string('team_name');
//            $table->text('photo_url');
//            $table->timestamps();
//        });

        Schema::create('teams', function(Blueprint $table){
            $table->increments('id');
            $table->integer('propositie_id')->index();
            $table->string('team_name');
            $table->text('photo_url');
            $table->foreign('propositie_id')->references('id')->on('proposities');
            $table->timestamps();
        });

        Schema::create('team_user', function(Blueprint $table){

            $table->integer('team_id');
            $table->integer('user_id');
            $table->string('role', 20);

            $table->unique(['team_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teams');
        Schema::drop('team_user');
    }
}

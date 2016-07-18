<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themas', function(Blueprint $table){
            $table->increments('id');
            $table->string('thema_name');
            $table->timestamps();
        });

        Schema::create('thema_proposities', function(Blueprint $table){
            $table->integer('propositie_id')->unsigned()->index();
            $table->foreign('propositie_id')->references('id')->on('proposities')->onDelete('cascade');

            $table->integer('thema_id')->unsigned()->index();
            $table->foreign('thema_id')->references('id')->on('themas')->onDelete('cascade');
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
        Schema::drop('themas');
        Schema::drop('thema_proposities');
    }
}

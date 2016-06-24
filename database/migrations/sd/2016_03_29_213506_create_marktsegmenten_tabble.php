<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarktsegmentenTabble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marktsegments', function(Blueprint $table){

            $table->increments('id');
            $table->string('markt_naam');
            $table->timestamps();
        });

        Schema::create('marktsegment_proposities', function(Blueprint $table){
            $table->integer('marktsegment_id')->unsigned()->index();
            $table->foreign('marktsegment_id')->references('id')->on('marktsegments')->onDelete('cascade');

            $table->integer('propositie_id')->unsigned()->index();
            $table->foreign('propositie_id')->references('id')->on('proposities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marktsegments');
    }
}

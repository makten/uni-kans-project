<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reacties', function(Blueprint $table){
            $table->increments('id');
            $table->longText('message');
            $table->integer('propositie_id')->unsigned()->index();;
            $table->integer('user_id')->unsigned()->index();
            $table->integer('comment_parent', 0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('propositie_id')->references('id')->on('proposities')->onDelete('cascade');
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
        Schema::drop('reacties');
    }
}

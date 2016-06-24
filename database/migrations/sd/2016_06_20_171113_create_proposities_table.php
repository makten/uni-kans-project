<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropositiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposities', function(Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->longText('pro_description');
            $table->string('pro_status');
            $table->string('pro_state');
            $table->integer('user_id')->unsigned();
            $table->string('pro_uniek');
            $table->string('pro_themas');
            $table->string('pro_marktsegmenten');
            $table->string('pro_revenuen');
            $table->string('pro_avatar');
            $table->string('pro_avatarResized');
            $table->string('pro_saleskit');
            $table->string('pro_marktinfo');
            $table->string('pro_technical_doc');
            $table->text('pro_referencen');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('proposities');
    }
}

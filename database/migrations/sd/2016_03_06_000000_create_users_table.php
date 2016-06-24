<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('department');
            $table->string('function');
            $table->string('email')->unique();
            $table->text('avatar');
            $table->string('password', 60);
            $table->dateTime('last_login');
//            $table->string('avatar');
//            $table->integer('client_id')->unsigned()->index();
//            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

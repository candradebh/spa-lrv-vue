<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user1_id')->unsigned();
            $table->foreign('user1_id')->references('id')->on('users');
            $table->integer('user2_id')->unsigned();
            $table->foreign('user2_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('users_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chatuser_id')->unsigned();
            $table->foreign('chatuser_id')->references('id')->on('chatusers');
            $table->text('message');
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
        Schema::dropIfExists('chatusers');
        Schema::dropIfExists('users_messages');
    }
}

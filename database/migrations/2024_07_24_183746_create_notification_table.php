<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('type');
            $table->string('title');
            $table->string('description');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notification');
    }
};

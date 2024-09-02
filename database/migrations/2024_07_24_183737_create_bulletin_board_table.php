<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinBoardTable extends Migration
{
    public function up()
    {
        Schema::create('bulletin_board', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title');
            $table->string('description');
            $table->unsignedTinyInteger('category_id');
            $table->date('post_date');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('bulletin_board_category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bulletin_board');
    }
};

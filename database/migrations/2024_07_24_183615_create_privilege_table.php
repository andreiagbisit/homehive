<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegeTable extends Migration
{
    public function up()
    {
        Schema::create('privilege', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedTinyInteger('account_type_id');
            $table->unsignedInteger('permission_id');
            $table->timestamps();

            $table->foreign('account_type_id')->references('id')->on('account_type');
            $table->foreign('permission_id')->references('id')->on('permission');
        });
    }

    public function down()
    {
        Schema::dropIfExists('privilege');
    }
};

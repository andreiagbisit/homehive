<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTypeTable extends Migration
{
    public function up()
    {
        Schema::create('account_type', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('name');
            $table->timestamps();
        });

        
    }

    public function down()
    {
        Schema::dropIfExists('account_type');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleStickerApplicationTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_sticker_application', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->string('registered_owner');
            $table->string('make');
            $table->string('series');
            $table->string('color');
            $table->string('plate_no');
            $table->unsignedInteger('fee');
            $table->unsignedSmallInteger('payment_mode_id');
            $table->unsignedTinyInteger('payment_collector_id');
            $table->date('appt_date');
            $table->time('appt_time');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_mode_id')->references('id')->on('payment_mode');
            $table->foreign('payment_collector_id')->references('id')->on('payment_collector');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_sticker_application');
    }
};

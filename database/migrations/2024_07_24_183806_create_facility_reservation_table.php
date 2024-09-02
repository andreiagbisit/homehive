<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityReservationTable extends Migration
{
    public function up()
    {
        Schema::create('facility_reservation', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('facility_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('fee');
            $table->unsignedSmallInteger('payment_mode_id');
            $table->unsignedTinyInteger('payment_collector_id');
            $table->date('appt_date');
            $table->time('appt_time');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('facility_id')->references('id')->on('subdivision_facility');
            $table->foreign('payment_mode_id')->references('id')->on('payment_mode');
            $table->foreign('payment_collector_id')->references('id')->on('payment_collector');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facility_reservation');
    }
};

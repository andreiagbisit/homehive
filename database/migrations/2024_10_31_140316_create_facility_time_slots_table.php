<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('facility_time_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('facility_id'); // Match the data type in subdivision_facility
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        
            $table->foreign('facility_id')
                  ->references('id')
                  ->on('subdivision_facility')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facility_time_slots');
    }
};

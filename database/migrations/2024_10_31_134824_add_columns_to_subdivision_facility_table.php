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
        Schema::table('subdivision_facility', function (Blueprint $table) {
            $table->decimal('fee', 8, 2)->nullable(); // Reservation fee
            $table->json('available_days')->nullable(); // Available days as JSON array
            $table->json('available_months')->nullable(); // Available months as JSON array
            $table->time('start_time')->nullable(); // Start time for availability
            $table->time('end_time')->nullable(); // End time for availability
        });
    }

    public function down()
    {
        Schema::table('subdivision_facility', function (Blueprint $table) {
            $table->dropColumn(['fee', 'available_days', 'available_months', 'start_time', 'end_time']);
        });
    }
};

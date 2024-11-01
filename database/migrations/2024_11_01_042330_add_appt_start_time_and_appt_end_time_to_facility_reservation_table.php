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
        Schema::table('facility_reservation', function (Blueprint $table) {
            // Add appt_start_time and appt_end_time columns
            $table->time('appt_start_time')->nullable();
            $table->time('appt_end_time')->nullable();

            // Make payment_collector_id nullable and ensure correct foreign key constraint
            $table->unsignedTinyInteger('payment_collector_id')->nullable()->change();
            $table->foreign('payment_collector_id')
                  ->references('id')
                  ->on('payment_collector')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facility_reservation', function (Blueprint $table) {
            // Drop the foreign key constraint and the columns added in `up` method
            $table->dropForeign(['payment_collector_id']);
            $table->dropColumn(['appt_start_time', 'appt_end_time']);
            
            // Revert payment_collector_id to not nullable if necessary
            $table->unsignedTinyInteger('payment_collector_id')->change();
        });
    }
    
};

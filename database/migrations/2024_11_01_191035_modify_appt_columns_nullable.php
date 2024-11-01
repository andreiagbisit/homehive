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
        Schema::table('vehicle_sticker_application', function (Blueprint $table) {
            $table->date('appt_date')->nullable()->change();
            $table->string('appt_time', 8)->nullable()->change(); // Assuming `appt_time` is stored as a string
        });
    }
    
    public function down()
    {
        Schema::table('vehicle_sticker_application', function (Blueprint $table) {
            $table->date('appt_date')->nullable(false)->change();
            $table->string('appt_time', 8)->nullable(false)->change(); // Revert to not nullable
        });
    }
    
};

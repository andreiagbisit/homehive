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
        Schema::table('vehicle_sticker_application_details', function (Blueprint $table) {
            $table->integer('registered_vehicles')->default(0); // Defaulting to 0
        });
    }

    public function down()
    {
        Schema::table('vehicle_sticker_application_details', function (Blueprint $table) {
            $table->dropColumn('registered_vehicles');
        });
    }
};

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
            $table->date('date_of_payment')->nullable()->after('appt_time');
        });
    }
    
    public function down()
    {
        Schema::table('vehicle_sticker_application', function (Blueprint $table) {
            $table->dropColumn('date_of_payment');
        });
    }
};

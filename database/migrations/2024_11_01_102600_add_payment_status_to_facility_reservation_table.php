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
            $table->unsignedTinyInteger('payment_status')->nullable(); // or use a default value as needed
        });
    }
    
    public function down()
    {
        Schema::table('facility_reservation', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
    
};

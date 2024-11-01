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
            $table->string('receipt_img')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('vehicle_sticker_application', function (Blueprint $table) {
            $table->dropColumn('receipt_img');
        });
    }
    
};

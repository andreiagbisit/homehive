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
            $table->string('reference_no')->nullable();
            $table->string('receipt_path')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facility_reservation', function (Blueprint $table) {
            //
        });
    }
};

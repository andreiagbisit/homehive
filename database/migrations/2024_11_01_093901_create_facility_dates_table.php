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
        Schema::create('facility_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('facility_id'); // Match the type with subdivision_facility
            $table->date('date');
            $table->timestamps();
    
            $table->foreign('facility_id')
                  ->references('id')
                  ->on('subdivision_facility')
                  ->onDelete('cascade');
        });
    }
    
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_dates');
    }
};

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
        Schema::table('payment', function (Blueprint $table) {
            $table->string('month')->nullable(); // Add month column
            $table->year('year')->nullable();    // Add year column
        });
    }
    
    
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropColumn(['month', 'year']);
        });
    }
    
};

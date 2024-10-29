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
        Schema::table('payment_category', function (Blueprint $table) {
            $table->string('hex_code')->nullable(); // Add hex_code column as nullable
        });
    }
    
    public function down()
    {
        Schema::table('payment_category', function (Blueprint $table) {
            $table->dropColumn('hex_code');
        });
    }
    
};

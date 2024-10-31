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
        Schema::table('subdivision_facility', function (Blueprint $table) {
            $table->string('hex_code', 7)->nullable(); // Allow null and set the length for a hex color
        });
    }

    public function down()
    {
        Schema::table('subdivision_facility', function (Blueprint $table) {
            $table->dropColumn('hex_code');
        });
    }
};

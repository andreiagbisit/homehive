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
        Schema::table('bulletin_board_category', function (Blueprint $table) {
            $table->string('hex_code', 7)->after('name')->nullable(); // Example: #FFFFFF
        });
    }
    
    public function down()
    {
        Schema::table('bulletin_board_category', function (Blueprint $table) {
            $table->dropColumn('hex_code');
        });
    }    
};

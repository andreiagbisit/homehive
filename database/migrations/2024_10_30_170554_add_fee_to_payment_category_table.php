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
            $table->decimal('fee', 10, 2)->nullable()->after('hex_code'); // Adjust as necessary
        });
    }
    
    public function down()
    {
        Schema::table('payment_category', function (Blueprint $table) {
            $table->dropColumn('fee');
        });
    }
};

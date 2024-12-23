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
            $table->string('reference_no')->nullable()->after('receipt_img'); // Adds reference_no after receipt_img, make adjustments as needed
        });
    }
    
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropColumn('reference_no');
        });
    }
    
};

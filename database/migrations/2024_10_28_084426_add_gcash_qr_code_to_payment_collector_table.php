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
        Schema::table('payment_collector', function (Blueprint $table) {
            $table->string('gcash_qr_code_path')->nullable()->after('collector_gcash_number');
        });
    }
    
    public function down()
    {
        Schema::table('payment_collector', function (Blueprint $table) {
            $table->dropColumn('gcash_qr_code_path');
        });
    }
    
};

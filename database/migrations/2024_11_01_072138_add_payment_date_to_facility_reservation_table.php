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
            $table->date('payment_date')->nullable()->after('receipt_path');
        });
    }

    public function down()
    {
        Schema::table('facility_reservation', function (Blueprint $table) {
            $table->dropColumn('payment_date');
        });
    }
};

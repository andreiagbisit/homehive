<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCollectorTable extends Migration
{
    public function up()
    {
        Schema::table('vehicle_sticker_application', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['payment_collector_id']);
    
            // Change the column to be nullable
            $table->unsignedTinyInteger('payment_collector_id')->nullable()->change();
    
            // Re-add the foreign key constraint
            $table->foreign('payment_collector_id')->references('id')->on('payment_collector')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('vehicle_sticker_application', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['payment_collector_id']);
    
            // Change the column to not be nullable (rollback)
            $table->unsignedTinyInteger('payment_collector_id')->nullable(false)->change();
    
            // Re-add the foreign key constraint
            $table->foreign('payment_collector_id')->references('id')->on('payment_collector')->onDelete('restrict');
        });
    }
    
};

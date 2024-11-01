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
            $table->softDeletes(); // Adds a deleted_at column for soft deletes
        });
    }
    
    public function down()
    {
        Schema::table('facility_reservation', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Removes the deleted_at column if rolled back
        });
    }
};

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
        // Since the foreign key already exists, no need to add it again
        // This migration can be left empty or used for other operations
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Only drop the foreign key if needed, but ensure it's not already dropped
        Schema::table('bulletin_board', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};

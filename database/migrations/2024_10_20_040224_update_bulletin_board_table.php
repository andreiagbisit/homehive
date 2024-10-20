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
        Schema::table('bulletin_board', function (Blueprint $table) {
            // If user_id already exists in the table, you can just add the foreign key
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('bulletin_board', function (Blueprint $table) {
            // If you need to rollback
            $table->dropForeign(['user_id']);
        });
    }
};

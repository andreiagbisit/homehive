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
        Schema::table('users', function (Blueprint $table) {
            // Remove existing unique constraints
            $table->dropUnique(['uname']);
            $table->dropUnique(['email']);
    
            // Add new unique constraints that also consider `deleted_at`
            $table->unique(['uname', 'deleted_at']);
            $table->unique(['email', 'deleted_at']);
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the new constraints
            $table->dropUnique(['uname', 'deleted_at']);
            $table->dropUnique(['email', 'deleted_at']);
    
            // Add back the original unique constraints
            $table->unique('uname');
            $table->unique('email');
        });
    }
    
};

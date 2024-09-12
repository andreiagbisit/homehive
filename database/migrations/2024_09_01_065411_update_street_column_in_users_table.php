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
        $table->string('street')->nullable(false)->change(); // Make 'street' column NOT NULL
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('street')->nullable()->change(); // Revert 'street' column to allow NULL
    });
}

};

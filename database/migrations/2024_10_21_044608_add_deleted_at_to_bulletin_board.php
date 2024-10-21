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
            if (!Schema::hasColumn('bulletin_board', 'deleted_at')) {
                $table->softDeletes();  // Adds the `deleted_at` column for soft deletes
            }
        });
    }

    public function down()
    {
        Schema::table('bulletin_board', function (Blueprint $table) {
            $table->dropSoftDeletes();  // Removes the `deleted_at` column if the migration is rolled back
        });
    }
};


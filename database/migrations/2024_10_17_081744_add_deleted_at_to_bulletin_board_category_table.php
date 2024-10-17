<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToBulletinBoardCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulletin_board_category', function (Blueprint $table) {
            $table->softDeletes();  // This adds the deleted_at column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulletin_board_category', function (Blueprint $table) {
            $table->dropSoftDeletes();  // This will drop the deleted_at column if rolled back
        });
    }
}

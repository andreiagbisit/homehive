<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropNumberColumnFromPaymentTable extends Migration
{
    public function up()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropColumn('number');
        });
    }

    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->integer('number'); // Define the column type as it was initially
        });
    }
}

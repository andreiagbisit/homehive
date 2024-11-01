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
        Schema::create('vehicle_sticker_application_details', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing `id` column
            $table->decimal('vehicle_sticker_fee', 10, 2); // Fee for the vehicle sticker
            $table->string('hex_code', 7)->nullable(); // Hex color code, nullable if not provided
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_sticker_application_details');
    }
};

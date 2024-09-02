<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id(); // `id` column will be auto-incrementing primary key
            $table->integer('number')->unique(); // Use `integer` without length, unique constraint
            $table->string('title', 128); // `title` column with a max length of 128 characters
            $table->unsignedInteger('user_id'); // `user_id` column
            $table->unsignedTinyInteger('category_id'); // `category_id` column
            $table->integer('fee'); // `fee` column without auto_increment
            $table->unsignedTinyInteger('status_id'); // `status_id` column
            $table->date('pay_date'); // `pay_date` column
            $table->unsignedSmallInteger('mode_id'); // `mode_id` column
            $table->unsignedTinyInteger('collector_id'); // `collector_id` column
            $table->string('receipt_img', 255); // `receipt_img` column with a max length of 255 characters
            $table->timestamps(); // `created_at` and `updated_at` columns

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('payment_category');
            $table->foreign('status_id')->references('id')->on('payment_status');
            $table->foreign('mode_id')->references('id')->on('payment_mode');
            $table->foreign('collector_id')->references('id')->on('payment_collector');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment');
    }
};

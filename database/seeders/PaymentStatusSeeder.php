<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_status')->insert([
            ['id' => 1, 'name' => 'Paid'],
            ['id' => 2, 'name' => 'Pending'],
        ]);
    }
}

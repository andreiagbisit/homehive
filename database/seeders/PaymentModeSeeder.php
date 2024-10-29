<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentModeSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_mode')->insert([
            ['id' => 1, 'name' => 'Gcash'],
            ['id' => 2, 'name' => 'On-site Payment'],
        ]);
    }
}

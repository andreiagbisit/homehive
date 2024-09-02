<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Seed the account_type table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_type')->insert([
            ['id' => 1, 'name' => 'Super Admin'],
            ['id' => 2, 'name' => 'Admin'],
            ['id' => 3, 'name' => 'User'],
        ]);
    }
}

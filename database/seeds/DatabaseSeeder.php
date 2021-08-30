<?php

use Illuminate\Database\Seeder;
use Stripe\Account;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            QuoteSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            CoinSeeder::class,
            FarmSeeder::class,
            TransactionSeeder::class,
            AccountSeeder::class
        ]);
    }
}

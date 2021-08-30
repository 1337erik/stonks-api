<?php

use App\Account;
use App\Coin;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coin = Coin::find(1);

        // give carsten 10000 in farm 1
        Account::create([

            'user_id' => 2,
            'coin_id' => 1,
            'farm_id' => 1,
            'coin_amount' => 4032.422,
            'usd_value_override' => 10000,
            'uplink_id' => 1,
            'uplink_cut' => 0.1
        ]);

        // give lima whatever number in farm 1
        Account::create([

            'user_id' => 3,
            'coin_id' => 1,
            'farm_id' => 1,
            'coin_amount' => 514.98,
            'usd_value_override' => 1291.31,
            'uplink_id' => 1,
            'uplink_cut' => 0.1
        ]);

        // give charles whatever number in farm 1
        Account::create([

            'user_id' => 4,
            'coin_id' => 1,
            'farm_id' => 1,
            'coin_amount' => 852.71,
            'usd_value_override' => 2137.14,
            'uplink_id' => 1,
            'uplink_cut' => 0.1
        ]);

        // give will whatever number in farm 1
        Account::create([

            'user_id' => 5,
            'coin_id' => 1,
            'farm_id' => 1,
            'coin_amount' => 14,
            'usd_value_override' => 45,
            'uplink_id' => 1,
            'uplink_cut' => 0.1
        ]);

        // give me my shit
        Account::create([

            'user_id' => 1,
            'coin_id' => 1,
            'farm_id' => 1,
            'coin_amount' => 10973.63836,
            'usd_value_override' => 27516
        ]);
    }
}

<?php

use App\Coin;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coin::create([
            'name' => Coin::USDT,
            'usd_value' => 1
        ]);

        Coin::create([
            'name' => Coin::BSW,
            'usd_value' => 1.59
        ]);
    }
}

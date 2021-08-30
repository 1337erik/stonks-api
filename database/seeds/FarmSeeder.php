<?php

use App\Farm;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farm::create([

            'name'        => 'USDT/BSW',
            'current_apr' => 188,
            'coin_id'     => 2,
        ]);

        Farm::create([

            'name'        => 'BSW single stake',
            'current_apr' => 164,
            'coin_id'     => 2,
        ]);
    }
}

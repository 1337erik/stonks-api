<?php

use App\Managers\QuoteManager;
use App\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach( Quote::HERO_QUOTES as $quote ){

            factory( Quote::class )->create([
                'category' => Quote::CATEGORY_HERO,
                'body' => $quote
            ]);
        }
    }
}

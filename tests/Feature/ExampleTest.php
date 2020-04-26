<?php

namespace Tests\Feature;

use App\Managers\QuoteManager;
use App\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use QuoteSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // Run the DatabaseSeeder...
    // $this->seed();

    // Run a single seeder...
    // $this->seed( QuoteSeeder::class );

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->seed( QuoteSeeder::class );

        $m = new QuoteManager();
        $quote = $m->getRandomQuote();
        $this->assertNotNull( $quote );
    }
}

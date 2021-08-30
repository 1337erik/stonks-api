<?php

namespace Tests\Feature;

use App\Coin;
use App\Farm;
use App\Goal;
use App\Http\Requests\EventFarmRequest;
use App\Managers\FarmManager;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FarmManagerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @var FarmManager $manager
     */
    protected $manager;
    protected $farm;
    protected $coin;

    public function setUp() : void
    {
        parent::setUp();

        $this->manager = new FarmManager();
        $this->farm = Farm::find( 1 );
        $this->coin = Coin::find( 2 );

        // $this->will = factory( User::class )->create();
    }

    /**
     * @test
     */
    public function event_farm_test()
    {
        $request = new EventFarmRequest([

            'farm_id'           => $this->farm->id,
            'farm_recorded_apr' => 212.65,
            'coin_amount'       => 328,
            'coin_id'           => $this->coin->id,
            'coin_usd_value'    => $this->coin->usd_value,
            'farm_usd_value'    => 43078.586,
        ]);
        $this->manager->eventFarm( $this->farm, $request );

        // TODO create some actual tests.. lol
    }
}

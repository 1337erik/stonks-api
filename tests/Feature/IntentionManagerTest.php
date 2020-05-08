<?php

namespace Tests\Feature;

use App\Intention;
use App\Managers\IntentionManager;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntentionManagerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $manager;
    protected $user;

    public function setUp() : void
    {
        parent::setUp();

        $this->manager = new IntentionManager();
        $this->user = factory( User::class )->create();

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function a_users_intentions_can_be_gotten()
    {
        factory( Intention::class, 5 )->create([ 'user_id' => $this->user->id ]);

        $intentions = $this->manager->getIntentionsForUser( $this->user->id );

        $this->assertCount( 5, $intentions );
    }
}

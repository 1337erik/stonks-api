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
    protected $erik;
    protected $other_guy;

    public function setUp() : void
    {
        parent::setUp();

        $this->manager = new IntentionManager();
        $this->erik = factory( User::class )->create();

        $this->will = factory( User::class )->create();
        $this->actingAs( $this->erik );

        $this->assertEquals( $this->erik->id, auth()->user()->id );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function intentions_manager_read_test()
    {
        factory( Intention::class, 5 )->create([ 'user_id' => auth()->user()->id ]);

        $eriks = $this->manager->getIntentionsForUser( auth()->user()->id );
        $this->assertCount( 5, $eriks );

        $wills = $this->manager->getIntentionsForUser( $this->will->id );
        $this->assertCount( 0, $wills );
    }

    /**
     * @test
     */
    public function a_user_can_create_intentions()
    {
        $intention = factory( Intention::class )->make();
        $this->manager->addIntentionForUser( auth()->user(), $intention );
        $this->assertDatabaseHas( 'intentions', [

            'user_id' => auth()->user()->id,
            'title' => $intention->title
        ]);

        $wills = $this->manager->getIntentionsForUser( $this->will->id );
        $this->assertCount( 0, $wills );
    }

    /**
     * @test
     */
    public function a_user_can_update_intentions()
    {
        $intention = factory( Intention::class )->create([ 'user_id' => auth()->user()->id ]);
        $saved = $intention->title;

        $new_data = factory( Intention::class )->make([ 'user_id' => auth()->user()->id ])->toArray();
        $this->manager->updateIntention( $intention, $new_data );

        $this->assertDatabaseMissing( 'intentions', [

            'user_id' => auth()->user()->id,
            'title' => $saved
        ]);
        $this->assertDatabaseHas( 'intentions', [

            'user_id' => auth()->user()->id,
            'title' => $new_data[ 'title' ]
        ]);
    }

    /**
     * @test
     */
    public function a_user_can_delete_intentions()
    {
        $intention = factory( Intention::class )->create([ 'user_id' => auth()->user()->id ]);
        $this->manager->deleteIntention( $intention );
        $this->assertDatabaseMissing( 'intentions', [
            'title' => $intention->title
        ]);
    }
}

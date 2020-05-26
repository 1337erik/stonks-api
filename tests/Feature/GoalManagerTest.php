<?php

namespace Tests\Feature;

use App\Goal;
use App\Managers\GoalManager;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GoalManagerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $manager;
    protected $erik;
    protected $other_guy;

    public function setUp() : void
    {
        parent::setUp();

        $this->manager = new GoalManager();
        $this->erik = factory( User::class )->create();

        $this->will = factory( User::class )->create();
        $this->actingAs( $this->erik );

        $this->assertEquals( $this->erik->id, auth()->user()->id );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function goals_manager_read_test()
    {
        factory( Goal::class, 5 )->create([ 'user_id' => auth()->user()->id ]);

        $eriks = $this->manager->getGoalsForUser( auth()->user()->id );
        $this->assertCount( 5, $eriks );

        $wills = $this->manager->getGoalsForUser( $this->will->id );
        $this->assertCount( 0, $wills );
    }

    /**
     * @test
     */
    public function a_user_can_create_goals()
    {
        $goal = factory( Goal::class )->make();
        $this->manager->addGoalForUser( auth()->user(), $goal );
        $this->assertDatabaseHas( 'goals', [

            'user_id' => auth()->user()->id,
            'title' => $goal->title
        ]);

        $wills = $this->manager->getGoalsForUser( $this->will->id );
        $this->assertCount( 0, $wills );
    }

    /**
     * @test
     */
    public function a_user_can_update_goals()
    {
        $goal = factory( Goal::class )->create([ 'user_id' => auth()->user()->id ]);
        $saved = $goal->title;

        $new_data = factory( Goal::class )->make([ 'user_id' => auth()->user()->id ])->toArray();
        $this->manager->updateGoal( $goal, $new_data );

        $this->assertDatabaseMissing( 'goals', [

            'user_id' => auth()->user()->id,
            'title' => $saved
        ]);
        $this->assertDatabaseHas( 'goals', [

            'user_id' => auth()->user()->id,
            'title' => $new_data[ 'title' ]
        ]);
    }

    /**
     * @test
     */
    public function a_user_can_delete_goals()
    {
        $goal = factory( Goal::class )->create([ 'user_id' => auth()->user()->id ]);
        $this->manager->deleteGoal( $goal );
        $this->assertDatabaseMissing( 'goals', [
            'title' => $goal->title
        ]);
    }
}

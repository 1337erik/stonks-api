<?php

namespace Tests\Feature;

use App\Managers\PostManager;
use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostManagerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $manager;
    protected $erik;
    protected $other_guy;

    public function setUp() : void
    {
        parent::setUp();

        $this->erik = factory( User::class )->create();

        $this->will = factory( User::class )->create();
        $this->actingAs( $this->erik );

        $this->manager = new PostManager();

        $this->assertEquals( $this->erik->id, auth()->user()->id );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function posts_manager_pagination()
    {
        factory( Post::class, 10 )->create([ 'user_id' => auth()->user()->id ]);

        $posts = $this->manager->getPaginated();
        $this->assertCount( 10, $posts[ 'results' ] );
        $this->assertEquals( 10, $posts[ 'total' ] );
    }

    /**
     * @test
     */
    public function posts_manager_get_sinlge()
    {
        $post = factory( Post::class, 1 )->create([ 'user_id' => auth()->user()->id ])->first();

        $fetched = $this->manager->getSingle( $post );
        $this->assertEquals( $fetched->id, $post->id );
    }
}

<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var User $god
     */
    public $god;

    public function setUp() : void
    {
        parent::setUp();

        $this->seed();

        /**
         * @var User $god
         */
        $this->god = User::first();
        $this->actingAs( $this->god );

        $this->withoutExceptionHandling();

        // $this->assertEquals( $this->god->id, auth()->user()->id );
    }
}
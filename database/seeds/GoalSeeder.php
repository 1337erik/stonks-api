<?php

use App\Goal;
use App\User;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::get()->each( function( $user ){

            factory( Goal::class, 5 )->create([ 'user_id' => $user->id ]);
        });
    }
}

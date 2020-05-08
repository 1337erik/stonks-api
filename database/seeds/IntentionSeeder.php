<?php

use App\Intention;
use App\User;
use Illuminate\Database\Seeder;

class IntentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::get()->each( function( $user ){

            factory( Intention::class, 5 )->create([ 'user_id' => $user->id ]);
        });
    }
}

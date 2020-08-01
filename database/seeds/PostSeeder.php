<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::get()->each( function( $user ){

            factory( Post::class, 25 )->create([ 'user_id' => $user->id ]);
        });
    }
}

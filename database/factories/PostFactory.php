<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define( Post::class, function (Faker $faker) {
    return [
        'slug' => $faker->words( 3, true ),
        'title' => $faker->sentence(),
        'content' => $faker->paragraphs( 3, true ),
        'user_id' => function(){

            return factory( User::class )->create()->id;
        }
    ];
});

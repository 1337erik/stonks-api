<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Goal;
use App\User;
use Faker\Generator as Faker;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'user_id' => function(){

            return factory( User::class )->create()->id;
        },
        'title' => $faker->words( 4, true ),
        'description' => $faker->paragraph,
        'fulfill_by' => $faker->dateTimeBetween( 'now', '+1 year' )
    ];
});

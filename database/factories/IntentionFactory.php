<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Intention;
use App\User;
use Faker\Generator as Faker;

$factory->define(Intention::class, function (Faker $faker) {
    return [
        'user_id' => function(){

            return factory( User::class )->create()->id;
        },
        'title' => $faker->words( 4, true ),
        'fulfill_by' => $faker->dateTimeBetween( 'now', '+1 year' )
    ];
});

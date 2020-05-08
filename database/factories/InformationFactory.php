<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Information;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'title' => $faker->words(),
        'type' => $faker->words(),
        'description' => $faker->paragraphs()
    ];
});

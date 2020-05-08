<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Source;
use Faker\Generator as Faker;

$factory->define(Source::class, function (Faker $faker) {
    return [
        'title' => $faker->words(),
        'type' => $faker->words(),
        'link' => $faker->url,
        'description' => $faker->paragraphs()
    ];
});

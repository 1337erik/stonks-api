<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Managers\QuoteManager;
use App\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {

    $quo = new QuoteManager();
    $type = $quo->getRandomQuoteCategory();
    switch( $type ){

        case Quote::CATEGORY_HERO:

            $body = $faker->words( 4 );
            break;
        case Quote::CATEGORY_PARAGRAPH:
        default:

            $body = $faker->paragraph;
            break;
    }

    return [

        'category' => $faker->word,
        'body' => $body
    ];

});
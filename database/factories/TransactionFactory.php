<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\TransactionTypes;
use App\Transaction;
use App\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

    return [

        'amount'         => $faker->random_int( 1000, 10000 ),
        'type'           => TransactionTypes::random(),
        'effective_date' => $faker->dateTime(),
        'user_id'        => function(){

            return factory( User::class )->create()->id;
        },
    ];
});

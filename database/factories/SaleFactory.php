<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Sale;
use App\Product;
use App\User;
use App\Address;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'user_id' => User::find($faker->numberBetween(1, 50)),
        'address_id' => Address::find($faker->numberBetween(1, 50)),
        'purchase_date' => $faker->dateTime($max = 'now', $timezone= null),
        'shipped' => $faker->randomDigitNotNull > 5,
        'completed' => $faker->randomDigitNotNull > 5,
    ];
});

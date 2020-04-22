<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'user_name' => $faker->word,
        'postal_code' => $faker->numberBetween(1500, 5000),
        'address' => $faker->address,
        'product_id' => App\Product::find($faker->numberBetween(1, 150)),
        'quantity' => $faker->numberBetween(0, 15),
        'sended' => $faker->randomDigitNotNull > 5,
    ];
});

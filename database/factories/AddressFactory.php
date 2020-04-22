<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'address_number' => $faker->buildingNumber,
        'floor' => $faker->numberBetween(0, 30),
        'departament' => $faker->randomLetter,
        'client_id' => App\User::find($faker->numberBetween(1, 50)),
    ];
});

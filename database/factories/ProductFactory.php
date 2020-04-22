<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->paragraph(10),
        'price' => $faker->randomFloat(2, 0, 9999),
        'stock' => $faker->numberBetween(10, 150),
        'url' => $faker->unique()->regexify('[A-Z0-9]+-[A-Z0-9]+-[A-Z]'),
        'category_id'=> App\Category::find($faker->numberBetween(1, 5)),
        'img_url' => 'uS4gfvm8yep0FoJzbEAAvbmJRIiAUAA3ebkm7bZE.jpeg',
    ];
});

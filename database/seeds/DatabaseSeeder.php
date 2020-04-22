<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
use App\Address;
use App\Sale;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->create();
        factory(Category::class)->times(5)->create();
        $products = factory(Product::class)->times(150)->create();
        factory(Address::class)->times(50)->create();
        factory(Sale::class)->times(30)->create();

        foreach($users as $user) {
            $user->products()->saveMany($products->random(5));
        }

    }
}

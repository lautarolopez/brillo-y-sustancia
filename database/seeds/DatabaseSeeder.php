<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $users[] = User::create([
            'name' => 'Test',
            'last_name' => 'Guy',
            'email' => 'test@guy.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testing'), // password
            'isAdmin' => true,
            'profile_img_url' => 'profilepic.png', 
            'remember_token' => Str::random(10),
        ]);
        factory(Category::class)->times(5)->create();
        $products = factory(Product::class)->times(150)->create();
        factory(Address::class)->times(50)->create();
        $sales = factory(Sale::class)->times(30)->create();
        

        
        foreach($users as $user) {
            $user->cart()->saveMany($products->random(5));
        }

        foreach($sales as $sale) {
            $sale->products()->saveMany($products->random(5));
        }
    }
}

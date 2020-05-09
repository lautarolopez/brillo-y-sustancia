<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Address;

class SalesController extends Controller
{
    public function checkOutCart() {
        $products = Auth::user()->cart()->get();
        $newSale = Sale::create([
            'user_id' => 52,
            'address_id' => 1,
            'quantity' => 1,
            'purchase_date' => now(),
            'shipped' => false,
            'completed' => false,
        ]);
        foreach ($products as $product) {
            $newSale->products()->attach($product);
        }
        dd($newSale);
    }
}

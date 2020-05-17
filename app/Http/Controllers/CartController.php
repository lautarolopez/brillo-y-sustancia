<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart($product_name){
        $products = Product::where('url', '=' , $product_name)->get();
        $user = Auth::user();
        if(!$user->cart()->get()->contains($products[0])){
            $user->cart()->attach($products[0], array('quantity' => 1));
        }        
        $user->update(['last_update-cart' => now()]); 
        return redirect()->route('products.show', $product_name);
    }

    public function removeFromCart(Request $req){
        $products = Product::where('url', '=' , $req['url'])->get();
        $user = Auth::user();
        $user->update(['last_update-cart' => now()]); 
        $user->cart()->detach($products[0]);

        return redirect()->route('cart');
    }

    public function show(){
        $products = Auth::user()->cart()->get();
        return view('cart', compact('products'));
    }

    public function cleanInactiveCarts() {
        $users = User::all();
        foreach ($users as $user){
            $date = $user->last_cart_update;
            if ((now()->diff($date)->days) > 7) {
               $products = $user->cart()->get();
               foreach ($products as $product){
                   $user->cart()->detach($product);
               } 
            }
        }
        return view('admin.dashboard');
    }
}

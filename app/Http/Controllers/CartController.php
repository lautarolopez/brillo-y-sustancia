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
        return redirect()->back();
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
        $warning = false;
        foreach ($products as $product){
            if ($product->users()->get()->count() !== 1){
                $warning = true;
                break;
            }
        }
        return view('cart', [
            'products' => $products,
            'warning' => $warning,
        ]);
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
        return redirect()->route('users.index');
    }
}

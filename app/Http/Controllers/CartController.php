<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart($product_name){
        $products = Product::where('url', '=' , $product_name)->get();
        if(!Auth::user()->cart()->get()->contains($products[0])){
            Auth::user()->cart()->attach($products[0], array('quantity' => 1));
        }        
        return redirect()->route('products.show', $product_name);
    }

    public function removeFromCart($product_url){
        $products = Product::where('url', '=' , $product_url)->get();
        Auth::user()->cart()->detach($products[0]);
        return redirect()->route('cart');
    }

    public function show(){
        $products = Auth::user()->cart()->get();
        return view('cart', compact('products'));
    }
}

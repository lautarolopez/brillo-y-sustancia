<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Address;

class SalesController extends Controller
{
    public function checkOutCart(Request $req) {
        $products = Auth::user()->cart()->get();
        foreach($products as $product){
            $product->pivot->quantity = $req[$product->id];
            $product->pivot->save();
        }
        $addresses = Auth::user()->addresses()->get();
        return view('addresses.index', [
            'addresses' => $addresses,
            'cart' => true,
        ]);
    }

    public function completeSale(Request $request) {
        $products = Auth::user()->cart()->get();
        $newSale = Sale::create([
                'user_id' => Auth::user()->id,
                'address_id' => $request['address'],
                'purchase_date' => now(),
                'shipped' => false,
                'completed' => false,
            ]);
        foreach ($products as $product) {
            $newSale->products()->attach($product, array('quantity' => $product->pivot->quantity));
            Auth::user()->cart()->detach($product);
        }
        return redirect()->route('home');
    }

    public function index() {
        $sales = Sale::all(); 
        return view('admin.salesIndex', [
            'sales' => $sales,
        ]);
    }
}

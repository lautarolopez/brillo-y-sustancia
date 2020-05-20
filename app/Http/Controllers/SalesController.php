<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Address;
use App\Product;

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
            ]
        );
    }

    public function completeSale(Request $request) {
        $products = Auth::user()->cart()->get();
        Auth::user()->update(['last_update_cart' => now()]);
        $newSale = Sale::create([
                'user_id' => Auth::user()->id,
                'address_id' => $request['address'],
                'purchase_date' => now(),
                'shipped' => false,
                'completed' => false,
            ]);
        foreach ($products as $product) {
            $product->update([
                'stock' => $product->stock - $product->pivot->quantity,
            ]);
            $newSale->products()->attach($product, array('quantity' => $product->pivot->quantity));
            Auth::user()->cart()->detach($product);
        }
        return redirect()->route('home');
    }

    public function index() {
        $sales = Sale::all();
        $salesInformation = [];
        foreach ($sales as $sale) {
            $salesInformation[] = [
                'sale' => $sale,
                'products' => $sale->products()->get(),
                'client' => $sale->client()->get()[0],
                'address' => $sale->address()->get()[0],
            ]; 
        }
        return view('admin.salesIndex', [
            'salesInformation' => $salesInformation,
        ]);
    }

    public function setShipped (Sale $sale) {
        $sale->update([
            'shipped' => true,
        ]);
        return redirect()->route('sales.index');
    }

    public function setCompleted (Sale $sale) {
        $sale->update([
            'completed' => true,
        ]);
        return redirect()->route('sales.index');
    }
}

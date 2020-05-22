<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\User;
use App\Address;
use App\Product;
use App\PaymentMethods\MercadoPago;

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

    public function redirectToMercadoPago(Request $request) {
        $products = Auth::user()->cart()->get();
        Auth::user()->update(['last_update_cart' => now()]);
        $newSale = new Sale();
        $newSale->user_id = Auth::user()->id;
        $newSale->address_id = $request['address'];
        $newSale->purchase_date = now();
        $newSale->shipped = false;
        $newSale->completed = false;
        $method = new MercadoPago();
        return view('mp_checkout', [
            'preference' => $method->processMercadoPagoPayment($newSale, $products),
        ]);
    }

    public function successMercadoPagoPayment(Request $req){
        if ($req['payment_status'] === 'approved'){
            return $this->paymentSuccess();
        } else {
            return $this->paymentFailure();    
        }
        
    }

    public function paymentSuccess(){
        $preference = session('preference');
        $newSale = Sale::create([
            'user_id' => Auth::user()->id,
            'address_id' => $preference->additional_info,
            'purchase_date' => now(),
            'shipped' => false,
            'completed' => false,
        ]);
        $products = Auth::user()->cart()->get();
        foreach ($products as $product) {
            $product->update([
                'stock' => $product->stock - $product->pivot->quantity,
            ]);
            $newSale->products()->attach($product, array('quantity' => $product->pivot->quantity));
            Auth::user()->cart()->detach($product);
        }
        session(['sale_success' => true]);
        return view('home');
    }


    public function paymentFailure(){
        session(['sale_failure' => true]);
        return view('home');
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

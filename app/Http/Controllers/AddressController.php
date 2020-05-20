<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Address;
use App\User;

class AddressController extends Controller
{
     public function index(){
        $addresses = Auth::user()->addresses()->get();
        return view('addresses.index', [
            'addresses' => $addresses,
            'cart' => false,
        ]);
    }


    public function create(Request $cart){
        return view('addresses.create', [
            'address' => new Address,
            'cart' => $cart,
        ]);
    }

    public function store(Request $request){
        $reqAux = $request->validate([
            'street' => 'required',
            'address_number' => 'required|min:1|max:10000',
        ], [
            'street.required' => 'Necesitamos la calle!',
            'address_number.required' => 'Necesitamos el número!',
            'address_number.min' => 'El número no es válido!',
            'address_number.max' => 'El número no es válido!',
        ]);
        Address::create([
            'street' => $reqAux['street'],
            'address_number' => $reqAux['address_number'],
            'floor' => $request['floor'],
            'departament' => $request['departament'],
            'user_id' => Auth::user()->id,
        ]); 

        return view('addresses.index', [
            'addresses' => Auth::user()->addresses()->get(),
            'cart' => $request['cart'],
        ]);;
    }

}

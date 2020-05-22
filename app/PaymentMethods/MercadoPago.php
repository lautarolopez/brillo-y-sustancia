<?php

namespace App\PaymentMethods;

use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\Payer;
use MercadoPago\SDK;
use App\Sale;
use App\User;
use App\Address;
use App\Product;

class MercadoPago{

    public function __construct() {
        SDK::setClientId(
            env('MP_CLIENT')
        );
        SDK::setClientSecret(
            env('MP_SECRET')
        );
        SDK::setAccessToken(
            env('MP_ACCESS_TOKEN')
        );
        SDK::setPublicKey(
            env('MP_PUBLIC_KEY')
        );
    }   

    public function processMercadoPagoPayment(Sale $sale, $products){
        $user = User::find($sale->user_id);
        $address = Address::find($sale->address_id);
        $preference = new Preference();
        $items = [];
        $item = new Item();
        $payer = new Payer();
        foreach ($products as $product) {
            $item->id = $product->id;
            $item->title = $product->name;
            $item->description = $product->description;
            $item->quantity = $product->pivot->quantity;
            $item->unit_price = $product->price;
            $item->picture_url = $product->img_url;
            $item->currency_id = 'ARS';
            $item->category_id = $product->category_id;
            $items[] = $item;
        };
        $payer->name = $user->name;
        $payer->surname = $user->last_name;
        $payer->email = $user->email;
        $payer->address = [
            'street' => $address->street,
            'street_number' => $address->address_number,
            'zip_code' => '',
        ];
        $preference->items = $items;
        $preference->payer = $payer;
        $preference->external_reference = $sale->id;
        $preference->additional_info = $address->id;
        $preference->binary_mode = true;
        $preference->auto_return = 'all';
        $preference->back_urls = [
            "success" => 'http://c7a320c1.ngrok.io/payment-success',
            "failure" => 'http://c7a320c1.ngrok.io/payment-failure',
        ];
        $preference->save();
        session(['preference' => $preference]);
        return $preference;
    }


}
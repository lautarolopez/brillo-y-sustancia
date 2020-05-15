<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;
use App\Address;

class Sale extends Model
{
    protected $guarded = [];


    public function products(){
        return $this->belongsToMany(Product::class, 'sales_products', 'sale_id', 'product_id')->withPivot('quantity');
    }
    
    public function client() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id');
    }

}

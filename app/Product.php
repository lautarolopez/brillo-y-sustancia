<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use App\Sale;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'url';
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'users_products', 'product_id', 'user_id');
    }

    public function sales(){
        return $this->hasMany(Sale::class, 'product_id');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function categoryIndex($category){
        $category_found = Category::where('name', '=', $category)->get()[0];
        $products = Product::where('category_id', '=', $category_found->id)->get();
        return view('products.index', compact('products'));
    }

    public function show(Product $product){
        return view('products.show', [
            'product' => $product,
            'category' => Category::find($product->category_id)->name,
        ]);
    }

    public function create(){
        return view('products.create', [
            'product' => new Product
        ]);
    }

    public function store(StoreProductRequest $request){

        $reqAux = $request->validated();
        $img_url = basename($request->file('image')->store('public'));
        
        $auxProduct = [
            'name' => $reqAux['name'],
            'description' => $reqAux['description'],
            'price' => $reqAux['price'],
            'stock' => $reqAux['stock'],
            'category_id' => $reqAux['category_id'],
            'url' => $reqAux['url'],
            'img_url' => $img_url
        ];

        Product::create($auxProduct); 

        return redirect()->route('products.index');
    }


    public function edit(Product $product){
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, StoreProductRequest $request){
        $reqAux = $request->validated();
        
        $img_url = basename($request->file('image')->store('public'));

        $auxProduct = [
            'name' => $reqAux['name'],
            'description' => $reqAux['description'],
            'price' => $reqAux['price'],
            'stock' => $reqAux['stock'],
            'id_category' => $reqAux['category_id'],
            'url' => $reqAux['url'],
            'img_url' => $img_url
        ];

        $product->update($auxProduct); 

        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product){
        $product->delete();
        
        return redirect()->route('products.index');
    }
}

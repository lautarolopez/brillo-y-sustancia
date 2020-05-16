<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(12);
        return view('products.index', [
            'products' => $products,
            'category' => 'Productos',
        ]);
    }

    public function categoryIndex($category){
        $category_found = Category::where('name', '=', $category)->get()[0];
        $products = Product::where('category_id', '=', $category_found->id)->paginate(12);
        return view('products.index', [
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function indexAdmin(){
        $products = Product::all();
        return view('admin.productsIndex', [
            'products' => $products,
        ]);
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
        $img_url = basename($request->file('image')->store('public/product_pictures'));
        $product_url = preg_replace('/\s+/', '-',$reqAux['name']);
        $auxProduct = [
            'name' => $reqAux['name'],
            'description' => $reqAux['description'],
            'price' => $reqAux['price'],
            'stock' => $reqAux['stock'],
            'category_id' => $reqAux['category_id'],
            'url' => $product_url,
            'img_url' => $img_url
        ];

        Product::create($auxProduct); 

        return redirect()->route('admin-products.index');
    }


    public function edit(Product $product){
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, StoreProductRequest $request){
        $reqAux = $request->validated();
        
        $img_url = basename($request->file('image')->store('public'));
        $product_url = preg_replace('/\s+/', '-',$reqAux['name']);
        $auxProduct = [
            'name' => $reqAux['name'],
            'description' => $reqAux['description'],
            'price' => $reqAux['price'],
            'stock' => $reqAux['stock'],
            'id_category' => $reqAux['category_id'],
            'url' => $product_url,
            'img_url' => $img_url
        ];

        $product->update($auxProduct); 

        return redirect()->route('admin-products.index');
    }

    public function destroy(Product $product){
        $product->delete();
        
        return redirect()->route('admin-products.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categoriesIndex', [
            'categories' => $categories,
        ]); 
    }

    public function create(){
        return view('admin.createCategory', [
            'category' => new Category,
        ]);
    }

    public function store(Request $request){
        $reqAux = $request->validate([
            'name' => 'unique:App\Category,name',
        ],[
            'unique' => 'Ya existe una categoría con ese nombre :c',
        ]);
        Category::create([
            'name' => $reqAux['name'],
        ]); 

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        
        return redirect()->route('categories.index');
    }

}

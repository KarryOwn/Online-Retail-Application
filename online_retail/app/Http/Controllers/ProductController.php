<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request) {
        $category = $request->query('category');
        $products = Product::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();
    
        return view('home.shop', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); 
        return view('components.show', compact('product'));
    }

    public function showCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products; 
        return view('shop', compact('products', 'category'));
    }
}

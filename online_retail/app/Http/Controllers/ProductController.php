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
        return view('components.productDetail', compact('product'));
    }

    public function getProductsByCategory($category)
    {
        $products = Product::where('category', $category)->get();

        return view('home.categoryShow', compact('products', 'category'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get();

        return view('home.shop', compact('products'));
    }
}

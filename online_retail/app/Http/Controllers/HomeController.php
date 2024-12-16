<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        //$order = Order::all()->count();
        //$deliverd = Order::where('status','Deliverd')->get()->count();

        return view('admin.index',compact('user','product'
        //,'order','deliverd'
        ));
    }

    public function home() {
        $products = Product::all();
        return view('home.index', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    public function index() {
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $completed = Order::where('status','Completed')->get()->count();

        return view('admin.index',compact('user','product','order','completed'));
    }

    public function home() {
        $products = Product::all();
        return view('home.index', compact('products'));
    }
}

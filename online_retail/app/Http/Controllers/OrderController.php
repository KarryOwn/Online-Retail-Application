<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function userOrders()
    {
        $orders = auth()->user()->orders; 
        return view('orders.userOrder', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        return view('cart.index', compact('cartItems'));
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity > 0 ? $quantity : 1;
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->user_id == auth()->id()) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('cart.index')->with('error', 'Item could not be removed.');
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('shop')->with('success', 'Order placed successfully!');
    }

}

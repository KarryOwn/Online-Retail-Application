@extends('home.layout')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Product</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Quantity</th>
                    <th class="border px-4 py-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->product->name }}</td>
                    <td class="border px-4 py-2">${{ number_format($item->product->price, 2) }}</td>
                    <td class="border px-4 py-2">{{ $item->quantity }}</td>
                    <td class="border px-4 py-2">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('checkout') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                Proceed to Checkout
            </a>
        </div>
    @endif
</div>
@endsection
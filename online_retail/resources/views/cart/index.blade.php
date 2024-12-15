@extends('home.layout')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Your Cart</h1>

    @if($cartItems->isEmpty())
        <div class="text-center">
            <p class="text-lg text-gray-500">Your cart is empty.</p>
            <a href="/shop" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                Browse Products
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cartItems as $item)
            <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                <!-- Product Image -->
                <img src="{{asset('/products/'.$item->product->image)}}" 
                     alt="{{ $item->product->title }}" 
                     class="w-32 h-32 object-cover mb-4">
                
                <!-- Product Details -->
                <h2 class="text-lg font-semibold">{{ $item->product->title }}</h2>
                <p class="text-gray-500">Price: ${{ number_format($item->product->price, 2) }}</p>
                <p class="text-gray-500">Quantity: {{ $item->quantity }}</p>
                <p class="text-gray-900 font-semibold mt-2">Subtotal: ${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                
                <!-- Actions -->
                <div class="flex space-x-4 mt-4">
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                            Remove
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Checkout Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('checkout') }}" class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded text-lg">
                Proceed to Checkout
            </a>
        </div>
    @endif
</div>
@endsection

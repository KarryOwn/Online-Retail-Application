@extends('home.layout')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/2 px-4">
            <img src="{{asset('/products/'.$product->image)}}" 
                 alt="{{ $product->name }}" 
                 class="rounded-lg shadow-lg">
        </div>
        <div class="w-full md:w-1/2 px-4">
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <p class="text-gray-500 mb-4">{{ $product->category }}</p>
            <p class="text-gray-700 font-bold text-2xl mb-4">
                ${{ number_format($product->price, 2) }}
            </p>
            <p class="text-gray-500 mb-6">
                {{ $product->description ?? 'No description available.' }}
            </p>
            <p class="text-gray-500 mb-4">
                <strong>Stock:</strong> {{ $product->quantity > 0 ? $product->quantity . ' available' : 'Out of stock' }}
            </p>
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('home.layout')

@section('content')
<div class="container mx-auto py-8">
    <!-- Order Summary -->
    <div class="border rounded-lg shadow-md p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Order #{{ $order->id }}</h1>
        <div class="flex flex-col md:flex-row justify-between">
            <div class="mb-4 md:mb-0">
                <p class="text-lg"><strong>Status:</strong> 
                    <span class="px-2 py-1 rounded text-white {{ $order->status === 'Completed' ? 'bg-green-500' : ($order->status === 'Pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                        {{ $order->status }}
                    </span>
                </p>
                <p class="text-lg"><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                <p class="text-lg"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Order placed on: {{ $order->created_at->format('F d, Y') }}</p>
                <p class="text-gray-500 text-sm">Last updated: {{ $order->updated_at->format('F d, Y h:i A') }}</p>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <h2 class="text-2xl font-bold mt-8 mb-4 text-gray-800">Order Items</h2>
    <div class="bg-white border rounded-lg shadow-md p-6">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 text-left">Product</th>
                    <th class="border px-4 py-2 text-center">Price</th>
                    <th class="border px-4 py-2 text-center">Quantity</th>
                    <th class="border px-4 py-2 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->product->title }}</td>
                    <td class="border px-4 py-2 text-center">${{ number_format($item->price, 2) }}</td>
                    <td class="border px-4 py-2 text-center">{{ $item->quantity }}</td>
                    <td class="border px-4 py-2 text-right">${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex justify-end space-x-4">
        <a href="{{route('userOrders')}}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
            Back to Orders
        </a>
    </div>
</div>
@endsection

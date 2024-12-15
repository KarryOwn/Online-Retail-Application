@extends('home.layout')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Your Orders</h1>

    @if($orders && $orders->isEmpty())
        <div class="text-center">
            <p class="text-lg text-gray-500">You have no orders yet.</p>
            <a href="/shop" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                Start Shopping
            </a>
        </div>
    @else
        <div class="bg-white border rounded-lg shadow-md p-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Order ID</th>
                        <th class="border px-4 py-2 text-left">Status</th>
                        <th class="border px-4 py-2 text-right">Total Price</th>
                        <th class="border px-4 py-2 text-center">Date</th>
                        <th class="border px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">
                            <span class="px-2 py-1 rounded text-white {{ $order->status === 'Completed' ? 'bg-green-500' : ($order->status === 'Pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="border px-4 py-2 text-right">${{ number_format($order->total_price, 2) }}</td>
                        <td class="border px-4 py-2 text-center">{{ $order->created_at->format('F d, Y') }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('orders.show', $order->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">
                                View Details
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

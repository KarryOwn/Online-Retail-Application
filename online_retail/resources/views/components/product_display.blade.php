<div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold mb-4 text-center text-white">New Shit</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600 mt-2">${{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('product.show', $product->id) }}" class="block mt-4 text-blue-500 hover:underline">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
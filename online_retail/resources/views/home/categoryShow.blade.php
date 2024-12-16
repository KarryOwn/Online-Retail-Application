<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body body class="bg-cover bg-center min-h-screen flex flex-col bg-cyan-950">
  @include('components.navbar')
  <main class="p-4 flex-grow">
    @include('components.searchbar')
  <div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6 text-indigo-50 text-center">Category: {{ ucfirst($category) }}</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-md flex flex-col">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{asset('/products/'.$product->image)}}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-48 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4 flex-grow">
                        <h2 class="text-lg font-semibold">
                            <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                        </h2>
                        <p class="text-gray-700 font-bold mt-2">
                            ${{ number_format($product->price, 2) }}
                        </p>
                        <p class="text-gray-500 text-sm mt-2">{{ $product->quantity > 0 ? 'In Stock' : 'Out of Stock' }}</p>
                    </div>
                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-auto">
                        @csrf
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-b-lg">
                            Add to Cart
                        </button>
                    </form>
                </div>
        @empty
            <p class="text-gray-500 col-span-3">No products found in this category.</p>
        @endforelse
    </div>
</div>
  </main>
  @include('components.footer')
</body>
</html>

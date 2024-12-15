<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body body class="bg-cover bg-center h-screen flex flex-col bg-cyan-950">
  @include('components.navbar')
  <main class="p-4">
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Our Products</h1>
    
    @if($products->isEmpty())
        <p class="text-center text-gray-500">No products available at the moment. Please check back later.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md p-4">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ $product->image ? asset($product->image) : asset('images/default-product.jpg') }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-48 object-cover rounded-t-lg">
                </a>
                <h2 class="text-lg font-semibold">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </h2>
                        <p class="text-gray-700 font-bold mt-2">
                            ${{ number_format($product->price, 2) }}
                        </p>
                        <p class="text-gray-500 text-sm mt-2">{{ $product->quantity > 0 ? 'In Stock' : 'Out of Stock' }}</p>
                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
  </main>
  @include('components.footer')
</body>
</html>

<div class="container mx-auto py-8">
    <div class="flex flex-wrap -mx-2"> <!-- Reduce spacing between boxes -->
        @foreach($products as $product)
            <a href="{{ route('product.show', $product->id) }}" 
               class="w-full sm:w-1/2 lg:w-1/4 p-2 cursor-pointer group"> <!-- Adjust width and padding -->
                <div class="flex bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <!-- Product Image -->
                    <div class="w-1/3">
                        <img src="{{asset('/products/'.$product->image)}}"
                             alt="{{ $product->name }}" 
                             class="rounded-l-lg object-cover h-24 w-full"> <!-- Set fixed height -->
                    </div>
                    
                    <!-- Product Details -->
                    <div class="w-2/3 p-2"> <!-- Reduce padding -->
                        <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-500"> <!-- Reduce font size -->
                            {{ $product->title }}
                        </h2>
                        <p class="text-gray-700 font-bold text-md"> <!-- Adjust font size -->
                            {{ number_format($product->price, 2) }}$
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

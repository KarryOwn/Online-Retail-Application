
<div class="flex justify-center mb-6">
    <form method="GET" action="{{ route('shop.index') }}" class="flex bg-gray-100 rounded-lg overflow-hidden w-full max-w-md">
        <input 
            type="text" 
            name="search" 
            placeholder="Search for games..." 
            value="{{ request('search') }}" 
            class="flex-grow px-4 py-2 outline-none bg-gray-100 text-gray-700"
        >
        <button type="submit" class="bg-red-600 text-white px-4 py-2 hover:bg-red-700">
            Search
        </button>
    </form>
</div>

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{asset('/admincss/img/pikachu.png')}}" 
           class="h-8"/>
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Game</span>
    </a>
    <div class="flex md:order-2">
      @if (Route::has('login'))
        <nav class="flex items-center space-x-4">
          @auth
            <!-- Cart Icon -->
            <a href="{{ route('cart.index') }}" class="relative rounded-md px-3 py-2 text-black transition hover:text-black/70 dark:text-white dark:hover:text-white/80">
              <svg class="h-9 lg:h-10 p-2 text-gray-500" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-9x"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z"></path></svg>
              @if(session('cart') && count(session('cart')) > 0)
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                  {{ count(session('cart')) }}
                </span>
              @endif
            </a>

            <!-- Profile and Logout -->
            <a href="{{ route('profile.edit') }}" class="rounded-md px-3 py-2 text-black transition hover:text-black/70 dark:text-white dark:hover:text-white/80">
              Profile
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
              @csrf
              <button type="submit" class="rounded-md px-3 py-2 text-black transition hover:text-black/70 dark:text-white dark:hover:text-white/80">
                Log Out
              </button>
            </form>
          @else
            <!-- Login and Register Buttons -->
            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 dark:text-white dark:hover:text-white/80">
              Log in
            </a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 dark:text-white dark:hover:text-white/80">
                Register
              </a>
            @endif
          @endauth
        </nav>
      @endif
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li><a href="/" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a></li>
        <li><a href="/shop" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Shop</a></li>
        <li class="relative group">
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
            Genre
          </a>
          <!-- Dropdown Menu -->
          <div class="absolute left-0 z-50 hidden bg-white border rounded-lg shadow-md group-hover:block dark:bg-gray-800 dark:border-gray-700">
            <a href="/shop?category=action" class="block px-4 py-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Action</a>
            <a href="/shop?category=adventure" class="block px-4 py-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Adventure</a>
            <a href="/shop?category=rpg" class="block px-4 py-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">RPG</a>
            <a href="/shop?category=strategy" class="block px-4 py-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Strategy</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retail Store</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body body class="bg-cover bg-center min-h-screen flex flex-col bg-cyan-950">
  @include('components.navbar')
  <main class="p-4 flex-grow flex justify-center">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-3xl">
      @yield('content')
    </div>
  </main>
  @include('components.footer')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retail Store</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body body class="bg-cover bg-center h-screen flex flex-col bg-cyan-950">
  @include('components.navbar')
  <main class="p-4">
  @yield('content')
  </main>
  @include('components.footer')
</body>
</html>

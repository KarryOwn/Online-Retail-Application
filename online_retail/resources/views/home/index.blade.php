<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retail Store</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body body class="bg-cover bg-center min-h-screen flex flex-col bg-cyan-950 ">
  @include('components.navbar')

  <div class="flex items-start justify-center mt-4 px-4">
      <div class="w-full max-w-30xl">
          @include('components.slider')
      </div>
  </div>

  <main class="p-4 flex-grow">
  @include('components.product_display')
  </main>
  @include('components.footer')
</body>
</html>

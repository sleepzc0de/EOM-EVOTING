<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>{{ $title }}</title>
</head>
<body class="h-full">
    <x-nav-bar></x-nav-bar>
    <x-header>{{ $title }}</x-header>
<div class="min-h-full">
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>
  </div>
</body>
</html>


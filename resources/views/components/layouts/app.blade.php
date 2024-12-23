<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Page Title' }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Styles / Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50" x-data x-on:click="$dispatch('search:clear-results')">
  <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative flex flex-col items-center justify-center selection:bg-blue-700 selection:text-white">
      <div class="relative w-full max-w-2xl lg:max-w-7xl">
        <nav class="bg-gray-900">
          <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
            <div class="w-full block" id="navbar-default">
              <ul class="font-medium flex flex-col p-2 mr-2 md:p-0 mt-2 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:border-0">
                <li>
                  <a href="/" class="block py-2 px-3 text-blue-500">Home</a>
                </li>
                @auth
                  <li>
                    <a href="/dashboard" class="block py-2 px-3 text-blue-500">Admin Dashboard</a>
                  </li>
                @endauth
                @guest
                  <li>
                    <a href="/login" class="block py-2 px-3 text-blue-500">Login</a>
                  </li>
                @endguest
              </ul>
            </div>
            <livewire:search placeholder="Type something to search" />
          </div>
        </nav>

        <main class="mt-6">
          {{ $slot }}
        </main>

      </div>
    </div>
  </div>
  <script>
    document.addEventListener('search:clear-results', function () {
      console.log('Cleared results')
    })
  </script>
</body>
</html>

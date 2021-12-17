<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose</title>
</head>
<body>
  @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
              @endif
          @endauth
      </div>
  @endif
  <h1 class="bg-yellow-500 text-gray-50 text-5xl">Choose Website</h1>
  <br>
  <br>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/songs">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Songs</button>
      </form>
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/albums">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Albums</button>
      </form>
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/bands">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Bands</button>
      </form>
    </div>
</body>
</html>

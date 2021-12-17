<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bands - Index</title>
    <style media="screen">
      .parent {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 70px 2fr 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
      }

      .div1 { grid-area: 1 / 1 / 2 / 3; }
      .div2 { grid-area: 2 / 1 / 3 / 3; }
      .div3 { grid-area: 3 / 1 / 4 / 3; }
    </style>
</head>
<body>
  <div class="parent">
    <div class="div1">
      <h1 class="bg-green-500 text-gray-50 text-5xl">Bands</h1>
    </div>
    <div class="div2">
      <ul class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @foreach($bands as $band)
          <li class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><a href="bands/{{ $band->id }}">{{ $band->name }}</a></li>
        @endforeach
      </ul>
    </div>
    @if (Auth::check())
    <div class="div3">
      <form action="/bands/create">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
      </form>
    </div>
    @endif
  </div>
</body>
</html>

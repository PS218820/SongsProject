<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bands - Edit</title>
    <style media="screen">
    .parent {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: 70px 2fr 1fr;
      grid-column-gap: 0px;
      grid-row-gap: 0px;
    }

    .div1 { grid-area: 1 / 1 / 2 / 3; }
    .div2 { grid-area: 2 / 1 / 4 / 2; }
    .div3 { grid-area: 2 / 2 / 4 / 3; }
    </style>
</head>
<body>
  <div class="parent">
    <div class="div1">
      <h1 class="bg-green-500 text-gray-50 text-5xl">Edit</h1>
    </div>
    <div class="div2">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('bands.update',[$band->id])}}" method="POST">
            @csrf
            @method('PUT')
            <p>name</p>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ $band->name }}" placeholder="Name">
            <br>
            <p>genre</p>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="genre" placeholder="Detail">{{ $band->genre }}</textarea>
            <br>
            <p>founded</p>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="founded" placeholder="Detail">{{ $band->founded }}</textarea>
            <p>active til</p>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="active_til" placeholder="Detail">{{ $band->active_til }}</textarea>
            <br>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
      </form>

    </div>
    <div class="div3">
      <form action="/bands">
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to home</button>
      </form>
      <form action="{{ route('bands.destroy', [$band->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
      </form>
    </div>
  </div>
</body>
</html>

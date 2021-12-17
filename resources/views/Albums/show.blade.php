<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums - Show</title>
    <style media="screen">
    .parent {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: 70px 1fr 1fr;
      grid-column-gap: 0px;
      grid-row-gap: 0px;
    }

    .div1 { grid-area: 1 / 1 / 2 / 3; }
    .div2 { grid-area: 2 / 1 / 3 / 2; }
    .div3 { grid-area: 2 / 2 / 3 / 3; }
    .div4 { grid-area: 3 / 1 / 4 / 3; }
    </style>
</head>
<body>
  <div class="parent">
    <div class="div1">
      <h1 class="bg-red-500 text-gray-50 text-5xl">Show</h1>
    </div>
    <div class="div2">
      <p>name</p>
      <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{  $album->name }}</p>
      <p>time sold</p>
      <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{  $album->times_sold }}</p>
    </div>
    <div class="div3">
      <p>year</p>
      <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{  $album->year }}</p>
      <p>band</p>
      <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{  $album->band->name }}</p>
    </div>
    <div class="div4">
      <form action="/albums">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to home</button>
      </form>
      <form action="{{ $album->id }}/edit">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</button>
      </form>
    </div>
  </div>
</body>
</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $albums = Album::all();
      //dd($albums);
      return view ('Albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'year' => 'required',
        'times_sold' => 'required',
      ]);

      Album::create($request->all());
      $user = auth()->user()->name;
      Log::channel('logdit')->info($user . ': Album | Store');
      return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Albums.show', ['album' => Album::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bands = Band::all();

        return view('Albums.edit', ['album' => Album::find($id)], ['bands' => $bands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'band_id' => 'required',
        'name' => 'required',
        'year' => 'required',
        'times_sold' => 'required',
    ]);
      // dd(Album::find($id));

      Album::find($id)->update($request->except(['_token', '_method']));
      $user = auth()->user()->name;
      Log::channel('logdit')->info($user . ': Album | Edit');
      return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Album::destroy($id);
      $user = auth()->user()->name;
      Log::channel('logdit')->info($user . ': Album | Destroy');
      return redirect()->route('albums.index');
    }
}

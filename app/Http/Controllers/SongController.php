<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Database\Eloquent\Builder;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $songs = Song::all();
      return view ('Songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
          'title' => 'required',
          'singer' => 'required',
        ]);

        Song::create($request->all());
        $user = auth()->user()->name;
        Log::channel('logdit')->info($user . ': Song | Store');
        return redirect()->route('songs.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $albums = Album::all();
      return view('Songs.show', ['song' => Song::find($id)], ['albums' => $albums]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $albums = Album::all();
      $song = Song::find($id);

      $albums = Album::whereDoesntHave('songs', function (Builder $query) use ($id) {
            $query->where('songs.id', $id);
        })->get();
      return view('Songs.edit', ['song'=> $song, 'albums' => $albums]);
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
        'title' => 'required',
        'singer' => 'required',
        'album_id' => 'required',
      ]);

        Song::find($id)->update($request->except(['id', '_token']));
        $user = auth()->user()->name;
        Log::channel('logdit')->info($user . ': Song | Update');
        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::destroy($id);
        $user = auth()->user()->name;
        Log::channel('logdit')->info($user . ': Song | Destroy');
        return redirect()->route('songs.index');
    }
}

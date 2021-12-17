<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Band;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bands = Band::all();
      return view ('bands.index', ['bands' => $bands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
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
        'genre' => 'required',
        'founded' => 'required',
        'active_til' => 'required',
      ]);

      Band::create($request->all());
      $user = auth()->user()->name;
      Log::channel('logdit')->info($user . ': Band | Create');
      return redirect()->route('bands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urlidnaam)
    {
        return view('bands.show', ['band' => Band::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bands.edit', ['band' => Band::find($id)]);
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
        'name' => 'required',
        'genre' => 'required',
        'founded' => 'required',
        'active_til' => 'required',
    ]);

      Band::find($id)->update($request->except(['_token', '_method']));
      $user = auth()->user()->name;
      Log::channel('logdit')->info($user . ': Band | Update');
      return redirect()->route('bands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Band::destroy($id);
      $user = auth()->user()->name;
      Log::channel('logdit')->info($user . ': Band | Destroy');
      return redirect()->route('bands.index');
    }
}

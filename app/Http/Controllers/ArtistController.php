<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::orderBy('name')->get();

        return view('admin.artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = Artist::create($request->all());
        $nameArtist = $artist->name;

        return redirect()->route('artist.index')->with('success', "Artista: $nameArtist cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$artist = Artist::find($id)) {
            return redirect()->back()->with('error', 'Artista não encontrado');
        }
        return view('admin.artist.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$artist = Artist::find($id)) {
            return redirect()->back()->with('error', 'Artista não encontrado');
        }
        return view('admin.artist.edit', compact('artist'));
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
        if (!$artist = Artist::find($id)) {
            return redirect()->back()->with('error', 'Artist não encontrado');
        }
        
        $artist->update($request->all());

        return redirect()->route('artist.show', ['id' => $artist->id])->with('success', 'Artista editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$artist = Artist::find($id)) {
            return redirect()->back()->with('notFound', 'Artist não encontrado');
        }

        $nameArtist = $artist->name;
        $artist->delete();

        return redirect()->route('artist.index')->with('deleted', "Autor $nameArtist, excluído com sucesso");
    }
}

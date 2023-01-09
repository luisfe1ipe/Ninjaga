<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studios = Studio::orderBy('name')->get();

        return view('admin.studios.index', compact('studios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studio = Studio::create($request->all());
        $nameStudio = $studio->name;

        return redirect()->route('studio.index')->with('success', "Estúdio: $nameStudio criado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$studio = Studio::find($id)) {
            return redirect()->back()->with('notFound', 'Estúdio não encontrado');
        }
        return view('admin.studio.show', compact('studio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$studio = Studio::find($id)) {
            return redirect()->back()->with('notFound', 'Estúdio não encontrado');
        }
        return view('admin.studio.edit', compact('studio'));
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
        if (!$studio = Studio::find($id)) {
            return redirect()->back()->with('notFound', 'Estúdio não encontrado');
        }

        $studio->update($request->all());
        return redirect()->route('studio.show', ['id' => $studio->id])->with('success', 'Estúdio editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$studio = Studio::find($id)) {
            return redirect()->back()->with('notFound', 'Estúdio não encontrado');
        }

        $nameStudio = $studio->name;
        $studio->delete();

        return redirect()->route('studio.index')->with('success', "Estúdio $nameStudio, excluído com sucesso");
    }
}

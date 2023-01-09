<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('name')->get();
        
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = Author::create($request->all());
        $nameAuthor = $author->name;

        return redirect()->route('author.index')->with('success', "Autor: $nameAuthor cadastrado com sucesso");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$author = Author::find($id)){
            return redirect()->back()->with('notFound', 'Autor não encontrado');
        }
        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$author = Author::find($id)){
            return redirect()->back()->with('notFound', 'Autor não encontrado');
        }
        return view('admin.author.edit', compact('author'));
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
        if(!$author = Author::find($id)){
            return redirect()->back()->with('notFound', 'Autor não encontrado');
        }

        $author->update($request->all());
        return redirect()->route('author.show', ['id' => $author->id])->with('success', 'Autor editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$author = Author::find($id)) {
            return redirect()->back()->with('notFound', 'Autor não encontrado');
        }

        $nameAuthor = $author->name;
        $author->delete();

        return redirect()->route('author.index')->with('success', "Autor $nameAuthor, excluído com sucesso");
    }
}

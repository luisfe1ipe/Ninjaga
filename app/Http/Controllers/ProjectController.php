<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Project;
use App\Models\Studio;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        $authors = Author::orderBy('name')->get();
        $studios = Studio::orderBy('name')->get();

        return view('admin.project.create', compact('authors', 'studios', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        
        
        $title = str_replace(" ", "-", $data['title']);
        
        $genres = $data['genres'];
        
        
        if ($request->file('banner')) {
            $bannerName =  $title . '.' . $request->banner->extension();
            $request->banner->move(public_path("projects/$title/banner"), $bannerName);
            $data['banner'] = $bannerName;
        }

        $project = Project::create($data);

        foreach($genres as $genre){
            $project->genres()->attach($genre);
        }
        
        
        // $author = Author::find($data['author_id']);
        // $studio = Studio::find($data['studio_id']);
        
        // $project->author()->create([
        //     'author_id' => $author->id,
        //     'name' => $author->name
        // ]);

        // $project->studio()->create([
        //     'studio_id' => $studio->id,
        //     'name' => $studio->name
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $genres = $project->genres;
        $title = str_replace(" ", "-", $project->title);
        return view('admin.project.show', compact('project', 'title', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

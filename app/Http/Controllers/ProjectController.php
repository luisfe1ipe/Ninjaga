<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Chapter;
use App\Models\Completed;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Project;
use App\Models\Read;
use App\Models\Stop;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        if($type == 'manga'){
            $mangas = Project::where('type', 'Manga')->orderBy('updated_at', 'asc')->get();
            return view('admin.project.index', compact('mangas'));
        }else if($type == 'manwha'){
            $manwhas = Project::where('type', 'Manwha')->orderBy('updated_at', 'asc')->get();
            return view('admin.project.index', compact('manwhas'));
        }else if($type == 'novel'){
            $novels = Project::where('type', 'Novel')->orderBy('updated_at', 'asc')->get();
            return view('admin.project.index', compact('novels'));
        }
        $projects = Project::orderBy('updated_at', 'desc')->get();
        return view('admin.project.index', compact('projects'));
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

        $data['formated_title'] = str_replace(" ", "-", $data['title']);

        $genres = $data['genres'];

        if ($request->file('banner')) {
            $bannerName =  $data['formated_title'] . '.' . $request->banner->extension();
            $request->banner->move(public_path("projects/" . $data['formated_title'] . "/banner"), $bannerName);
            $data['banner'] = $bannerName;
        }

        $project = Project::create($data);

        foreach ($genres as $genre) {
            $project->genres()->attach($genre);
        }

        return redirect()->route('project.index')->with('success', 'Projeto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$project = Project::where('id', $id)->with(['chapters'])->first()) {
            return redirect()->back()->with('notFound', 'Projeto não encontrado');
        }

        $fav = Favorite::where('project_id', $project->id)->where('user_id', Auth::user()->id)->exists();
        $completed = Completed::where('project_id', $project->id)->where('user_id', Auth::user()->id)->exists();
        $read = Read::where('project_id', $project->id)->where('user_id', Auth::user()->id)->exists();
        $stop = Stop::where('project_id', $project->id)->where('user_id', Auth::user()->id)->exists();

        return view('admin.project.show', compact('project','fav', 'completed', 'read', 'stop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$project = Project::where('id',$id)->with(['author', 'studio'])->first()) {
            return redirect()->back()->with('notFound', 'Projeto não encontrado');
        }

        $genres = Genre::orderBy('name')->get();
        $title = str_replace(" ", "-", $project->title);
        $authors = Author::orderBy('name')->get();
        $studios = Studio::orderBy('name')->get();
        return view('admin.project.edit', compact('genres', 'title', 'project', 'authors', 'studios'));
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
        if (!$project = Project::find($id)) {
            return redirect()->back()->with('notFound', 'Projeto não encontrado');
        }

        $data = $request->all();

        $genres = $data['genres'];
        $data['formated_title'] = str_replace(" ", "-", $data['title']);
        $oldTitle = $data['oldTitle'];


        //Edita a foto e o titulo da obra
        if (isset($data['banner']) && $data['title']) {
            if ($data['title'] === $oldTitle) {
                if (file_exists(public_path("projects/". $data['formated_title'] ."/banner/$project->banner"))) {
                    unlink(public_path("projects/". $data['formated_title'] ."/banner/$project->banner"));
                }
                $bannerName =  $data['formated_title'] . '.' . $request->banner->extension();
                $request->banner->move(public_path("projects/" . $data['formated_title'] . "/banner"), $bannerName);
                $data['banner'] = $bannerName;
            } else {
                $formatedOldTitle = str_replace(" ", "-", $oldTitle);
                if (file_exists(public_path("projects/$formatedOldTitle"))) {
                    rename(public_path("projects/$formatedOldTitle"), public_path("projects/" . $data['formated_title']));
                }
                $bannerName =  $data['formated_title'] . '.' . $request->banner->extension();
                $request->banner->move(public_path("projects/".  $data['formated_title'] . "/banner"), $bannerName);
                $data['banner'] = $bannerName;
            }
        } elseif ($data['title'] !== $oldTitle) {
            $formatedOldTitle = str_replace(" ", "-", $oldTitle);
            if (file_exists(public_path("projects/$formatedOldTitle"))) {
                rename(public_path("projects/$formatedOldTitle"), public_path("projects/". $data['formated_title']));
            }
            if(isset($data['banner'])){
                $bannerName =  $data['formated_title'] . '.' . $request->banner->extension();
                $request->banner->move(public_path("projects/" . $data['formated_title'] . "/banner"), $bannerName);
                $data['banner'] = $bannerName;

            }
        }

        $project->genres()->detach();

        foreach ($genres as $genre) {
            $project->genres()->attach($genre);
        }

        $project->update($data);

        return redirect()->route('project.show', ['id' => $project->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$project = Project::find($id)) {
            return redirect()->back()->with('notFound', 'Projeto não encontrado');
        }

        if($project->banner){
            if (file_exists(public_path("projects/" . $project->title_formated . "/banner/$project->banner"))) {
                unlink(public_path("projects/" . $$project->title_formated . "/banner/$project->banner"));
                rmdir(public_path("projects/". $project->title_formated . "/banner"));
                rmdir(public_path("projects/". $project->title_formated));
            }
        }

        $project->genres()->detach(); //N:M
        if($project->favorite){
            $project->favorite()->delete();
        }
        if($project->completed){
            $project->completed()->delete();
        }
        if($project->read){
            $project->read()->delete();
        }
        if($project->stop){
            $project->stop()->delete();
        }
        $project->delete();

        return redirect()->route('project.index')->with('deleted', 'Projeto deletado com sucesso.');
    }

    public function indexByGenre($genre){
        if(!$genre = Genre::where('id', $genre)->with('projects')->first()){
            return redirect()->back()->with('notFound', "Projeto não encontrado.");
        }

        return view('admin.project.indexByGenre', compact('genre'));
    }

    public function indexByReleased($released){
        if(!$projects = Project::where('released', $released)->get()){
            return redirect()->back()->with('notFound', 'Nenhum projeto encontrado.');
        }

        return view('admin.project.indexByReleased', compact('projects', 'released'));
    }
}

<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Project;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::find($id);
        return view('admin.project.chapter.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $project = Project::find($id);
        $projectTitle = str_replace(" ", "-", $project->title);

        $data = $request->all();
        $titleChapter = str_replace(" ", "-", $data['title']);
        $images = $data['img'];
        $data['project_id'] = $project->id;

        if($request->file('image_chapter')){
            $imgChapter = $data['image_chapter'];
            $imageChapterName = 'image-chapter' . '.' . $imgChapter->extension();
            $imgChapter->move(public_path("projects/$projectTitle/chapters/$titleChapter/image-chapter"), $imageChapterName);
            $data['image_chapter'] = $imageChapterName;
        }
    
        if($request->file('img')){
            for ($i=0; $i < count($images); $i++) { 
                $imageName = $i . '.' . $images[$i]->extension();
                $request->img[$i]->move(public_path("projects/$projectTitle/chapters/$titleChapter"), $imageName);
                $data['img'][$i] = $imageName;
            }
        }
        
        Chapter::create($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $chapter_id)
    {
        if(!$chapter = Chapter::find($chapter_id)){
            return back()->with('notFound', 'Capítulo não encontrado.');
        }
        $chapterTitleFormated = str_replace(" ", "-", $chapter->title);


        $project = Project::find($id);
        $projectTitleFormated = str_replace(" ", "-", $project->title);

        return view('admin.project.chapter.show', compact('chapter', 'project', 'projectTitleFormated', 'chapterTitleFormated'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
        $projectTitle = $project->formated_title;

        $data = $request->all();
        $data['formated_title'] = str_replace(" ", "-", $data['title']);
        $images = $data['img'];
        $data['project_id'] = $project->id;

        if($request->file('image_chapter')){
            $imgChapter = $data['image_chapter'];
            $imageChapterName = 'image-chapter' . '.' . $imgChapter->extension();
            $imgChapter->move(public_path("projects/$projectTitle/chapters/". $data['formated_title'] . "/image-chapter"), $imageChapterName);
            $data['image_chapter'] = $imageChapterName;
        }
    
        if($request->file('img')){
            for ($i=0; $i < count($images); $i++) { 
                $imageName = $i . '.' . $images[$i]->extension();
                $request->img[$i]->move(public_path("projects/$projectTitle/chapters/". $data['formated_title']), $imageName);
                $data['img'][$i] = $imageName;
            }
        }
        
        Chapter::create($data);
        
        $chapterTitle = $data['title'];
        return redirect()->route('project.show', ['id' => $project->id])->with('success', "$chapterTitle adicionado com sucesso.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $chapter_id)
    {
        if(!$chapter = Chapter::where('project_id', $id)->where('id', $chapter_id)->with('project')->first()){
            return back()->with('notFound', 'Capítulo não encontrado.');
        }

        return view('admin.project.chapter.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$chapter = Chapter::find($id)){
            return back()->with('notFound', 'Capítulo não encontrado.');
        }
        return view('admin.project.chapter.edit', compact($chapter));
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
    public function destroy($id, $chapter_id)
    {
        if(!$chapter = Chapter::where('project_id', $id)->where('id', $chapter_id)->with('project')->first()){
            return back()->with('notFound', 'Capítulo não encontrado.');
        }


        $chapterTitleFormated = $chapter->formated_title;
        $projectTitleFormated = $chapter->project->formated_title;
  
        if ($chapter->img) {
            if (file_exists(public_path("projects/$projectTitleFormated/chapters/$chapterTitleFormated"))) {
                for ($i=0; $i < count($chapter->img); $i++) {
                    unlink(public_path("projects/$projectTitleFormated/chapters/$chapterTitleFormated/". $chapter->img[$i]));
                }
                if(file_exists(public_path("projects/$projectTitleFormated/chapters/$chapterTitleFormated/image-chapter"))){
                    unlink(public_path("projects/$projectTitleFormated/chapters/$chapterTitleFormated/image-chapter/" . $chapter->image_chapter));
                    rmdir(public_path("projects/$projectTitleFormated/chapters/$chapterTitleFormated/image-chapter"));
                }
                rmdir(public_path("projects/$projectTitleFormated/chapters/$chapterTitleFormated"));
            }
        }

        $chapter->delete();
        return redirect()->route('project.show', ['id' => $chapter->project->id])->with('deleted', "$chapter->title excluído com sucesso.");
    }
}

<?php

namespace App\Http\Livewire\Chapter;

use App\Models\Chapter;
use App\Models\Project;
use Livewire\Component;

class ChapterShow extends Component
{
    public $chapter;
    public $project;
    public $allChapters;
    public $idProject;
    public $existNextChapter;
    public $existPreviousChapter;

    public function render()
    {
        $this->existNextChapter = Chapter::where('project_id', '=', $this->idProject)->where('id', '>', $this->chapter->id)->exists();
        $this->existPreviousChapter = Chapter::where('project_id', '=', $this->idProject)->where('id', '<', $this->chapter->id)->exists();
        return view('livewire.chapter.chapter-show');
    }

    public function mount($chapterId)
    {
        $this->chapter = Chapter::find($chapterId);
        $this->idProject = $this->chapter->project->id;
        $this->project = Project::select('id', 'title')->where('id', $this->idProject)->first();
    }

    public function previousChapter()
    {
        $previousChapter = Chapter::where('project_id', '=', $this->idProject)->where('id', '<', $this->chapter->id)->orderBy('id', 'desc')->first();
        return redirect()->route('chapter.show', ['id' => $this->idProject, 'chapterId' => $previousChapter->id]);
    }

    public function nextChapter()
    {
        $nextChapter = Chapter::where('project_id', '=', $this->idProject)->where('id', '>', $this->chapter->id)->first();
        return redirect()->route('chapter.show', ['id' => $this->idProject, 'chapterId' => $nextChapter->id]);
    }
}

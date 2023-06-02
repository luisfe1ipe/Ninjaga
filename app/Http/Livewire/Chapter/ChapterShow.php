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

    public function render()
    {
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
        $previousChapter = Chapter::where('id', '<', $this->chapter->id)->first();
        return redirect()->route('chapter.show', ['id' => $this->idProject, 'chapterId' => $previousChapter->id]);
    }
}

<?php

namespace App\Http\Livewire\Chapter;

use App\Models\Chapter;
use App\Models\Project;
use Livewire\Component;

class ChapterShow extends Component
{
    public $chapter;
    public $project;
    public function render()
    {
        return view('livewire.chapter.chapter-show');
    }

    public function mount($chapterId)
    {
        $this->chapter = Chapter::find($chapterId);
        $idProject = $this->chapter->project->id;
        $this->project = Project::select('id','title')->where('id', $idProject)->first();
    }
}

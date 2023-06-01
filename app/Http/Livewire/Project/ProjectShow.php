<?php

namespace App\Http\Livewire\Project;

use App\Models\Chapter;
use App\Models\Project;
use Livewire\Component;

class ProjectShow extends Component
{
    public $project;
    public $chapters;

    public function render()
    {
        return view('livewire.project.project-show');
    }

    public function mount($id){
        $this->project = Project::find($id);
        $this->chapters = Chapter::where('project_id', '=', $this->project->id)->get();
    }

    public function viewChapter($id){
        return redirect()->route('chapter.show', ['id' => $this->project->id, 'chapterId' => $id]);
    }
}

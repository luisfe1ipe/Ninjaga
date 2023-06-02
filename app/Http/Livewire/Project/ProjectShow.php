<?php

namespace App\Http\Livewire\Project;

use App\Models\Chapter;
use App\Models\Project;
use Livewire\Component;

class ProjectShow extends Component
{
    public $project;
    public $chapters;
    public $last;
    public $first;

    public function render()
    {
        $this->last = Chapter::select('id')->where('project_id', '=', $this->project->id)->orderBy('id', 'desc')->first();
        $this->first = Chapter::select('id')->where('project_id', '=', $this->project->id)->first();

        return view('livewire.project.project-show');
    }

    public function mount($id)
    {
        $this->project = Project::find($id);
        $this->chapters = Chapter::select('number', 'created_at')->where('project_id', '=', $this->project->id)->get();
    }

    public function viewChapter($id)
    {
        return redirect()->route('chapter.show', ['id' => $this->project->id, 'chapterId' => $id]);
    }

    public function readFirstChapter()
    {
        return redirect()->route('chapter.show', ['id' => $this->project->id, 'chapterId' => $this->first]);
    }

    public function readLastChapter()
    {
        return redirect()->route('chapter.show', ['id' => $this->project->id, 'chapterId' => $this->last]);
    }
}

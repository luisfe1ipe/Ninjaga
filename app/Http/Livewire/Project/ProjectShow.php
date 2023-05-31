<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectShow extends Component
{
    public $project;

    public function render()
    {
        return view('livewire.project.project-show');
    }

    public function mount($id){
        $this->project = Project::find($id);
    }
}

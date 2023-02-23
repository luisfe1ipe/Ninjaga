<?php

namespace App\Http\Livewire\SaveProject;

use App\Models\Completed as ModelsCompleted;
use App\Models\Favorite;
use App\Models\Project;
use App\Models\Read;
use App\Models\Stop;
use Livewire\Component;

class Completed extends Component
{

    public $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }


    public function render()
    {
        $comp = ModelsCompleted::with('projects')->where('user_id', auth()->user()->id);

        return view('livewire.save-project.completed', [
            'comp' => $comp
        ]);
    }

    public function completed($projectId){
        $project = Project::find($projectId);

        $projectRead = Read::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectFav = Favorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectStop = Stop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();

        if ($projectRead) {
            Read::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectFav) {
            Favorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectStop) {
            Stop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }

        $data = [
            'project_id' => $project->id,
            'user_id' => auth()->user()->id
        ];

        if(ModelsCompleted::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists()){
            ModelsCompleted::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }else{
            $project->completed()->create($data);
        }
    }
}

<?php

namespace App\Http\Livewire\SaveProject;

use App\Models\Completed;
use App\Models\Favorite as ModelsFavorite;
use App\Models\Project;
use App\Models\Read;
use App\Models\Stop;
use Livewire\Component;

class Favorite extends Component
{

    public $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }


    public function render()
    {
        $fav = ModelsFavorite::with('projects')->where('user_id', auth()->user()->id);

        return view(
            'livewire.save-project.favorite',
            [
                'fav' => $fav
            ]
        );
    }

    public function favorite($projectId)
    {
        $project = Project::find($projectId);

        $projectRead = Read::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectComp = Completed::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectStop = Stop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();

        if ($projectRead) {
            Read::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectComp) {
            Completed::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectStop) {
            Stop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }

        $data = [
            'project_id' => $project->id,
            'user_id' => auth()->user()->id
        ];

        if(ModelsFavorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists()){
            ModelsFavorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }else{
            $project->favorite()->create($data);
        }
    }
}

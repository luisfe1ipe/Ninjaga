<?php

namespace App\Http\Livewire\Project\Save;

use App\Models\Completed;
use App\Models\Favorite;
use App\Models\Project;
use App\Models\Read as ModelsRead;
use App\Models\Stop;
use Livewire\Component;

class Read extends Component
{
    public $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        $read = ModelsRead::with('projects')->where('user_id', auth()->user()->id);

        return view('livewire.project.save.read', [
            'read' => $read
        ]);
    }

    public function read($projectId){
        $project = Project::find($projectId);

        $projectFav = Favorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectComp = Completed::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectStop = Stop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();

        if ($projectFav) {
            Favorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectComp) {
            Completed::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectStop) {
            Stop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }

        $data = [
            'project_id' => $project->id,
            'user_id' => auth()->user()->id
        ];

        if(ModelsRead::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists()){
            ModelsRead::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }else{
            $project->read()->create($data);
        }
    }
}

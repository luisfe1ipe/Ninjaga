<?php

namespace App\Http\Livewire\Project\Save;

use App\Models\Completed;
use App\Models\Favorite;
use App\Models\Project;
use App\Models\Read;
use App\Models\Stop as ModelsStop;
use Livewire\Component;

class Stop extends Component
{
    
    public $projectId;

    public function __construct($projectId)
    {  
        $this->projectId = $projectId;
    }

    public function render()
    {
        $stop = ModelsStop::with('projects')->where('user_id', auth()->user()->id);

        return view('livewire.project.save.stop', [
            'stop' => $stop
        ]);
    }

    public function stop($projectId){

        $project = Project::find($projectId);
        

        $projectFav = Favorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectComp = Completed::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();
        $projectRead = Read::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists();

        if ($projectFav) {
            Favorite::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectComp) {
            Completed::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }elseif($projectRead) {
            Read::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }

        $data = [
            'project_id' => $project->id,
            'user_id' => auth()->user()->id
        ];

        if(ModelsStop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->exists()){
            ModelsStop::where('project_id', $project->id)->where('user_id', auth()->user()->id)->delete();
        }else{
            $project->stop()->create($data);
        }
    }
}

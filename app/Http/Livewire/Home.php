<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $mostFavoritesProjects = Project::select('id','title', 'banner')->where('visible', '=', 1)->with(['type'])->take(5)->get();
//        dd($mostFavoritesProjects);

        return view('livewire.home', [
            'mostFavoritesProjects' => $mostFavoritesProjects
        ]);
    }
}

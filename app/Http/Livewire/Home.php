<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $mostFavoritesProjects = Project::with(['type'])->take(8)->get();

        return view('livewire.home', [
            'mostFavoritesProjects' => $mostFavoritesProjects
        ]);
    }
}

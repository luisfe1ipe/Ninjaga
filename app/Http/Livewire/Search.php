<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Search extends Component
{
    public $search, $isEmpty = '';
    public function render()
    {
        if (!is_null($this->search)) {
            $projects = Project::search($this->search)
                ->with('author', 'genres')
                ->get();
            $this->isEmpty = '';
        } else {
            $projects = [];
            $this->isEmpty = "Nenhum resultado encontrado";
        }

        return view('livewire.search', [
            'projects' => $projects,
        ]);
    }
}
